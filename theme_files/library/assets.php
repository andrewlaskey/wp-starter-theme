<?php

/***
 * Assets
 */

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function theme_name_scripts_and_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		// Register scripts and styles

		// Load correct files depending on Wordpress environment
		if ( WP_ENV == 'development' ) {

			wp_register_style( 'theme_name-stylesheet', get_stylesheet_directory_uri() . '/assets/styles/style.css', array(), '', 'all' );	
			wp_register_script( 'theme_name-js', get_stylesheet_directory_uri() . '/assets/scripts/build/scripts.js', array( 'jquery' ), '', true );

		} else {

			wp_register_style( 'theme_name-stylesheet', get_stylesheet_directory_uri() . '/assets/styles/style.min.css', array(), '', 'all' );	
			wp_register_script( 'theme_name-js', get_stylesheet_directory_uri() . '/assets/scripts/build/scripts.min.js', array( 'jquery' ), '', true );

		}

		// enqueue styles and scripts
		wp_enqueue_style( 'theme_name-stylesheet' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'theme_name-js' );
	}
}