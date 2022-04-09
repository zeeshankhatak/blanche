<div class="wppg-share-wrap">
    <div class="wppg-share-wrap-contain">
        <?php if ( isset( $wppg_option[ 'wppg_show_facebook_share' ] ) && $wppg_option[ 'wppg_show_facebook_share' ] == '1' ) { ?>
            <a class="wppg-fb" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-facebook" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_twitter_share' ] ) && $wppg_option[ 'wppg_show_twitter_share' ] == '1' ) {
            ?>
            <a  class="wppg-twitter" href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_google_share' ] ) && $wppg_option[ 'wppg_show_google_share' ] == '1' ) {
            ?>

            <a class="wppg-google" href="https://plus.google.com/share?url=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-google-plus" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_linkedin_share' ] ) && $wppg_option[ 'wppg_show_linkedin_share' ] == '1' ) {
            ?>
            <a class="wppg-linkdein" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-linkedin" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_mail_share' ] ) && $wppg_option[ 'wppg_show_mail_share' ] == '1' ) {
            ?>
            <a class="wppg-email" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fas fa-envelope" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_pinterest_share' ] ) && $wppg_option[ 'wppg_show_pinterest_share' ] == '1' ) {
            ?>
            <a class="wppg-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-pinterest" aria-hidden="true"></i>
            </a>
            <?php
        }
        if ( isset( $wppg_option[ 'wppg_show_vk_share' ] ) && $wppg_option[ 'wppg_show_vk_share' ] == '1' ) {
            ?>
            <a class="wppg-vk" href="http://vk.com/share.php?url=<?php echo get_permalink( $wppg_product_id ); ?>" target="_blank" rel="nofollow">
                <i class="fab fa-vk" aria-hidden="true"></i>
            </a>
        <?php }
        ?>
    </div>
</div>