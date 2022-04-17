<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$name_prefix = "wppg_option[wppg_blog][$blog_key]";
$value_prefix = $wppg_option[ 'wppg_blog' ][ $blog_key ];
?>
<div class="wppg-each-taxonomy-wrap">
    <div class="wppg-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class="wppg-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_post_taxonomy]' ); ?>" class="wppg-multiple-taxonomy">
                <option value="select" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == 'select' ) echo 'selected="selected"'; ?>><?php echo _e( 'Choose Taxonomy', WPPG_TD ); ?></option>
                <?php
                $product_post_type = (isset( $wppg_option[ 'product_type' ] )) ? esc_attr( $wppg_option[ 'product_type' ] ) : 'wppg_product_manager';
                $taxonomies = get_object_taxonomies( $product_post_type, 'objects' );
                foreach ( $taxonomies as $tax ) {
                    $value = $tax -> name;
                    $label = $tax -> label;
                    ?>
                    <option value="<?php echo esc_attr($value); ?>" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == $value ) echo 'selected="selected"'; ?>><?php echo esc_attr($label); ?></option>
                    <?php
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the product type first', WPPG_TD ); ?></p>
        </div>
    </div>
    <div class="wppg-post-option-wrap">
        <label><?php _e( 'Terms', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap wppg-multiple-select">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="wppg-hierarchy-taxonomy-term">
                <option value=""><?php echo 'Choose Terms'; ?></option>
                <?php
                $select_tax = $value_prefix[ 'multiple_post_taxonomy' ];
                if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) ) {
                    echo $this -> wppg_fetch_category_list( $select_tax, $value_prefix[ 'multiple_taxonomy_terms' ] );
                }
                ?>
            </select>
        </div>
    </div>
    <div class="wppg-post-option-wrap">
        <label for="wppg-enable-operator" class="wppg-enable-operator">
            <?php _e( 'Operator', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-operator wppg-checkbox" value="<?php
                if ( isset( $value_prefix[ 'wppg_enable_operator' ] ) ) {
                    echo esc_attr( $value_prefix[ 'wppg_enable_operator' ] );
                } else {
                    echo '0';
                }
                ?>" name="<?php echo esc_attr( $name_prefix . '[wppg_enable_operator]' ); ?>" <?php if ( isset( $value_prefix[ 'wppg_enable_operator' ] ) && $value_prefix[ 'wppg_enable_operator' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', WPPG_TD ) ?></p>
            <div class="wppg-operator-inner-wrap" <?php if ( isset( $value_prefix[ 'wppg_enable_operator' ] ) && $value_prefix[ 'wppg_enable_operator' ] == '1' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                <select name="<?php echo esc_attr( $name_prefix . '[wppg_terms_operator]' ); ?>" class="wppg-terms-operator">
                    <option value="IN" <?php if ( isset( $value_prefix[ 'wppg_terms_operator' ] ) && $value_prefix[ 'wppg_terms_operator' ] == 'IN' ) echo 'selected="selected"'; ?>><?php _e( 'IN', WPPG_TD ) ?></option>
                    <option value="NOT IN" <?php if ( isset( $value_prefix[ 'wppg_terms_operator' ] ) && $value_prefix[ 'wppg_terms_operator' ] == 'NOT IN' ) echo 'selected="selected"'; ?>><?php _e( 'NOT IN', WPPG_TD ) ?></option>
                    <option value="AND" <?php if ( isset( $value_prefix[ 'wppg_terms_operator' ] ) && $value_prefix[ 'wppg_terms_operator' ] == 'AND' ) echo 'selected="selected"'; ?>><?php _e( 'AND', WPPG_TD ) ?></option>
                    <option value="EXISTS" <?php if ( isset( $value_prefix[ 'wppg_terms_operator' ] ) && $value_prefix[ 'wppg_terms_operator' ] == 'EXISTS' ) echo 'selected="selected"'; ?>><?php _e( 'EXISTS', WPPG_TD ) ?></option>
                    <option value="NOT EXISTS" <?php if ( isset( $value_prefix[ 'wppg_terms_operator' ] ) && $value_prefix[ 'wppg_terms_operator' ] == 'NOT EXISTS' ) echo 'selected="selected"'; ?>><?php _e( 'NOT EXISTS', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>