<?php                                                                        ?>
<div class="wppg-layout-outer-wrap">
    <div class ="wppg-post-option-wrap">
        <label><?php _e( 'Layout', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <select name="wppg_option[wppg_select_layout]" class="wppg-select-layout">
                <option value="grid"  <?php if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'grid' ) echo 'selected="selected"'; ?>><?php _e( 'Grid', WPPG_TD ) ?></option>
                <option value="list"  <?php if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'list' ) echo 'selected="selected"'; ?>><?php _e( 'List', WPPG_TD ) ?></option>
                <option value="carousel"  <?php if ( isset( $wppg_option[ 'wppg_select_layout' ] ) && $wppg_option[ 'wppg_select_layout' ] == 'carousel' ) echo 'selected="selected"'; ?>><?php _e( 'Carousel', WPPG_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="wppg-grid-setting-wrap">
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Grid Template', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_grid_template]" class="wppg-grid-template">
                    <?php
                    $wppg_grid_names = array( 'Classic template', 'Hover box shadow template');
                    $k = 1;
                    foreach ( $wppg_grid_names as $wppg_grid_name ) {
                        ?>
                        <option value="template-<?php echo esc_attr($k); ?>" <?php if ( ! empty( $wppg_option[ 'wppg_grid_template' ] ) ) selected( $wppg_option[ 'wppg_grid_template' ], 'template-' . $k ); ?>><?php echo esc_attr($wppg_grid_name); ?></option>
                        <?php
                        $k ++;
                    }
                    ?>    </select>
            </div>
        </div>
        <div class="wppg-grid-demo wppg-preview-image">
            <?php
            for ( $cnt = 1; $cnt <=2; $cnt ++ ) {
                if ( isset( $wppg_option[ 'wppg_grid_template' ] ) ) {
                    $option_value = $wppg_option[ 'wppg_grid_template' ];
                    $exploed_array = explode( '-', $option_value );
                    $cnt_num = $exploed_array[ 1 ];
                    if ( $cnt != $cnt_num ) {
                        $style = "style='display:none;'";
                    } else {
                        $style = '';
                    }
                }
                ?>
                <div class="wppg-grid-common" id="wppg-grid-demo-<?php echo esc_attr($cnt); ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                    <h4><?php _e( 'Template', WPPG_TD ); ?> <?php echo esc_attr($cnt); ?> <?php _e( 'Preview', WPPG_TD ); ?></h4>
                    <img src="<?php echo WPPG_IMG_DIR . '/demo/grid-templates/template-' . $cnt . '.jpg' ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="wppg-list-setting-wrap" style="display:none;">
        <div class="wppg-normal-list-wrap">
            <div class="wppg-list-demo wppg-preview-image">
                    <div class="wppg-list-common" id="wppg-list-demo-1">
                        <h4><?php _e( 'Preview', WPPG_TD ); ?></h4>
                        <img src="<?php echo WPPG_IMG_DIR . '/demo/list-templates/template-1.jpg' ?>"/>
                    </div>
            </div>
        </div>
    </div>

    <div class="wppg-carousel-setting-wrap" style="display:none;">
      
        <div class="wppg-carousel-demo wppg-preview-image">
           
                <div class="wppg-carousel-common" id="wppg-carousel-demo-1">
                    <h4><?php _e( 'Preview', WPPG_TD ); ?></h4>
                    <img src="<?php echo WPPG_IMG_DIR . '/demo/carousel-templates/template-1.jpg' ?>"/>
                </div>
           
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Slide Column', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <input type="number" name="wppg_option[wppg_slide_column]" min="1" max="4" class="wppg-slide-column" value="<?php
                if ( isset( $wppg_option[ 'wppg_slide_column' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_slide_column' ] );
                } else {
                    echo '3';
                }
                ?>">
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Slide Width', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <input type="text" name="wppg_option[wppg_slide_width]" class="wppg-slide-width" value="<?php
                if ( isset( $wppg_option[ 'wppg_slide_width' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_slide_width' ] );
                } else {
                    echo '350';
                }
                ?>">
            </div>
        </div>
    </div>
    <div class="wppg-slider-option-block" style="display: none;">
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Controls', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_nav_controls]" class="wppg-nav-controls">
                    <option value="true"  <?php if ( isset( $wppg_option[ 'wppg_nav_controls' ] ) && $wppg_option[ 'wppg_nav_controls' ] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'True', WPPG_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wppg_option[ 'wppg_nav_controls' ] ) && $wppg_option[ 'wppg_nav_controls' ] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'False', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Auto', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_slide_auto]" class="wppg-slide-auto">
                    <option value="true"  <?php if ( isset( $wppg_option[ 'wppg_slide_auto' ] ) && $wppg_option[ 'wppg_slide_auto' ] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'True', WPPG_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wppg_option[ 'wppg_slide_auto' ] ) && $wppg_option[ 'wppg_slide_auto' ] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'False', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Slide Transition duration', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <input type="number" name="wppg_option[wppg_slide_speed]" class="wppg-slide-speed" value="<?php
                if ( isset( $wppg_option[ 'wppg_slide_speed' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_slide_speed' ] );
                } else {
                    echo '1000';
                }
                ?>">
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label><?php _e( 'Pager', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_slide_pager]" class="wppg-slide-pager">
                    <option value="true"  <?php if ( isset( $wppg_option[ 'wppg_slide_pager' ] ) && $wppg_option[ 'wppg_slide_pager' ] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'True', WPPG_TD ) ?></option>
                    <option value="false"  <?php if ( isset( $wppg_option[ 'wppg_slide_pager' ] ) && $wppg_option[ 'wppg_slide_pager' ] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'False', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="wppg-column-settings-wrap">
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Desktop Column', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <?php
                $desktop_column = isset( $wppg_option[ 'desktop_column' ] ) ? esc_attr( $wppg_option[ 'desktop_column' ] ) : '2';
                ?>
                <div class="wppg-grid-column" data-max="4" data-min="1" data-value="<?php echo esc_attr($desktop_column); ?>"></div>
                <input type="number" min="1" name="wppg_option[desktop_column]" max="4" class="wppg-desktop-column" value="<?php echo esc_attr($desktop_column); ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Tablet/IPad Column', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <?php
                $tablet_column = isset( $wppg_option[ 'tablet_column' ] ) ? esc_attr( $wppg_option[ 'tablet_column' ] ) : '2';
                ?>
                <div class="wppg-grid-column" data-max="3" data-min="1" data-value="<?php echo esc_attr($tablet_column); ?>"></div>
                <input type="number" min="1" name="wppg_option[tablet_column]" max="3" class="wppg-tablet-column" value="<?php echo esc_attr($tablet_column); ?>" readonly="readonly"/>
            </div>
        </div>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Mobile Column', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <?php
                $mobile_column = isset( $wppg_option[ 'mobile_column' ] ) ? esc_attr( $wppg_option[ 'mobile_column' ] ) : '1';
                ?>
                <div class="wppg-grid-column" data-max="2" data-min="1" data-value="<?php echo esc_attr($mobile_column); ?>"></div>
                <input type="number" min="1" name="wppg_option[mobile_column]" max="3" class="wppg-mobile-column" value="<?php echo esc_attr($mobile_column); ?>" readonly="readonly"/>
            </div>
        </div>
    </div>
</div>

