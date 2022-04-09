<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$wppg_advance_option = get_post_meta( $post_id, 'wppg_advance_option', true );
?>
<div class ="wppg-post-option-wrap">
    <label for="regular-price"><?php _e( 'Regular Price', WPPG_TD ); ?></label>
    <div class="wppg-post-field-wrap">
        <input type="text" class="wppg-regular-price" name="wppg_advance_option[wppg_inbuilt_regular_price]" value="<?php
        if ( isset( $wppg_advance_option[ 'wppg_inbuilt_regular_price' ] ) ) {
            echo esc_attr( $wppg_advance_option[ 'wppg_inbuilt_regular_price' ] );
        }
        ?>">
    </div>
</div>
<div class ="wppg-post-option-wrap">
    <label for="sale-price"><?php _e( 'Sale Price', WPPG_TD ); ?></label>
    <div class="wppg-post-field-wrap">
        <input type="text" class="wppg-sale-price" name="wppg_advance_option[wppg_inbuilt_sale_price]" value="<?php
               if ( isset( $wppg_advance_option[ 'wppg_inbuilt_sale_price' ] ) ) {
                   echo esc_attr( $wppg_advance_option[ 'wppg_inbuilt_sale_price' ] );
               }
               ?>">
    </div>
</div>