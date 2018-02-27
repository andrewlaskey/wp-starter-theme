<?php

/***
 * Assets
 */

/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading modernizr and jquery, and reply script
function theme_scripts_and_styles() {

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	if (!is_admin()) {

		// Register scripts and styles

		// Load correct files depending on Wordpress environment
		if ( WP_ENV == 'development' ) {

			wp_register_style( 'theme-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '', 'all' );	
			wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/build/scripts.js', array( 'jquery' ), '', true );

		} else {

			wp_register_style( 'theme-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );	
			wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/build/scripts.min.js', array( 'jquery' ), '', true );

		}

		wp_localize_script( 'theme-js', '*THEME_NAME*', array(
		        'nonce' => wp_create_nonce( 'theme_nonce' ), // Create nonce which we later will use to verify AJAX request
		        'url' => admin_url( 'admin-ajax.php', 'relative' )
			)
		);

		// Modernizr - Only currently used for flexbox detection
		wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', false, NULL, true );

		// Google Fonts
		//wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Roboto:Roboto:400,500,700,900', array(), '', 'all' );

		// enqueue styles and scripts
		wp_enqueue_script( 'modernizr' );
		//wp_enqueue_style( 'google-fonts' );
		wp_enqueue_style( 'theme-stylesheet' );

		//wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'theme-js' );
	}

	if (is_admin()) {

	}
}

function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

function admin_styles_and_scripts () {
	wp_register_style( 'theme-admin-styles', get_stylesheet_directory_uri() . '/assets/styles/admin.css', array(), '', 'all' );

	wp_enqueue_style( 'theme-admin-styles' );
}

function show_theme_image( $file_name = '', $atts = array() ) {
	$src_path = get_stylesheet_directory_uri() . '/assets/images/' . $file_name;

	$attr_str = '';

	foreach ($atts as $key => $value) {
		$attr_str .= $key . '="' . $value . '" ';
	}

	echo '<img src="' . $src_path . '" ' . $attr_str . '/>';
}