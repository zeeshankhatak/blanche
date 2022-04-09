<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$wppg_option = get_post_meta( $post_id, 'wppg_option', true );
//$this -> print_array( $wppg_option );
?>
<div class="wppg-backend-outer-wrap">
    <div class="wppg-menu-wrapper">
        <ul class="wppg-menu-tab">
            <li data-menu="post-settings" class="wppg-tab-tigger wppg-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', WPPG_TD ); ?>
            </li>
            <li data-menu="layout-settings" class="wppg-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', WPPG_TD ); ?>
            </li>
            <li data-menu="general-settings" class="wppg-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'General Settings', WPPG_TD ); ?>
            </li>
            <li data-menu="product-settings" class="wppg-tab-tigger">
                <span class="dashicons dashicons-products"></span>
                <?php _e( 'Product Settings', WPPG_TD ); ?>
            </li>
            <li data-menu="social-share-settings" class="wppg-tab-tigger">
                <span class="dashicons dashicons-share"></span>
                <?php _e( 'Social Share Settings', WPPG_TD ); ?>
            </li>
        </ul>
    </div>
    <div class ="wppg-settings-wrap wppg-active-container" data-menu-ref="post-settings">
        <?php include(WPPG_PATH . 'inc/admin/settings/wppg-post.php'); ?>
    </div>
    <div class ="wppg-settings-wrap" data-menu-ref="layout-settings">
        <?php include(WPPG_PATH . 'inc/admin/settings/wppg-layout.php'); ?>
    </div>
    <div class ="wppg-settings-wrap" data-menu-ref="general-settings">
        <?php include(WPPG_PATH . 'inc/admin/settings/wppg-general.php'); ?>
    </div>
    <div class ="wppg-settings-wrap" data-menu-ref="product-settings">
        <?php include(WPPG_PATH . 'inc/admin/settings/wppg-product.php'); ?>
    </div>
    <div class ="wppg-settings-wrap" data-menu-ref="social-share-settings">
        <?php include(WPPG_PATH . 'inc/admin/settings/wppg-social.php'); ?>
    </div>

</div>
