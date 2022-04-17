<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$post_type = sanitize_text_field( $_POST[ 'post_type' ] );
$key = $this -> wppg_generate_random_string( 15 );
$blog_key = 'blog_' . $key;
$blog_prefix = "wppg_option[wppg_blog][$blog_key]";
?>
<div class="wppg-each-taxonomy-wrap">
    <div class="wppg-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class ="wppg-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_post_taxonomy]' ); ?>" class="wppg-multiple-taxonomy">
                <option value="select" ><?php echo _e( 'Choose Taxonomy', WPPG_TD ); ?></option>
                <?php
                $taxonomies = get_object_taxonomies( $post_type, 'objects' );
                foreach ( $taxonomies as $tax ) {
                    $value = $tax -> name;
                    $label = $tax -> label;
                    ?>
                    <option value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($label); ?></option>
                    <?php
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the product type first', WPPG_TD ); ?></p>
        </div>
    </div>
    <div class ="wppg-post-option-wrap">
        <label><?php _e( 'Terms', WPPG_TD ); ?></label>
        <div class="wppg-post-field-wrap wppg-multiple-select">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="wppg-hierarchy-taxonomy-term">
                <option value="" ><?php echo _e( 'Select Taxonomy First', WPPG_TD ); ?></option>
            </select>
        </div>
    </div>
    <div class ="wppg-post-option-wrap">
        <label for="wppg-enable-operator" class="wppg-enable-operator">
            <?php _e( 'Operator', WPPG_TD ); ?>
        </label>
        <div class="wppg-post-field-wrap">
            <label class="wppg-switch">
                <input type="checkbox" class="wppg-show-operator wppg-checkbox" value="0" name="<?php echo esc_attr( $blog_prefix . '[wppg_enable_operator]' ); ?>"/>
                <div class="wppg-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', WPPG_TD ) ?></p>
            <div class="wppg-operator-inner-wrap" style="display: none;">
                <select name="<?php echo esc_attr( $blog_prefix . '[wppg_terms_operator]' ); ?>" class="wppg-terms-operator">
                    <option value="IN"><?php _e( 'IN', WPPG_TD ) ?></option>
                    <option value="NOT IN"><?php _e( 'NOT IN', WPPG_TD ) ?></option>
                    <option value="AND"><?php _e( 'AND', WPPG_TD ) ?></option>
                    <option value="EXISTS"><?php _e( 'EXISTS', WPPG_TD ) ?></option>
                    <option value="NOT EXISTS"><?php _e( 'NOT EXISTS', WPPG_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>