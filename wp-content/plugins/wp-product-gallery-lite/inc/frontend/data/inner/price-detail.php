<div class="wppg-price">
    <?php
    if ( (isset( $wppg_option[ 'product_type' ] ) && $wppg_option[ 'product_type' ] == 'product') && class_exists( 'WooCommerce' ) ) {
        if ( isset( $wppg_option[ 'product_price' ] ) && $wppg_option[ 'product_price' ] == 'sale_price' ) {
            woocommerce_template_loop_price();
        } else {
            $product = new WC_Product( $wppg_product_id );
            echo wc_price( $product -> get_price() );
        }
    } 
   
    else {
        //echo $this -> wppg_variable_pricing( $wppg_product_id );
        echo $this -> wppg_variable_pricing( $wppg_product_id );
        //echo edd_price( $wppg_product_id );
    }
    ?>
</div>