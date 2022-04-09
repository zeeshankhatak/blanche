<html>
    <head>
        <title><?php _e( 'Preview Blog', WPPG_TD ); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
        </style>
    </head>
    <body>
        <div class="wppg-preview-main-container">
            <div class="wppg-preview-title-wrap">
                <div class="wppg-preview-title"><?php _e( 'Preview Mode', WPPG_TD ); ?></div>
            </div>
            <div class="wppg-preview-note"><?php _e( 'This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', WPPG_TD ); ?></div>
            <div class="wppg-form-preview-wrap">
                <?php
                $blog_id = intval( sanitize_text_field( $_GET[ 'blog_id' ] ) );

                echo do_shortcode( '[wppg id="' . $blog_id . '"]' );
                ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>

