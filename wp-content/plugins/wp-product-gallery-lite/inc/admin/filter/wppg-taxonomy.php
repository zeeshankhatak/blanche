<div class="wppg-taxonomy-main-wrap">
    <div class="wppg-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category Queries Type', WPPG_TD ); ?></label>
        <div class="wppg-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="wppg-tooltip-info"><?php _e( 'Choose Simple Taxonomy/Category Query to display post from a single taxonomy or category with single term.For example display posts tagged with bob, under people custom taxonomy.Choose Multiple Taxonomy/Category Handling to display posts from several custom taxonomies or categories.', WPPG_TD ); ?></span>
        </div>
        <div class="wppg-post-field-wrap">
            <div class="wppg-info-wrap">
                <select name="wppg_option[taxonomy_queries_type]" class="wppg-taxonomy-queries-type">
                    <option value="simple-taxonomy"  <?php if ( isset( $wppg_option[ 'taxonomy_queries_type' ] ) && $wppg_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) echo 'selected="selected"'; ?>><?php _e( 'Simple Taxonomy/Category Query', WPPG_TD ) ?></option>
                    <option value="multiple-taxonomy"  <?php if ( isset( $wppg_option[ 'taxonomy_queries_type' ] ) && $wppg_option[ 'taxonomy_queries_type' ] == 'multiple-taxonomy' ) echo 'selected="selected"'; ?>><?php _e( 'Multiple Taxonomy/Category Handling', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="wppg-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <select name="wppg_option[select_post_taxonomy]" class="wppg-select-taxonomy">
                <option value="select" <?php if ( isset( $wppg_option[ 'select_post_taxonomy' ] ) && $wppg_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPPG_TD ); ?></option>
                <?php
                //$product_post_type = (isset( $wppg_option[ 'product_type' ] )) ? esc_attr( $wppg_option[ 'product_type' ] ) : 'wppg_product_manager';
                $product_post_type='product';
                $taxonomies = get_object_taxonomies( $product_post_type, 'objects' );
                foreach ( $taxonomies as $tax ) {
                    $value = $tax -> name;
                    $label = $tax -> label;
                    ?>
                    <option value="<?php echo esc_attr($value); ?>" <?php if ( isset( $wppg_option[ 'select_post_taxonomy' ] ) && $wppg_option[ 'select_post_taxonomy' ] == $value ) echo 'selected="selected"'; ?>><?php echo esc_attr($label); ?></option>
                    <?php
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the product type first', WPPG_TD ); ?></p>
            <div class="wppg-loader-preview" style="display:none;">
                <img src="<?php echo WPPG_IMG_DIR . '/ajax-loader-add.gif' ?>">
            </div>
        </div>
    </div>
    <div class="wppg-simple-terms-wrap" style="display: none;">
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Term', WPPG_TD ); ?></label>
            <div class="wppg-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="wppg-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', WPPG_TD ); ?></span>
            </div>
            <div class="wppg-post-field-wrap">
                <div class="wppg-info-wrap">
                    <select name="wppg_option[simple_taxonomy_terms]" class="wppg-simple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Term', WPPG_TD ); ?></option>
                        <?php
                        if ( ! empty( $wppg_option[ 'simple_taxonomy_terms' ] ) ) {
                            echo $this -> wppg_fetch_category_list( $wppg_option[ 'select_post_taxonomy' ], $wppg_option[ 'simple_taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', WPPG_TD ); ?></p>
                    <div class="wppg-taxonomy-preview" style="display:none;">
                        <img src="<?php echo WPPG_IMG_DIR . '/ajax-loader-add.gif' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wppg-multiple-terms-wrap" style= "display: none;">
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Terms', WPPG_TD );
                        ?></label>
            <div class="wppg-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="wppg-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', WPPG_TD ); ?></span>
            </div>
            <div class ="wppg-post-field-wrap">
                <div class="wppg-info-wrap wppg-multiple-select">
                    <select name="wppg_option[taxonomy_terms][]" multiple="multiple" class="wppg-multiple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Terms', WPPG_TD ); ?></option>
                        <?php
                        if ( isset( $wppg_option[ 'taxonomy_terms' ] ) ) {
                            echo $this -> wppg_fetch_category_list( $wppg_option[ 'select_post_taxonomy' ], $wppg_option[ 'taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', WPPG_TD ); ?></p>
                </div>

            </div>
        </div>
        <div class="wppg-post-option-wrap">
            <label><?php _e( 'Relation', WPPG_TD ); ?></label>
            <div class="wppg-post-field-wrap">
                <select name="wppg_option[wppg_multiple_tax_relation]" class="wppg-multiple-tax-relation">
                    <option value="AND"  <?php if ( isset( $wppg_option[ 'wppg_multiple_tax_relation' ] ) && $wppg_option[ 'wppg_multiple_tax_relation' ] == 'AND' ) echo 'selected="selected"'; ?>><?php _e( 'AND', WPPG_TD ) ?></option>
                    <option value="OR"  <?php if ( isset( $wppg_option[ 'wppg_multiple_tax_relation' ] ) && $wppg_option[ 'wppg_multiple_tax_relation' ] == 'OR' ) echo 'selected="selected"'; ?>><?php _e( 'OR', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="wppg-tax-inner-wrap">
            <?php
            if ( isset( $wppg_option[ 'wppg_blog' ] ) && is_array( $wppg_option[ 'wppg_blog' ] ) ) {
                $wppg_blog_count = count( $wppg_option[ 'wppg_blog' ] );
            } else {
                $wppg_blog_count = 0;
            }
            if ( $wppg_blog_count > 0 ) {

                foreach ( $wppg_option[ 'wppg_blog' ] as $blog_key => $blog_detail ) {
                    include(WPPG_PATH . 'inc/admin/forms/term-list.php');
                }
            }
            ?>
        </div>
        <div class="wppg-taxonomy-button">
            <input type="button" class="button-primary wppg-add-tax-condition" value="<?php _e( 'Add New Taxonomy Condition', WPPG_TD ); ?>">
        </div>
    </div>
</div>