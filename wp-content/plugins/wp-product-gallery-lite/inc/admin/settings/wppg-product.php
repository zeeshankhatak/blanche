<div class="wppg-post-option-wrap">
    <label for="wppg-price-check" class="wppg-price-view">
        <?php _e( 'Display Price', WPPG_TD ); ?>
    </label>
    <div class="wppg-post-field-wrap">
        <label class="wppg-switch">
            <input type="checkbox" class="wppg-show-price wppg-checkbox" value="<?php
            if ( isset( $wppg_option[ 'wppg_show_price' ] ) ) {
                echo esc_attr( $wppg_option[ 'wppg_show_price' ] );
            } else {
                echo '0';
            }
            ?>" name="wppg_option[wppg_show_price]" <?php if ( isset( $wppg_option[ 'wppg_show_price' ] ) && $wppg_option[ 'wppg_show_price' ] == '1' ) { ?>checked="checked"<?php } ?> />
            <div class="wppg-slider round"></div>
        </label>
        <p class="description"><?php _e( 'Enable to show price', WPPG_TD ) ?></p>
    </div>
</div>
<div class="wppg-price-wrapper" <?php if ( (isset( $wppg_option[ 'wppg_show_price' ] ) && $wppg_option[ 'wppg_show_price' ] == '1' ) && ($wppg_option[ 'product_type' ] != 'download') ) {
                ?> style="display: block;"
         <?php
     } else {
         ?>
         style="display: none;"
         <?php
     }
     ?>>
    <div class="wppg-post-option-wrap">
        <label><?php _e( 'Price Type', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <label><input type="radio" value="actual_price" name="wppg_option[product_price]" <?php
                if ( isset( $wppg_option[ 'product_price' ] ) ) {
                    checked( $wppg_option[ 'product_price' ], 'actual_price' );
                }
                ?> class="wppg-post-content"/><?php _e( "Actual Price", WPPG_TD ); ?></label>
            <label><input type="radio" value="sale_price" name="wppg_option[product_price]" <?php
                if ( isset( $wppg_option[ 'product_price' ] ) ) {
                    checked( $wppg_option[ 'product_price' ], 'sale_price' );
                }
                ?>  class="wppg-post-content"/><?php _e( 'Sale Price', WPPG_TD ); ?></label>
        </div>
    </div>
</div>

<div class="wppg-button-one-outer-wrap">
    <div class ="wppg-post-option-wrap">
        <label for="wppg-buy-check" class="wppg-buy-view">
            <?php _e( 'Call To Action Button One', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-button-one wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_button_one' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_button_one' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_button_one]" <?php if ( isset( $wppg_option[ 'wppg_show_button_one' ] ) && $wppg_option[ 'wppg_show_button_one' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show button one, for example Buy link', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class="wppg-buy-wrapper-one" <?php if ( isset( $wppg_option[ 'wppg_show_button_one' ] ) && $wppg_option[ 'wppg_show_button_one' ] == '1' ) {
                    ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Button Link Type', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_button_one_link_type]" class="wppg-button-one-link-type">
                    <option value="product_detail_link"  <?php if ( isset( $wppg_option[ 'wppg_button_one_link_type' ] ) && $wppg_option[ 'wppg_button_one_link_type' ] == 'product_detail_link' ) echo 'selected="selected"'; ?>><?php _e( 'Product Detail Link', WPPG_TD ) ?></option>
                    <option value="common_custom_link"  <?php if ( isset( $wppg_option[ 'wppg_button_one_link_type' ] ) && $wppg_option[ 'wppg_button_one_link_type' ] == 'common_custom_link' ) echo 'selected="selected"'; ?>><?php _e( 'Common Custom Link', WPPG_TD ) ?></option>
                    <option value="individual_custom_link"  <?php if ( isset( $wppg_option[ 'wppg_button_one_link_type' ] ) && $wppg_option[ 'wppg_button_one_link_type' ] == 'individual_custom_link' ) echo 'selected="selected"'; ?>><?php _e( 'Individual Custom link', WPPG_TD ) ?></option>
                    <?php if ( ( isset( $wppg_option[ 'product_type' ] ) && !empty($wppg_option[ 'product_type' ]) ) && ( $wppg_option[ 'product_type' ] == 'product' || $wppg_option[ 'product_type' ] == 'download') ) {
                        ?>
                        <option value="product_add_cart"  <?php if ( isset( $wppg_option[ 'wppg_button_one_link_type' ] ) && $wppg_option[ 'wppg_button_one_link_type' ] == 'product_add_cart' ) echo 'selected="selected"'; ?>><?php _e( 'Add to Cart', WPPG_TD ) ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class="wppg-common-link-wrapper">
            <div class="wppg-post-option-wrap">
                <label for="custom-detail-link" class="wppg-custom-link"><?php _e( 'Common Custom Link', WPPG_TD ); ?></label>
                <div class="wppg-post-field-wrap">
                    <input type="text" class="wppg-common-link-button-one" name="wppg_option[common_link_button_one]" value="<?php
                    if ( isset( $wppg_option[ 'common_link_button_one' ] ) ) {
                        echo esc_attr( $wppg_option[ 'common_link_button_one' ] );
                    }
                    ?>">
                </div>
                <div class="wppg-tooltip-icon">
                    <span class="dashicons dashicons-info"></span>
                    <span class="wppg-tooltip-info"><?php _e( 'This link can be useful if you have any third party order processing systems.', WPPG_TD ); ?></span>
                </div>
                <p class="description">
                    <?php _e( 'Please use #product_id, #product_slug or #product_title in the link to replace it with corresponding values in the provided link. For example: http://example.com/order?product_id=#product_id', WPPG_TD ); ?>
                </p>
            </div>
        </div>
        <div class="wppg-button-one-text-wrap">
            <div class="wppg-post-option-wrap">
                <label for="button-one-text" class="wppg-button-text"><?php _e( 'Button Text', WPPG_TD ); ?></label>
                <div class="wppg-post-field-wrap">
                    <input type="text" class="wppg-button-one-text" placeholder="Add Button Text" name="wppg_option[wppg_button_one_text]" value="<?php
                    if ( isset( $wppg_option[ 'wppg_button_one_text' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_button_one_text' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wppg-button-two-outer-wrap">
    <div class ="wppg-post-option-wrap">
        <label for="wppg-buy-check" class="wppg-buy-view">
            <?php _e( 'Call To Action Button Two', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-button-two wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_button_two' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_button_two' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_button_two]" <?php if ( isset( $wppg_option[ 'wppg_show_button_two' ] ) && $wppg_option[ 'wppg_show_button_two' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show button Two, for example Buy link', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class="wppg-buy-wrapper-two" <?php if ( isset( $wppg_option[ 'wppg_show_button_two' ] ) && $wppg_option[ 'wppg_show_button_two' ] == '1' ) {
                    ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Button Link Type', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_button_two_link_type]" class="wppg-button-two-link-type">
                    <option value="product_detail_link"  <?php if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'product_detail_link' ) echo 'selected="selected"'; ?>><?php _e( 'Product Detail Link', WPPG_TD ) ?></option>
                    <option value="common_custom_link"  <?php if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'common_custom_link' ) echo 'selected="selected"'; ?>><?php _e( 'Common Custom Link', WPPG_TD ) ?></option>
                    <option value="individual_custom_link"  <?php if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'individual_custom_link' ) echo 'selected="selected"'; ?>><?php _e( 'Individual Custom link', WPPG_TD ) ?></option>
                    <?php if ( ( isset( $wppg_option[ 'product_type' ] ) && !empty($wppg_option[ 'product_type' ]) ) && ( $wppg_option[ 'product_type' ] == 'product' || $wppg_option[ 'product_type' ] == 'download') ) {
                        ?>
                        <option value="product_add_cart"  <?php if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'product_add_cart' ) echo 'selected="selected"'; ?>><?php _e( 'Add to Cart', WPPG_TD ) ?></option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <div class="wppg-common-link-wrapper">
            <div class="wppg-post-option-wrap">
                <label for="custom-detail-link" class="wppg-custom-link"><?php _e( 'Common Custom Link', WPPG_TD ); ?></label>
                <div class="wppg-post-field-wrap">
                    <input type="text" class="wppg-common-link-button-two" name="wppg_option[common_link_button_two]" value="<?php
                    if ( isset( $wppg_option[ 'common_link_button_two' ] ) ) {
                        echo esc_attr( $wppg_option[ 'common_link_button_two' ] );
                    }
                    ?>">
                </div>
                <div class="wppg-tooltip-icon">
                    <span class="dashicons dashicons-info"></span>
                    <span class="wppg-tooltip-info"><?php _e( 'This link can be useful if you have any third party order processing systems.', WPPG_TD ); ?></span>
                </div>
                <p class="description">
                    <?php _e( 'Please use #product_id, #product_slug or #product_title in the link to replace it with corresponding values in the provided link. For example: http://example.com/order?product_id=#product_id', WPPG_TD ); ?>
                </p>
            </div>
        </div>
        <div class="wppg-button-two-text-wrap">
            <div class="wppg-post-option-wrap">
                <label for="button-two-text" class="wppg-button-text"><?php _e( 'Button Text', WPPG_TD ); ?></label>
                <div class="wppg-post-field-wrap">
                    <input type="text" class="wppg-button-two-text" placeholder="Add Button Text" name="wppg_option[wppg_button_two_text]" value="<?php
                    if ( isset( $wppg_option[ 'wppg_button_two_text' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_button_two_text' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
    </div>
</div>