<div class="wppg-inner-wrap">
    <div class="wppg-inner-wrap-contain wppg-clearfix">
            <div class="wppg-image-hover-wrap">
                <div class="wppg-image-second-container">
                    <?php include(WPPG_PATH . 'inc/frontend/content/image.php'); ?>
                </div>
            </div>
            <div class="wppg-detail-side-wrap">
                <?php
                /*
                 * Show Category
                 */
                if ( isset( $wppg_option[ 'wppg_show_category' ] ) && $wppg_option[ 'wppg_show_category' ] == '1' ) {
                    ?>
                    <div class="wppg-category-wrap">
                        <?php echo $this -> wppg_fetch_category( $wppg_product_id, $wppg_option[ 'select_post_taxonomy' ] ); ?>
                    </div>
                    <?php
                }
                include (WPPG_PATH . '/inc/frontend/data/title.php');
                include (WPPG_PATH . '/inc/frontend/data/price.php');
                if ( isset( $wppg_option[ 'wppg_show_content' ] ) && $wppg_option[ 'wppg_show_content' ] == '1' ) {
                    ?>
                    <div class="wppg-content">
                        <?php
                        echo $this -> wppg_fetch_content( $wppg_product_id, $wppg_option[ 'wppg_post_excerpt' ] );
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="wppg-buttons-collection">
                    <?php
                    include (WPPG_PATH . '/inc/frontend/data/button-one.php');
                    include (WPPG_PATH . '/inc/frontend/data/button-two.php');
                    ?>
                </div>
                <?php
                if ( isset( $wppg_option[ 'wppg_show_social_share' ] ) && $wppg_option[ 'wppg_show_social_share' ] == '1' ) {
                    include (WPPG_PATH . '/inc/frontend/content/wppg-social.php');
                }
                ?>
            </div>
    </div>
</div>