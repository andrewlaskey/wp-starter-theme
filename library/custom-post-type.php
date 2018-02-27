<?php

// Flush your rewrite rules
function theme_flush_rewrite_rules() {
	flush_rewrite_rules();
}

function init_custom_post_types() {
	// Register Custom Post Type
	//add_example_post_type();
}

/* https://generatewp.com/post-type/ */
function add_example_post_type() {

	$labels = array(
		'name'                  => _x( 'Industries', 'Post Type General Name', '*THEME_NAME*' ),
		'singular_name'         => _x( 'Industry', 'Post Type Singular Name', '*THEME_NAME*' ),
		'menu_name'             => __( 'Industries', '*THEME_NAME*' ),
		'name_admin_bar'        => __( 'Industries', '*THEME_NAME*' ),
		'archives'              => __( 'Industry Archives', '*THEME_NAME*' ),
		'attributes'            => __( 'Industry Attributes', '*THEME_NAME*' ),
		'parent_item_colon'     => __( 'Parent Item:', '*THEME_NAME*' ),
		'all_items'             => __( 'All Industries', '*THEME_NAME*' ),
		'add_new_item'          => __( 'Add New Industry', '*THEME_NAME*' ),
		'add_new'               => __( 'Add New', '*THEME_NAME*' ),
		'new_item'              => __( 'New Industry', '*THEME_NAME*' ),
		'edit_item'             => __( 'Edit Industry', '*THEME_NAME*' ),
		'update_item'           => __( 'Update Industry', '*THEME_NAME*' ),
		'view_item'             => __( 'View Industry', '*THEME_NAME*' ),
		'view_items'            => __( 'View Industries', '*THEME_NAME*' ),
		'search_items'          => __( 'Search Industry', '*THEME_NAME*' ),
		'not_found'             => __( 'Not found', '*THEME_NAME*' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '*THEME_NAME*' ),
		'featured_image'        => __( 'Featured Image', '*THEME_NAME*' ),
		'set_featured_image'    => __( 'Set featured image', '*THEME_NAME*' ),
		'remove_featured_image' => __( 'Remove featured image', '*THEME_NAME*' ),
		'use_featured_image'    => __( 'Use as featured image', '*THEME_NAME*' ),
		'insert_into_item'      => __( 'Insert into industry', '*THEME_NAME*' ),
		'uploaded_to_this_item' => __( 'Uploaded to this industry', '*THEME_NAME*' ),
		'items_list'            => __( 'Industries list', '*THEME_NAME*' ),
		'items_list_navigation' => __( 'Industries list navigation', '*THEME_NAME*' ),
		'filter_items_list'     => __( 'Filter industries list', '*THEME_NAME*' ),
	);
	$args = array(
		'label'                 => __( 'Industry', '*THEME_NAME*' ),
		'description'           => __( 'Industries', '*THEME_NAME*' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'industry', $args );
}