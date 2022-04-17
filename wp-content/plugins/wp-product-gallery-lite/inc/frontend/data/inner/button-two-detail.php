<div class="wppg-buton-two-wrapper wppg-button">
    <?php
    if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'product_add_cart' ) {
        if ( (isset( $wppg_option[ 'product_type' ] ) && $wppg_option[ 'product_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {
            woocommerce_template_loop_add_to_cart();
        } else {
            ?>
            <a class="wppg-edd-price add_to_cart_button" href ="<?php echo edd_get_checkout_uri(); ?>?edd_action=add_to_cart&download_id=<?php echo esc_attr($wppg_product_id); ?>&edd_options[price_id]=0"><span class="wppg-span"><?php _e( 'Add To Cart' ) ?></span></a>

            <?php
            // echo edd_get_purchase_link( array( 'price' => FALSE, 'download_id' => $wppg_product_id, 'class' => 'btn btn-lg btn-block btn-success', 'text' => 'Add to Cart' ) );
        }
    } else if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'product_detail_link' ) {
        ?>
        <a class="wppg-button-design" href="<?php the_permalink(); ?>" target="_blank">
            <span class="wppg-span"><?php echo esc_attr( $wppg_option[ 'wppg_button_two_text' ] ); ?></span>
        </a>
        <?php
    } else if ( isset( $wppg_option[ 'wppg_button_two_link_type' ] ) && $wppg_option[ 'wppg_button_two_link_type' ] == 'common_custom_link' ) {
        ?>
        <a class="wppg-button-design" href="<?php echo esc_url( $wppg_option[ 'common_link_button_two' ] ); ?>" target="_blank">
            <span class="wppg-span"><?php echo esc_attr( $wppg_option[ 'wppg_button_two_text' ] ); ?></span>
        </a>
        <?php
    } else {
        ?>
        <a class="wppg-button-design" href="<?php echo esc_url( $wppg_advance_option[ 'button_two_custom_link' ] ); ?>" target="_blank">
            <span class="wppg-span"><?php echo esc_attr( $wppg_option[ 'wppg_button_two_text' ] ); ?></span>
        </a>
        <?php
    }
    ?>
</div>