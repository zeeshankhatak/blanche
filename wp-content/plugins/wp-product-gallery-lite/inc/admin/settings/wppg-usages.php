<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div  class="wppg-shortcode-usage-wrapper">
    <ul class="wppg-usage-tab-wrap">
        <li data-usage="tab-1" class="wppg-usage-trigger wppg-usage-active">
            <?php _e( 'Shortcode', WPPG_TD ); ?>
        </li>
        <li data-usage="tab-2" class="wppg-usage-trigger">
            <?php _e( 'Template Include', WPPG_TD ); ?>
        </li>
    </ul>
    <div class="wppg-usage-post" data-usage-ref="tab-1">
        <p class="description"><?php _e( 'Copy and paste the shortcode directly into any WordPress post or page.', WPPG_TD ) ?></p>
        <div class="wppg-shortcode-page-wrap">
            <input type='text' value='[wppg id="<?php echo esc_attr($post -> ID); ?>"]' readonly="readonly">
        </div>
    </div>
    <div class="wppg-usage-post" data-usage-ref="tab-2" style="display: none;">
        <p class="description"><?php
            _e( 'Copy and paste this code into a template file to include the WP Product Gallery within your theme.', WPPG_TD );
            ?></p>
        <div class = "wppg-shortcode-theme-wrap">
            &lt;?php echo do_shortcode("[wppg id='<?php echo esc_attr($post -> ID); ?>']");
            ?&gt;
        </div>
    </div>
</div>
