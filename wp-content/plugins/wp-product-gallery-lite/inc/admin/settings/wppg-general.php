<div class="wppg-general-outer-wrap">
    <div class ="wppg-post-option-wrap">
        <label for="wppg-title-view-check" class="wppg-title-view">
            <?php _e( 'Display Product Title', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-title wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_title' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_title' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_title]" <?php if ( isset( $wppg_option[ 'wppg_show_title' ] ) && $wppg_option[ 'wppg_show_title' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show title', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class="wppg-post-option-wrap">
        <label for="wppg-content-view-check" class="wppg-content-view">
            <?php _e( 'Display Product Excerpt', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-content wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_content' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_content' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_content]" <?php if ( isset( $wppg_option[ 'wppg_show_content' ] ) && $wppg_option[ 'wppg_show_content' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show content', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class="wppg-product-desc-wrapper" <?php if ( isset( $wppg_option[ 'wppg_show_content' ] ) && $wppg_option[ 'wppg_show_content' ] == '1' ) {
                    ?>
             style="display:block;"
             <?php
         } else {
             ?>
             style="display:none;"
             <?php
         }
         ?>>
        <div class ="wppg-post-option-wrap">
            <div class="wppg-post-field-wrap">
                <div class="wppg-excerpt-wrap">
                    <input type="number" class="wppg-post-excerpt" min="10" name="wppg_option[wppg_post_excerpt]"  value="<?php
                    if ( isset( $wppg_option[ 'wppg_post_excerpt' ] ) ) {
                        echo $wppg_option[ 'wppg_post_excerpt' ];
                    } else {
                        echo '15';
                    }
                    ?>"/>
                    <p class="description"><?php _e( 'Enter the length of post content', WPPG_TD ) ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class ="wppg-post-option-wrap">
        <label for="wppg-category-view-check" class="wppg-category-view">
            <?php _e( 'Display Post Category/Taxonomy', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-category wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_category' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_category' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_category]" <?php if ( isset( $wppg_option[ 'wppg_show_category' ] ) && $wppg_option[ 'wppg_show_category' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show category', WPPG_TD ) ?></p>
        </div>
    </div>

    <div class ="wppg-post-option-wrap">
        <label for="wppg-link-title" class="wppg-link-title">
            <?php _e( 'Display Product Link in Title', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-link-title wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_link_title' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_link_title' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_link_title]" <?php if ( isset( $wppg_option[ 'wppg_show_link_title' ] ) && $wppg_option[ 'wppg_show_link_title' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show product link in title', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class ="wppg-post-option-wrap">
        <label for="wppg-link-image" class="wppg-link-image">
            <?php _e( 'Display Product Link in Image', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-link-image wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_link_image' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_link_image' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_link_image]" <?php if ( isset( $wppg_option[ 'wppg_show_link_image' ] ) && $wppg_option[ 'wppg_show_link_image' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show product link in image', WPPG_TD ) ?></p>
        </div>
    </div>
</div>