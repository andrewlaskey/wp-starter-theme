<?php

/***
 * Theme Setup
 */

function theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	set_post_thumbnail_size(125, 125, true);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'pgtheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'pgtheme' ) // secondary nav in footer
		)
	);

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

	if (function_exists('register_sidebar')) {

		register_sidebar(array(
			'name' => 'Resources Sidebar',
			'id'   => 'sidebar',
			'description'   => 'Resources sidebar widgetized area.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));

	}

}

// Clean up WP Head
function head_cleanup() {
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // category feeds
	
	remove_action( 'wp_head', 'feed_links', 2 ); // post and comment feeds
	
	remove_action( 'wp_head', 'rsd_link' ); // EditURI link
	
	remove_action( 'wp_head', 'wlwmanifest_link' ); // windows live writer
	
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // previous link
	
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // links for adjacent posts
	
	remove_action( 'wp_head', 'wp_generator' ); // WP version
	
	add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style', 1 ); // remove pesky injected css for recent comments widget
	
	add_action( 'wp_head', 'remove_recent_comments_style', 1 ); // clean up comment styles in the head

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

// remove WP version from RSS
function rss_version() { return ''; }

// remove injected CSS for recent comments widget
function remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) {
  $content_width = 1140;
}

/***
 * Add ACF theme options page
 ***/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> '*THEME NAME* Settings',
		'menu_title'	=> '*THEME NAME* Settings',
		'menu_slug' 	=> '*THEME_NAME*-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}