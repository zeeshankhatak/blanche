<?php
/**
 * Handler for [wppg_guten_block] shortcode
 *
 * @param $atts
 *
 * @return string
 */
function wppg_block_handler($atts)
{
	$atts = shortcode_atts([
		'heading' => __('WP Product Gallery Block Title'),
		'heading_tag' => 'h2',
		'wppg_id' => '',
	], $atts, 'wppg_guten_block');

	return wppg_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wppg_id' ]);
}

/**
 * Register Shortcode
 */
add_shortcode('wppg_guten_block', 'wppg_block_handler');

/**
 * Handler for post title block
 * @param $atts
 *
 * @return string
 */
function wppg_block_render_handler($atts)
{
	return wppg_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'wppg_id' ]);
}

/**
 * Output the post title wrapped in a heading
 *
 * @param int $wppg_id The post ID
 * @param string $heading Allows : h2,h3,h4 only
 *
 * @return string
 */
function wppg_block_renderer($heading,$heading_tag,$wppg_id)
{	
	$ret = '';
	if(!empty($heading)){
		$ret .= "<$heading_tag>$heading</$heading_tag>";
	}
	if($wppg_id!=null){
		$title = do_shortcode('[wppg id="'.$wppg_id.'"]');
		$ret .= "$title";
	}
	return $ret;
}

/**
 * Register block
 */
add_action('init', function () {
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = dirname(__FILE__);

	wp_enqueue_style( 'wppg-block-editor', plugins_url('wppg-block.css', __FILE__), false, WPPG_VERSION );

	$index_js = 'wppg-block.js';
	wp_register_script(
		'wppg-block-script',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor'
		),
		filemtime("$dir/$index_js")
	);

	$wppg_logos_array = get_wppg_logos();
	wp_localize_script( 'wppg-block-script', 'WPPG_logos_array', $wppg_logos_array);

	register_block_type('wppg-display-block/wppg-widget', array(
		'editor_script' => 'wppg-block-script',
		'render_callback' => 'wppg_block_render_handler',
		'attributes' => [			
			'heading' => [
				'type' => 'string',
				'default' => __('WP Product Gallery Block Title')
			],
			'heading_tag' => [
				'type' => 'string',
				'default' => 'h2'
			],
			'wppg_id' => [
				'type' => 'string',
				'default' => ''
			],
		]
	));
});

function get_wppg_logos(){
	$args = array('post_type'=>'wpproductgallery',
		'post_status'=>'publish',
		'posts_per_page'=>'25'
	);
    // The Query
	$the_query = new WP_Query( $args );

	$wpproductgallery = array(array('value'=>0,'label'=>__('Select Product Gallery')));

    // The Loop
	if ( $the_query->have_posts() ) {
		while($the_query->have_posts()){
			$the_query->the_post();
			$wpproductgallery[] = array('value'=>get_the_ID(), 'label'=> get_the_title());
		}
	}

	return $wpproductgallery;
}