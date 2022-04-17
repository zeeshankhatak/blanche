<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$wppg_mobile_detector = new WPPG_Mobile_Detect();
$post_id = $atts[ 'id' ];
//global $post;
$wppg_option = get_post_meta( $post_id, 'wppg_option', true );
$class_layout = 'wppg-layout-' . $wppg_option[ 'wppg_select_layout' ] . '-section';
$random_num = rand( 111111111, 999999999 );
if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'list' ) {
        $wppg_layout_class = 'wppg-list-template-1 wppg-list wppg-left-image';
    
} else if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'grid' ) {

    //  global $wppg_mobile_detector;
    $desktop = esc_attr( $wppg_option[ 'desktop_column' ] );
    $mobile = esc_attr( $wppg_option[ 'mobile_column' ] );
    $tablet = esc_attr( $wppg_option[ 'tablet_column' ] );
    if ( $wppg_mobile_detector -> isMobile() && ! $wppg_mobile_detector -> isTablet() ) {
        $wppg_layout_class = 'wppg-grid-' . $wppg_option[ 'wppg_grid_template' ] . ' wppg-grid' . ' wppg-mobile-col-' . $mobile;
    } else if ( $wppg_mobile_detector -> isTablet() ) {
        $wppg_layout_class = 'wppg-grid-' . $wppg_option[ 'wppg_grid_template' ] . ' wppg-grid' . ' wppg-tablet-col-' . $tablet;
    } else {
        $wppg_layout_class = 'wppg-grid-' . $wppg_option[ 'wppg_grid_template' ] . ' wppg-grid' . ' wppg-desktop-col-' . $desktop;
    }
} else {
 
        $wppg_layout_class = 'wppg-car-template-1 wppg-car-outer-wrap';
   
}
?>
<div data-id='wppg_<?php
     echo rand( 1111111, 9999999 );
     ?>' class="<?php
