<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$labels = array(
    'name' => _x( 'WP Product Gallery', 'post type general name', WPPG_TD ),
    'singular_name' => _x( 'WP Product Gallery', 'post type singular name', WPPG_TD ),
    'menu_name' => _x( 'WP Product Gallery', 'admin menu', WPPG_TD ),
    'name_admin_bar' => _x( 'WP Product Gallery', 'add new on admin bar', WPPG_TD ),
    'add_new' => _x( 'Add New', 'WP Product Gallery', WPPG_TD ),
    'add_new_item' => __( 'Add New WP Product Gallery', WPPG_TD ),
    'new_item' => __( 'New WP Product Gallery', WPPG_TD ),
    'edit_item' => __( 'Edit WP Product Gallery', WPPG_TD ),
    'view_item' => __( 'View WP Product Gallery', WPPG_TD ),
    'all_items' => __( 'All WP Product Gallery', WPPG_TD ),
    'search_items' => __( 'Search WP Product Gallery', WPPG_TD ),
    'parent_item_colon' => __( 'Parent WP Product Gallery:', WPPG_TD ),
    'not_found' => __( 'No WP Product Gallery found.', WPPG_TD ),
    'not_found_in_trash' => __( 'No WP Product Gallery found in Trash.', WPPG_TD )
);

$args = array(
    'labels' => $labels,
    'description' => __( 'Description.', WPPG_TD ),
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-format-gallery',
    'query_var' => true,
    'rewrite' => array( 'slug' => WPPG_TD ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title' )
);

$inbuilt_labels = array(
    'name' => _x( 'WP Product Manager', 'post type general name', WPPG_TD ),
    'singular_name' => _x( 'WP Product Manager', 'post type singular name', WPPG_TD ),
    'menu_name' => _x( 'WP Product Manager', 'admin menu', WPPG_TD ),
    'name_admin_bar' => _x( 'WP Product Manager', 'add new on admin bar', WPPG_TD ),
    'add_new' => _x( 'Add New', 'Product', WPPG_TD ),
    'add_new_item' => __( 'Add New Product', WPPG_TD ),
    'new_item' => __( 'New Product', WPPG_TD ),
    'edit_item' => __( 'Edit Product', WPPG_TD ),
    'view_item' => __( 'View Product', WPPG_TD ),
    'all_items' => __( 'All Products', WPPG_TD ),
    'search_items' => __( 'Search Product', WPPG_TD ),
    'parent_item_colon' => __( 'Parent Product:', WPPG_TD ),
    'not_found' => __( 'No Product found.', WPPG_TD ),
    'not_found_in_trash' => __( 'No  Product  found in Trash.', WPPG_TD )
);

$inbuilt_args = array(
    'labels' => $inbuilt_labels,
    'description' => __( 'Description', WPPG_TD ),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'menu_position' => null,
    'menu_icon' => 'dashicons-post-status',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'wppg_product_manager' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,
    'supports' => array( 'title', // post title
        'editor', // post content
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'comments', // post comments
    )
);


