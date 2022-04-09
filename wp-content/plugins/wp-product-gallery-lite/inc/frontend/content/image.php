<?php
$image ='full';
$image_type ='normal';
?>
<div class="wppg-image">
    <?php
    if ( $image_type == 'normal') {
        if ( has_post_thumbnail( $wppg_product_id ) ) {
            if ( isset( $wppg_option[ 'wppg_show_link_image' ] ) && $wppg_option[ 'wppg_show_link_image' ] == '1' ) {
                ?>
                <a href="<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank">
                    <?php echo get_the_post_thumbnail( $wppg_product_id, $image ); ?>
                </a>
                <?php
            } else {
                echo get_the_post_thumbnail( $wppg_product_id, $image );
            }
        }
    } 

   
    ?>
</div>