if ($wppg_option['product_type'] == 'product' && class_exists( 'WooCommerce' )){
    echo 'woocommerce';
}
if ($wppg_option['product_type'] == 'download' && class_exists( 'EDD_Download' ) ) {
    echo 'wppg-edd-wrapper ';
}
?> wppg-product-outer-wrapper-<?php echo esc_attr($random_num); ?> wppg-main-product-wrapper <?php echo esc_attr( $wppg_layout_class ); ?> <?php
     if ( (isset( $wppg_option[ 'wppg_show_button_one' ] ) && $wppg_option[ 'wppg_show_button_one' ] == '1') && (isset( $wppg_option[ 'wppg_show_button_two' ] ) && $wppg_option[ 'wppg_show_button_two' ] != '1')) {
         echo 'wppg-only-one-button';
     }
     if ( (isset( $wppg_option[ 'wppg_show_button_two' ] ) && $wppg_option[ 'wppg_show_button_two' ] == '1') && (isset( $wppg_option[ 'wppg_show_button_one' ] ) && $wppg_option[ 'wppg_show_button_one' ] != '1')) {
         echo 'wppg-only-one-button';
     }
     ?>" >
       
    <div class="<?php echo esc_attr( $class_layout ); ?> wppg-clearfix" <?php if ( $wppg_option[ 'wppg_select_layout' ] == 'carousel' ) { ?>

             data-column = "<?php
             if ( isset( $wppg_option[ 'wppg_slide_column' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_slide_column' ] );
             }
             ?>"
             data-controls = "<?php
             if ( isset( $wppg_option[ 'wppg_nav_controls' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_nav_controls' ] );
             }
             ?>"
             data-auto = "<?php
             if ( isset( $wppg_option[ 'wppg_slide_auto' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_slide_auto' ] );
             }
             ?>"
             data-speed = "<?php
             if ( isset( $wppg_option[ 'wppg_slide_speed' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_slide_speed' ] );
             }
             ?>"
             data-pager = "<?php
             if ( isset( $wppg_option[ 'wppg_slide_pager' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_slide_pager' ] );
             }
             ?>"
             data-template = "<?php
             if ( isset( $wppg_option[ 'wppg_carousel_template' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_carousel_template' ] );
             }
             ?>"
             data-width = "<?php
             if ( isset( $wppg_option[ 'wppg_slide_width' ] ) ) {
                 echo esc_attr( $wppg_option[ 'wppg_slide_width' ] );
             }
             ?>"
             <?php
         }
       
         ?>>
             <?php
             // }

             if ( isset( $wppg_option[ 'wppg_post_excerpt' ] ) ) {
                 $excerpt = $wppg_option[ 'wppg_post_excerpt' ];
             }
             if ( isset( $wppg_option[ 'wppg_post_number' ] ) ) {
                 $post_number = $wppg_option[ 'wppg_post_number' ];
             } else {
                 $post_number = 20;
             }
             if ( isset( $wppg_option[ 'wppg_select_order' ] ) ) {
                 $order = $wppg_option[ 'wppg_select_order' ];
             } else {
                 $order = 'DESC';
             }
             if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) ) {
                 $order_by = $wppg_option[ 'wppg_select_orderby' ];
             } else {
                 $order_by = 'date';
             }
             if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) ) {
                 $status = $wppg_option[ 'wppg_select_post_status' ];
             } else {
                 $status = 'publish';
             }
             // if ( isset( $wppg_option[ 'wppg_date_format_post' ] ) ) {
             //     $date_format = $wppg_option[ 'wppg_date_format_post' ];
             // }
             if ( isset( $wppg_option[ 'product_type' ] ) ) {
                 $post_type = $wppg_option[ 'product_type' ];
             }


             /*
              * Condition for taxonomy
              */
            
                 $tax = $wppg_option[ 'select_post_taxonomy' ];
                 if ( $wppg_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) {
                     if ( $wppg_option[ 'simple_taxonomy_terms' ] == '' ) {
                         $terms = get_terms(array($tax, 'hide_empty' => false ) );
                         $term_ids = wp_list_pluck( $terms, 'term_id' );
                         $id = implode( ", ", array_keys( $term_ids ) );
                         $tax_query = array( array(
                                 'taxonomy' => $tax,
                                 'field' => 'term_id',
                                 'terms' => array( $id )
                             ), );
                     } else {
                         $simple_term = $wppg_option[ 'simple_taxonomy_terms' ];
                         $tax_query = array( array(
                                 'taxonomy' => $tax,
                                 'field' => 'term_id',
                                 'terms' => $simple_term
                             ), );
                     }
                 }
                 /*
                  * multiple taxonomy tax query
                  */ else {
                     $relation = $wppg_option[ 'wppg_multiple_tax_relation' ];
                     $first_term_array = $wppg_option[ 'taxonomy_terms' ];
                     $first_term_list = substr( implode( ", ", $first_term_array ), 0 );
                     $blog_array = array( 'relation' => $relation );
                     $blog_array[] = array(
                         'taxonomy' => $tax,
                         'field' => 'term_id',
                         'terms' => $first_term_array,
                     );
                     if ( ! empty( $wppg_option[ 'wppg_blog' ] ) ) {
                         foreach ( $wppg_option[ 'wppg_blog' ] as $blog_key => $blog_detail ) {
                             $tax = $wppg_option[ 'wppg_blog' ][ $blog_key ][ 'multiple_post_taxonomy' ];
                             $operator = $wppg_option[ 'wppg_blog' ][ $blog_key ][ 'wppg_terms_operator' ];
                             $term = $wppg_option[ 'wppg_blog' ][ $blog_key ][ 'multiple_taxonomy_terms' ];
                             $term_collection = substr( implode( ", ", $term ), 0 );
                             if ( isset( $wppg_option[ 'wppg_blog' ][ $blog_key ][ 'wppg_enable_operator' ] ) && $wppg_option[ 'wppg_blog' ][ $blog_key ][ 'wppg_enable_operator' ] == '1' ) {
                                 $blog_array[] = array(
                                     'taxonomy' => $tax,
                                     'field' => 'term_id',
                                     'terms' => $term,
                                     'operator' => $operator,
                                 );
                             } else {
                                 $blog_array[] = array(
                                     'taxonomy' => $tax,
                                     'field' => 'term_id',
                                     'terms' => $term,
                                 );
                             }
                         }
                     }
                     $tax_query[] = $blog_array;
                 }
             
           
             $args = array(
                 'post_type' => $post_type,
                 'order' => $order,
                 'orderby' => $order_by,
                 'posts_per_page' => $post_number,
                 'post_status' => $status
             );
             if ( ! empty( $tax_query ) ) {
                 $args[ 'tax_query' ] = $tax_query;
             }
             include(WPPG_PATH . 'inc/frontend/wppg-template.php');
             ?>
    </div>
</div>



