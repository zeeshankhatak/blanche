<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
?>
<div class="wppg-post-selection-wrap">
    <div class ="wppg-post-option-wrap">
        <label><?php _e( 'Product Type', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <select name="wppg_option[product_type]" class="wppg-product-type">
                <?php if ( post_type_exists( 'product' ) && class_exists( 'WooCommerce' ) ) {
                    ?>  <option value="product" <?php if ( isset( $wppg_option[ 'product_type' ] ) && $wppg_option[ 'product_type' ] == 'product' ) echo 'selected="selected"'; ?>><?php _e( 'Woo Commerce', WPPG_TD ) ?></option>
                <?php }
                ?>
                <?php if ( post_type_exists( 'download' ) && class_exists( 'EDD_Download' ) ) {
                    ?>   <option value="download" <?php if ( isset( $wppg_option[ 'product_type' ] ) && $wppg_option[ 'product_type' ] == 'download' ) echo 'selected="selected"'; ?>><?php _e( 'Easy Digital Downloads', WPPG_TD ) ?></option>
                <?php }
                ?>
            </select>
        </div>
        <div class="wppg-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="wppg-tooltip-info"><?php _e( 'Please note the Woocommerce & Easy Digital Downloads option will only be shown when the respective plugin is installed', WPPG_TD ); ?></span>
        </div>
    </div>

    <div class ="wppg-query-setting-wrap wppg-active-field" data-menu-ref="taxonomy-settings">
        <?php include(WPPG_PATH . 'inc/admin/filter/wppg-taxonomy.php'); ?>
    </div>

    <div class="wppg-separation-wrap">
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'OrderBy', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_select_orderby]" class="wppg-select-orderby">
                    <option value="none"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'none' ) echo 'selected="selected"'; ?>><?php _e( 'None', WPPG_TD ) ?></option>
                    <option value="ID"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'ID' ) echo 'selected="selected"'; ?>><?php _e( 'ID', WPPG_TD ) ?></option>
                    <option value="author"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'author' ) echo 'selected="selected"'; ?>><?php _e( 'Author', WPPG_TD ) ?></option>
                    <option value="title"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'title' ) echo 'selected="selected"'; ?>><?php _e( 'Title', WPPG_TD ) ?></option>
                    <option value="name"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'name' ) echo 'selected="selected"'; ?>><?php _e( 'Post Name', WPPG_TD ) ?></option>
                    <option value="type"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'type' ) echo 'selected="selected"'; ?>><?php _e( 'Post Type', WPPG_TD ) ?></option>
                    <option value="date"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'date' ) echo 'selected="selected"'; ?>><?php _e( 'Date', WPPG_TD ) ?></option>
                    <option value="modified"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'modified' ) echo 'selected="selected"'; ?>><?php _e( 'Last Modified Date', WPPG_TD ) ?></option>
                    <option value="parent"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'parent' ) echo 'selected="selected"'; ?>><?php _e( 'Parent ID', WPPG_TD ) ?></option>
                    <option value="rand"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'rand' ) echo 'selected="selected"'; ?>><?php _e( 'Random', WPPG_TD ) ?></option>
                    <option value="comment_count"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'comment_count' ) echo 'selected="selected"'; ?>><?php _e( 'Comment Count', WPPG_TD ) ?></option>
                    <option value="menu_order"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'menu_order' ) echo 'selected="selected"'; ?>><?php _e( 'Menu Order', WPPG_TD ) ?></option>
                    <option value="meta_value"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'meta_value' ) echo 'selected="selected"'; ?>><?php _e( 'Alphabetical Meta Value', WPPG_TD ) ?></option>
                    <option value="meta_value_num"  <?php if ( isset( $wppg_option[ 'wppg_select_orderby' ] ) && $wppg_option[ 'wppg_select_orderby' ] == 'meta_value_num' ) echo 'selected="selected"'; ?>><?php _e( 'Numeric Meta Value', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wppg-orderby-meta-warp" style="display: none;">
            <div class ="wppg-post-option-wrap">
                <label><?php _e( 'Meta Key', WPPG_TD ); ?></label>
                <div class="wppg-post-field-wrap">
                    <input type="text" class="wppg-orderby-key" name="wppg_option[wppg_orderby_key]" value="<?php
                    if ( isset( $wppg_option[ 'wppg_orderby_key' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_orderby_key' ] );
                    }
                    ?>" >
                </div>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Order', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_select_order]" class="wppg-select-order">
                    <option value="ASC"  <?php if ( isset( $wppg_option[ 'wppg_select_order' ] ) && $wppg_option[ 'wppg_select_order' ] == 'ASC' ) echo 'selected="selected"'; ?>><?php _e( 'Ascending', WPPG_TD ) ?></option>
                    <option value="DESC"  <?php if ( isset( $wppg_option[ 'wppg_select_order' ] ) && $wppg_option[ 'wppg_select_order' ] == 'DESC' ) echo 'selected="selected"'; ?>><?php _e( 'Descending', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Post Status', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_select_post_status]" class="wppg-select-post-status">
                    <option value="publish"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'publish' ) echo 'selected="selected"'; ?>><?php _e( 'Publish', WPPG_TD ) ?></option>
                    <option value="pending"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'pending' ) echo 'selected="selected"'; ?>><?php _e( 'Pending', WPPG_TD ) ?></option>
                    <option value="draft"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'draft' ) echo 'selected="selected"'; ?>><?php _e( 'Draft', WPPG_TD ) ?></option>
                    <option value="auto-draft"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'auto-draft' ) echo 'selected="selected"'; ?>><?php _e( 'Auto Draft', WPPG_TD ) ?></option>
                    <option value="future"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'future' ) echo 'selected="selected"'; ?>><?php _e( 'Future', WPPG_TD ) ?></option>
                    <option value="private"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'private' ) echo 'selected="selected"'; ?>><?php _e( 'Private', WPPG_TD ) ?></option>
                    <option value="inherit"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'inherit' ) echo 'selected="selected"'; ?>><?php _e( 'Inherit', WPPG_TD ) ?></option>
                    <option value="trash"  <?php if ( isset( $wppg_option[ 'wppg_select_post_status' ] ) && $wppg_option[ 'wppg_select_post_status' ] == 'trash' ) echo 'selected="selected"'; ?>><?php _e( 'Trash', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>