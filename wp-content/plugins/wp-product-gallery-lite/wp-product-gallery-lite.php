<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/**
 * Plugin Name: WP Product Gallery Lite
 * Plugin URI:  https://accesspressthemes.com/wordpress-plugins/wp-product-gallery-lite/
 * Description:  Plugin to Manage / Design WordPress Products Showcase | stunning, responsive, creative and powerful design.
 * Version:     1.1.2
 * Author:      AccessPress Themes
 * Author URI:  http://accesspressthemes.com/
 * Domain Path: /languages/
 * Text Domain: wp-product-gallery-lite
 * */
/**
 * Declaration of necessary constants for plugin
 * */
defined( 'WPPG_VERSION' ) or define( 'WPPG_VERSION', '1.1.2' ); //plugin version
defined( 'WPPG_TD' ) or define( 'WPPG_TD', 'wp-product-gallery-lite' ); //plugin's text domain
defined( 'WPPG_IMG_DIR' ) or define( 'WPPG_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' ); //plugin image directory
defined( 'WPPG_JS_DIR' ) or define( 'WPPG_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );  //plugin js directory
defined( 'WPPG_CSS_DIR' ) or define( 'WPPG_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' ); // plugin css dir
defined( 'WPPG_PATH' ) or define( 'WPPG_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WPPG_URL' ) or define( 'WPPG_URL', plugin_dir_url( __FILE__ ) );
include(WPPG_PATH . '/inc/frontend/wppg-mobile-detect.php');

if ( ! class_exists( 'WPPG_Class' ) ) {

    class WPPG_Class{

        /**
         * Initializes the plugin functions
         */
        function __construct(){

            add_action( 'init', array( $this, 'wppg_plugin_text_domain' ) ); //loads text domain for translation ready
            add_action( 'wp_enqueue_scripts', array( $this, 'wppg_register_assets' ) ); //registers scripts and styles for front end
            add_action( 'init', array( $this, 'wppg_register_post_type' ) ); //register custom post type
            add_action( 'admin_enqueue_scripts', array( $this, 'wppg_register_admin_assets' ) ); //register plugin scripts and css in wp-admin
            add_action( 'add_meta_boxes', array( $this, 'wppg_add_blog_metabox' ) ); //added blog showcase metabox
            add_action( 'add_meta_boxes', array( $this, 'wppg_shortcode_usage_metabox' ) ); //added shortcode usages metabox
            add_action( 'save_post', array( $this, 'wppg_meta_save' ) );
            add_action( 'wp_ajax_wppg_selected_post_taxonomy', array( $this, 'wppg_selected_post_taxonomy' ) );
            add_action( 'wp_ajax_wppg_selected_taxonomy_terms', array( $this, 'wppg_selected_taxonomy_terms' ) );
            add_action( 'wp_ajax_wppg_hierarchy_terms', array( $this, 'wppg_hierarchy_terms' ) );
            add_action( 'wp_ajax_wppg_add_meta_condition', array( $this, 'wppg_add_meta_condition' ) );
            add_action( 'wp_ajax_wppg_add_tax_condition', array( $this, 'wppg_add_tax_condition' ) );
            add_shortcode( 'wppg', array( $this, 'wppg_generate_shortcode' ) ); // generating shortcode
            add_action( 'template_redirect', array( $this, 'wppg_page_template_redirect' ) );
            add_filter( 'preview_post_link', array( $this, 'wppg_preview_page' ), 10, 2 );
            add_action( 'wp_ajax_wppg_filter_tax_terms', array( $this, 'wppg_filter_tax_terms' ) );
            add_action( 'template_redirect', array( $this, 'wppg_preview_blog' ) );
            add_action( 'admin_menu', array( $this, 'wppg_register_about_us_page' ) ); //add submenu page
            add_action( 'admin_menu', array( $this, 'wppg_register_stuff_page' ) ); //add submenu page
            add_filter( 'post_row_actions', array( $this, 'wppg_remove_row_actions' ), 10, 1 );
            add_filter( 'manage_wpproductgallery_posts_columns', array( $this, 'wppg_columns_head' ) );
            add_action( 'manage_wpproductgallery_posts_custom_column', array( $this, 'wppg_columns_content' ), 10, 2 );
            add_action( 'admin_head-post-new.php', array( $this, 'wppg_posttype_admin_css' ) );
            add_action( 'admin_head-post.php', array( $this, 'wppg_posttype_admin_css' ) );
            add_action( 'widgets_init', array( $this, 'wppg_widget_register' ) );
            remove_action( 'edd_purchase_link_top', 'edd_purchase_variable_pricing', 10, 1 );
            add_action( 'edd_purchase_link_top', array( $this, 'wppg_variable_pricing' ), 10, 1 );
            add_filter( 'admin_footer_text', array( $this, 'wppg_admin_footer_text' ) );
            add_filter( 'plugin_row_meta', array( $this, 'wppg_plugin_row_meta' ), 10, 2 );
            add_action( 'admin_init', array( $this, 'wppg_redirect_to_site' ), 1 );
        
            include('inc/wppg-block/wppg-block-init.php');
        }

//load the text domain for language translation
        function wppg_plugin_text_domain(){
            load_plugin_textdomain( 'wp-product-gallery', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

//register admin assets
        function wppg_register_admin_assets( $hook ){
            global $post;
            wp_enqueue_media();
            wp_enqueue_script( 'thickbox' );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'jquery-ui-core' );
            wp_enqueue_script( 'wppg-admin-script', WPPG_JS_DIR . '/wppg-admin-script.js', array( 'jquery', 'wp-color-picker', 'jquery-ui-sortable', 'jquery-ui-core' ), WPPG_VERSION );
            $admin_ajax_nonce = wp_create_nonce( 'wppg-admin-ajax-nonce' );
            $admin_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $admin_ajax_nonce );
            wp_localize_script( 'wppg-admin-script', 'wppg_backend_js_params', $admin_ajax_object );
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'wppg-font', WPPG_CSS_DIR . '/font-awesome.min.css', false, WPPG_VERSION );
            wp_enqueue_style( 'wppg-backend-style', WPPG_CSS_DIR . '/wppg-backend-style.css', false, WPPG_VERSION );
            wp_enqueue_style( 'wppg-jquery-ui-style', WPPG_CSS_DIR . '/jquery-ui-css-1.12.1.css', false, WPPG_VERSION );
        }

//register frontend assests
        function wppg_register_assets(){
            wp_enqueue_style( 'dashicons' );
            wp_enqueue_style( 'wppg-bxslider-style', WPPG_CSS_DIR . '/jquery.bxslider.css', false, WPPG_VERSION );
            wp_enqueue_style( 'wppg-fontawesome', WPPG_CSS_DIR . '/font-awesome.min.css', false, WPPG_VERSION );
            wp_enqueue_style( 'wppg-font', '//fonts.googleapis.com/css?family=Bitter|Hind|Playfair+Display:400,400i,700,700i,900,900i|Open+Sans:400,500,600,700,900|Lato:300,400,700,900|Montserrat|Droid+Sans|Roboto|Lora:400,400i,700,700i|Roboto+Slab|Rubik|Merriweather:300,400,700,900|Poppins|Ropa+Sans|Playfair+Display|Rubik|Source+Sans+Pro|Roboto+Condensed|Roboto+Slab:300,400,700|Amatic+SC:400,700|Quicksand|Oswald|Quicksand:400,500,700', false );
            wp_enqueue_style( 'wppg-frontend-style', WPPG_CSS_DIR . '/wppg-frontend.css', array( 'wppg-bxslider-style', 'wppg-font' ), WPPG_VERSION );
            wp_enqueue_style( 'wppg-responsive-style', WPPG_CSS_DIR . '/wppg-responsive.css', false, WPPG_VERSION );
            wp_enqueue_script( 'wppg-bxslider-script', WPPG_JS_DIR . '/jquery.bxslider.js', array( 'jquery' ), WPPG_VERSION );
            wp_enqueue_script( 'wppg-frontend-script', WPPG_JS_DIR . '/wppg-frontend.js', array( 'jquery', 'wppg-bxslider-script' ), WPPG_VERSION );
            $frontend_ajax_nonce = wp_create_nonce( 'wppg-frontend-ajax-nonce' );
            $frontend_ajax_object = array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'ajax_nonce' => $frontend_ajax_nonce );
            wp_localize_script( 'wppg-frontend-script', 'wppg_frontend_js_params', $frontend_ajax_object );
        }

//register wp product gallery custom post type
        function wppg_register_post_type(){
            include('inc/admin/register/wppg-register-post.php');
            register_post_type( 'WP Product Gallery', $args );
        }

//adding Blog metabox
        function wppg_add_blog_metabox(){
            add_meta_box( 'wppg_add_blog', __( 'WP Product Gallery', WPPG_TD ), array( $this, 'wppg_add_blog_callback' ), 'wpproductgallery', 'normal', 'high' );
        }

        /*
         * callback function for Blog manager metabox
         */

        function wppg_add_blog_callback( $post ){
            wp_nonce_field( basename( __FILE__ ), 'wppg_product_nonce' );
            include('inc/admin/wppg-blog-meta.php');
        }

//save the metabox
        function wppg_meta_save( $post_id ){

// Checks save status
            $is_autosave = wp_is_post_autosave( $post_id );
            $is_revision = wp_is_post_revision( $post_id );

            $is_valid_nonce = ( isset( $_POST[ 'wppg_product_nonce' ] ) && wp_verify_nonce( $_POST[ 'wppg_product_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
// Exits script depending on save status
            if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
                return;
            }

            if ( isset( $_POST[ 'wppg_option' ] ) ) {

                $wppg_array = ( array ) $_POST[ 'wppg_option' ];

                $val = $this -> wppg_sanitize_array( $wppg_array );
// save data
                update_post_meta( $post_id, 'wppg_option', $val );
            }

            return;
        }

        /*
         * callback function for Blog manager metabox
         */

        function wppg_product_gallery( $post ){
            wp_nonce_field( basename( __FILE__ ), 'wppg_product_nonce' );
            include('inc/admin/fields/price-setting.php');
        }

        function print_array( $array ){
            echo '<pre>';
            print_r( $array );
            echo '</pre>';
        }

        function wppg_selected_post_taxonomy(){
            global $wpdb;
            include( 'inc/ajax/fetch-taxonomy.php' );
            die();
        }

        function wppg_selected_taxonomy_terms(){
            global $wpdb;
            include( 'inc/ajax/fetch-terms.php' );
            die();
        }

        function wppg_hierarchy_terms(){
            global $wpdb;
            include( 'inc/ajax/hierarchy-terms.php' );
            die();
        }

        function wppg_add_meta_condition(){
            global $wpdb;
            include( 'inc/ajax/add-meta.php' );
            die();
        }

        function wppg_add_tax_condition(){
            global $wpdb;
            include( 'inc/ajax/add-tax.php' );
            die();
        }

        function wppg_filter_tax_terms(){
            global $wpdb;
            include( 'inc/ajax/filter-tax.php' );
            die();
        }

        /*
         * Generate random key string
         */

        function wppg_generate_random_string( $length ){
            $string = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $random_string = '';
            for ( $i = 1; $i <= $length; $i ++ ) {
                $random_string .= $string[ rand( 0, 61 ) ];
            }
            return $random_string;
        }

        function wppg_generate_shortcode( $atts, $content = null ){

            ob_start();
            include('inc/frontend/wppg-frontend.php');
            $blog = ob_get_contents();
            ob_end_clean();
            return $blog;
        }

        /*
         * Shortcode Usage Metabox
         */

        function wppg_shortcode_usage_metabox(){
            add_meta_box( 'wppg_shortcode_usage_option', __( 'WP Product Gallery Usage', WPPG_TD ), array( $this, 'wppg_shortcode_usage' ), 'wpproductgallery', 'side', 'default' );
            add_meta_box( 'wppg_upgrade_option', __( 'Upgrade To Pro', WPPG_TD ), array( $this, 'wppg_upgrade_usage' ), 'wpproductgallery', 'side', 'default' );
        }

        function wppg_shortcode_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wppg_shortcode_usage_option_nonce' );
            include('inc/admin/settings/wppg-usages.php');
        }

        function wppg_upgrade_usage( $post ){

            wp_nonce_field( basename( __FILE__ ), 'wppg_upgrade_option_nonce' );
            include('inc/admin/settings/wppg-upgrade.php');
        }

//returns all the terms for category dropdown as options
        function wppg_fetch_category_list( $taxonomy, $term_id ){
            $option_html = "";
            $taxonomies_array[] = $taxonomy;
            $terms = get_terms( $taxonomy, array( 'hide_empty' => false ) );

            $categoryHierarchy = array();
            $this -> wppg_sort_terms_hierarchicaly( $terms, $categoryHierarchy );
            if ( count( $categoryHierarchy ) > 0 ) { //condition check if the taxonomy has atleast single term
                $terms_exclude = array();
                $option_html .= $this -> wppg_print_option( $categoryHierarchy, 1, '', '', $term_id );
            }

            return $option_html;
        }

        function wppg_sort_terms_hierarchicaly( Array &$cats, Array &$into, $parentId = 0 ){
            foreach ( $cats as $i => $cat ) {
                if ( $cat -> parent == $parentId ) {
                    $into[ $cat -> term_id ] = $cat;
                    unset( $cats[ $i ] );
                }
            }

            foreach ( $into as $topCat ) {
                $topCat -> children = array();
                $this -> wppg_sort_terms_hierarchicaly( $cats, $topCat -> children, $topCat -> term_id );
            }
        }

        function wppg_print_option( $terms, $hierarchical = 1, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> wppg_check_parent( $term );
                $option_value = $term -> term_id;
                if ( is_array( $selected_term ) ) {
                    $selected = (in_array( $option_value, $selected_term )) ? 'selected="selected"' : '';
                } else {
                    $selected = ($selected_term == $option_value) ? 'selected="selected"' : '';
                }

                $form .= '<option value="' . $option_value . '" ' . $selected . '>' . $space . $term -> name . '</option>';


                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wppg_print_option( $term -> children, $hierarchical, '', $field_title, $selected_term );
                }
            }
            return $form;
        }

        function wppg_check_parent( $term, $space = '' ){
            if ( is_object( $term ) ) {
                if ( $term -> parent != 0 ) {
                    $space .= str_repeat( '&nbsp;', 2 );
                    $parent_term = get_term_by( 'id', $term -> parent, $term -> taxonomy );
// var_dump($space);
                    $space .= $this -> wppg_check_parent( $parent_term, $space );
                }
            }

            return $space;
        }

        function wppg_print_checkbox( $terms, $form = '', $field_title = '', $selected_term = array() ){
            foreach ( $terms as $term ) {
                $space = $this -> wppg_check_parent( $term );
                $option_value = $term -> slug;
                if ( is_array( $selected_term ) ) {
                    $checked = (in_array( $option_value, $selected_term )) ? 'checked="checked"' : '';
                } else {
                    $checked = ($selected_term == $option_value) ? 'checked="checked"' : '';
                }
                $form .= '<label class="wppg-checkbox-label">' . $space . '<input type="checkbox" name="' . $field_title . '[]"  value="' . $option_value . '" ' . $checked . '/>' . $term -> name . '</label>';

                if ( ! empty( $term -> children ) ) {

                    $form .= $this -> wppg_print_checkbox( $term -> children, '', $field_title, $selected_term );
                }
            }

            return $form;
        }

        /*
         * Redirect function for view count
         */

        function wppg_get_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = get_post_meta( $postID, $count_key, true );
            if ( $count == '' ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );

                return '0 View';
            }

            return $count . ' Views';
        }

        function wppg_set_post_view( $postID ){
            $count_key = 'post_views_count';
            $count = ( int ) get_post_meta( $postID, $count_key, true );
            if ( $count < 1 ) {
                delete_post_meta( $postID, $count_key );
                add_post_meta( $postID, $count_key, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $count_key, ( string ) $count );
            }
        }

        function wppg_page_template_redirect(){
            if ( is_single() ) {
                $this -> wppg_set_post_view( get_the_ID() );
            }
        }

        /*
         * Preview page
         */

        function wppg_preview_page( $post, $link ){

            if ( get_post_type() == 'wpproductgallery' ) {
                $post_status = get_post_status();
                if ( $post_status != 'auto-draft' ) {
                    $post_id = get_the_ID();
                    $link = site_url( '?wpproductgallery_preview=true&blog_id=' . $post_id );
                    return $link;
                }
            } else {
                $post = get_post( get_the_ID() );


                $args = array(
                    'p' => $post -> ID
                    , 'preview' => 'true'
                );
                return add_query_arg( $args, home_url() );
// exit();
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function wppg_sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {

                    $default_sanitize_rule = (is_numeric( $k )) ? 'html' : 'text';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this -> wppg_sanitize_value( $v, $sanitize_type );
                }
                if ( is_array( $v ) ) {
                    $array[ $k ] = $this -> wppg_sanitize_array( $v, $sanitize_rule );
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function wppg_sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html( 'post' );
                    return wp_kses( $value, $allowed_html );
                    break;
                default:
                    return sanitize_text_field( $value );
                    break;
            }
        }

        function wppg_preview_blog(){
            if ( isset( $_GET[ 'wpproductgallery_preview' ], $_GET[ 'blog_id' ] ) && $_GET[ 'wpproductgallery_preview' ] && is_user_logged_in() ) {
                include(WPPG_PATH . 'inc/frontend/wppg-preview.php');
                die();
            }
        }

        /*
         * Adding Submenu page
         */

        function wppg_register_about_us_page(){
            add_submenu_page(
                    'edit.php?post_type=wpproductgallery', __( 'About Us', WPPG_TD ), __( 'About Us', WPPG_TD ), 'manage_options', 'wppg-about-us', array( $this, 'wppg_about_callback' ) );
        }

        function wppg_about_callback(){

            include('inc/admin/wppg-about-page.php');
        }

        function wppg_register_stuff_page(){
            add_submenu_page( 'edit.php?post_type=wpproductgallery', __( 'Documentation', WPPG_TD ), __( 'Documentation', WPPG_TD ), 'manage_options', 'wppg-documentation-wp', '__return_false', null, 9 );
            add_submenu_page( 'edit.php?post_type=wpproductgallery', __( 'Check Premium Version', WPPG_TD ), __( 'Check Premium Version', WPPG_TD ), 'manage_options', 'wppg-premium-wp', '__return_false', null, 9 );
        }

        function wppg_stuff_callback(){

            include('inc/admin/wppg-stuff-page.php');
        }

        function wppg_remove_row_actions( $actions ){
            if ( get_post_type() == 'wpproductgallery' ) { // choose the post type where you want to hide the button
                unset( $actions[ 'view' ] ); // this hides the VIEW button on your edit post screen
                unset( $actions[ 'inline hide-if-no-js' ] );
            }
            return $actions;
        }

        /* Add custom column to post list */

        function wppg_columns_head( $columns ){
            $columns[ 'shortcodes' ] = __( 'Shortcodes', WPPG_TD );
            $columns[ 'template' ] = __( 'Template Include', WPPG_TD );
            return $columns;
        }

        function wppg_columns_content( $column, $post_id ){

            if ( $column == 'shortcodes' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="20" readonly="readonly">[wppg id="<?php echo esc_attr($post_id); ?>"]</textarea><?php
            }
            if ( $column == 'template' ) {
                $id = $post_id;
                ?>
                <textarea style="resize: none;" rows="2" cols="41" readonly="readonly">&lt;?php echo do_shortcode("[wppg id='<?php echo esc_attr($post_id); ?>']"); ?&gt;</textarea><?php
            }
        }

        /*
         * Remove view and preview from wp blog post
         */

        function wppg_posttype_admin_css(){
            global $post_type;
            $post_types = array(
                /* set post types */
                'wpproductgallery'
            );
            if ( in_array( $post_type, $post_types ) )
                echo '<style type="text/css">#view-post-btn, .updated a,#screen-meta-links .screen-meta-toggle
                {display: none;}</style>';
        }

        function wppg_widget_register(){
            register_widget( 'WPPG_Widget' );
        }

// retrieves the attachment ID from the file URL
        function wppg_get_image_id( $image_url ){
            global $wpdb;
            $query = "SELECT ID FROM {$wpdb -> posts} WHERE guid='$image_url'";
            $id = $wpdb -> get_var( $query );
            return $id;
        }

        function wppg_fetch_category( $post, $category ){
            $categories = get_the_terms( $post, $category );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPPG_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                }
                return trim( $output, $separator );
            }
        }

        function wppg_fetch_content( $post, $excerpt_length ){

            return substr( get_the_excerpt(), 0, $excerpt_length );
        }

        function wppg_filter_category_block( $post, $taxonomy ){
            $categories = get_the_terms( $post, $taxonomy );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' wppg-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                return trim( $output, $separator );
            }
        }

        function wppg_filter_category( $post_id, $taxonomy ){
            $categories = get_the_terms( $post_id, $taxonomy );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wppg-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wppg-filter-all ' . trim( $output, $separator );
            }
            return;
        }

        public function wppg_variable_pricing( $download_id ){
            // Bail if this download doesn't have variable pricing
            if ( ! edd_has_variable_prices( $download_id ) ) {
                echo edd_price( $download_id );
            }
            // Get the pricing options for this product
            $prices = apply_filters( 'edd_purchase_variable_prices', edd_get_variable_prices( $download_id ), $download_id );
            $type = edd_single_price_option_mode( $download_id ) ? 'checkbox' : 'radio';
            do_action( 'edd_before_price_options', $download_id );
            ?>
            <div class="wppg_price_options" data-link="<?php echo edd_get_checkout_uri(); ?>" data-id="<?php echo esc_attr($download_id); ?>" >
                <?php
                if ( $prices ) {
                    echo '<select class="wppg-variable-price" name="edd_options[price_id][]">';
                    foreach ( $prices as $key => $price ) {
                        printf(
                                '<option for="%1$s" name="edd_options[price_id][]" id="%1$s" class="%2$s" value="%3$s" %5$s>%4$s</option>', esc_attr( 'edd_price_option_' . $download_id . '_' . $key ), esc_attr( 'edd_price_option_' . $download_id ), esc_attr( $key ), esc_html( $price[ 'name' ] . ' - ' . edd_currency_filter( edd_format_amount( $price[ 'amount' ] ) ) ), selected( isset( $_GET[ 'price_option' ] ), $key, false )
                        );
                        do_action( 'edd_after_price_option', $key, $price, $download_id );
                    }
                    echo '</select>';
                }
                do_action( 'edd_after_price_options_list', $download_id, $prices, $type );
                ?></div>
            <?php
            do_action( 'edd_after_price_options', $download_id );
        }

        function wppg_redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wppg-documentation-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/wp-product-gallery-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'wppg-premium-wp' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/wp-product-gallery/' );
                exit();
            }
        }

        function wppg_admin_footer_text( $text ){
            global $post;
            if ( (isset( $_GET[ 'post_type' ] ) && $_GET[ 'post_type' ] == 'wpproductgallery' ) ) {
                $link = 'https://wordpress.org/support/plugin/wp-product-gallery-lite/reviews/#new-post';
                $pro_link = 'https://accesspressthemes.com/wordpress-plugins/wp-product-gallery/';
                $text = 'Enjoyed WP Product Gallery Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">WP Product Gallery</a> - more features, more power!';
                return $text;
            } else {
                return $text;
            }
        }

        function wppg_plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'wp-product-gallery-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/wp-product-gallery-lite/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/wp-product-gallery-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/wp-product-gallery/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

    }

//class terminations

    $wppg_obj = new WPPG_Class();
}//class exist check close

include('inc/admin/register/wppg-widget.php');
