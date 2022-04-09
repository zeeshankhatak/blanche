<div class="wppg-social-outer-wrap">
    <div class ="wppg-post-option-wrap">
        <label for="wppg-social-share-check" class="wppg-social-share">
            <?php _e( 'Social Share', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-social-share wppg-checkbox" value="<?php
                if ( isset( $wppg_option[ 'wppg_show_social_share' ] ) ) {
                    echo esc_attr( $wppg_option[ 'wppg_show_social_share' ] );
                } else {
                    echo '0';
                }
                ?>" name="wppg_option[wppg_show_social_share]" <?php if ( isset( $wppg_option[ 'wppg_show_social_share' ] ) && $wppg_option[ 'wppg_show_social_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show social share link', WPPG_TD ) ?></p>
        </div>
    </div>
    <div class="wppg-social-container"
    <?php if ( isset( $wppg_option[ 'wppg_show_social_share' ] ) && $wppg_option[ 'wppg_show_social_share' ] == '1' ) {
        ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display:none;"
             <?php
         }
         ?>>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-facebook-share-check" class="wppg-facebook-share">
                <?php _e( 'Facebook Share Link', WPPG_TD ); ?>
            </label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-facebook-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_facebook_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_facebook_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_facebook_share]" <?php if ( isset( $wppg_option[ 'wppg_show_facebook_share' ] ) && $wppg_option[ 'wppg_show_facebook_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show facebook share link', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-twitter-share-check" class="wppg-twitter-share">
                <?php _e( 'Twitter Share Link', WPPG_TD ); ?>
            </label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-twitter-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_twitter_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_twitter_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_twitter_share]" <?php if ( isset( $wppg_option[ 'wppg_show_twitter_share' ] ) && $wppg_option[ 'wppg_show_twitter_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show twitter share link', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-google-share-check" class="wppg-google-share"><?php _e( 'Google Plus Share Link', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-google-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_google_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_google_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_google_share]" <?php if ( isset( $wppg_option[ 'wppg_show_google_share' ] ) && $wppg_option[ 'wppg_show_google_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show google plus share link', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-linkedin-share-check" class="wppg-linkedin-share"><?php _e( 'Linkedin Share Link', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-linkedin-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_linkedin_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_linkedin_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_linkedin_share]" <?php if ( isset( $wppg_option[ 'wppg_show_linkedin_share' ] ) && $wppg_option[ 'wppg_show_linkedin_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show linkedin share link', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-mail-share-check" class="wppg-mail-share"><?php _e( 'Share Via Email', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-mail-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_mail_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_mail_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_mail_share]" <?php if ( isset( $wppg_option[ 'wppg_show_mail_share' ] ) && $wppg_option[ 'wppg_show_mail_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show share via email', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-pinterest-share-check" class="wppg-pinterest-share"><?php _e( 'Pinterest Share Link', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-pinterest-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_pinterest_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_pinterest_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_pinterest_share]" <?php if ( isset( $wppg_option[ 'wppg_show_pinterest_share' ] ) && $wppg_option[ 'wppg_show_pinterest_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show pinterest share link', WPPG_TD ) ?></p>
            </div>
        </div>
        <div class ="wppg-post-option-wrap">
            <label for="wppg-vk-share-check" class="wppg-vk-share"><?php _e( 'VK Share Link', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <label class="wppg-switch">
                    <input type="checkbox" class="wppg-show-vk-share wppg-checkbox" value="<?php
                    if ( isset( $wppg_option[ 'wppg_show_vk_share' ] ) ) {
                        echo esc_attr( $wppg_option[ 'wppg_show_vk_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="wppg_option[wppg_show_vk_share]" <?php if ( isset( $wppg_option[ 'wppg_show_vk_share' ] ) && $wppg_option[ 'wppg_show_vk_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="wppg-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show VK share link', WPPG_TD ) ?></p>
            </div>
        </div>
    </div>
</div>