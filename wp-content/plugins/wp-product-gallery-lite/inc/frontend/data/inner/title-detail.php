<div class="wppg-title">
    <?php
    if ( isset( $wppg_option[ 'wppg_show_link_title' ] ) && $wppg_option[ 'wppg_show_link_title' ] == '1' ) {
        ?>
        <a href="<?php the_permalink(); ?>" target="_blank">
            <?php the_title(); ?></a>
        <?php
    } else {
        the_title();
    }
    ?>
</div>