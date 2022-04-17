<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$query = new WP_Query( $args );
$rowCount = $query -> found_posts;
$class_layout = 'wppg-layout-' . $wppg_option[ 'wppg_select_layout' ] . '-section';

if ( $query -> have_posts() ) {

        $wppg_row = 1;
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $wppg_product_id=get_the_ID();
            $wppg_advance_option = get_post_meta( $wppg_product_id, 'wppg_advance_option', true );
            if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'list' ) {
                include(WPPG_PATH . 'inc/frontend/content/wppg-list.php');
            } else if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'grid' ) {
                include(WPPG_PATH . 'inc/frontend/content/wppg-grid.php');
            } else  {
                include(WPPG_PATH . 'inc/frontend/content/wppg-carousel.php');
            } 

        }
    
} else {
    _e( 'No post found', WPPG_TD );
}
wp_reset_postdata();
