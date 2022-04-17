<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$select_post = sanitize_text_field( $_POST[ 'select_post' ] );

$taxonomies = get_object_taxonomies( $select_post, 'objects' );
?>
<option value="select" <?php if ($wppg_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected="selected"'; ?>><?php echo _e( 'Select', WPPG_TD ); ?></option>

<?php
foreach ( $taxonomies as $tax ) {
    $value = $tax -> name;
    $label = $tax -> label;
    ?>
    <option value="<?php echo $value; ?>" <?php if ($wppg_option[ 'select_post_taxonomy' ] == $value ) echo 'selected="selected"'; ?>><?php echo $label; ?></option>
    <?php
}



