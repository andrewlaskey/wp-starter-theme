<?php
/*
Author: Idiom Interactive
URL: http://idiom.co/
*/

/*
 ATTENTION!!

 When setting up this theme for the first time, find-replace *THEME NAME* for the full theme name and *THEME_NAME* for the theme slug.

*/

// Setup Environment
if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'production');
}

/*
write_log for easy debugging
*/
if (!function_exists('write_log')) {
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) , 3,  WP_CONTENT_DIR . '/debug.log');
            } else {
                error_log( $log , 3, WP_CONTENT_DIR . '/debug.log');
            }
        }
    }
}

// Include theme files
$theme_includes = [
  'library/setup.php',      // Setup functions
  'library/assets.php',      // Scripts and Stylesheets
  'library/nav.php',         // Custom nav walkers and pagination
  'library/extras.php',       // helper functions
  'library/ajax.php',
  'library/custom-post-type.php'
];

foreach ($theme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'theme'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/*********************
LAUNCH THEME
Let's get everything up and running.
*********************/

function theme_init() {

  // setup.php
  add_action( 'init', 'head_cleanup' ); //clean up head
  add_filter( 'the_generator', 'rss_version' ); // remove WP version from RSS
  add_filter( 'gallery_style', 'gallery_style' ); // clean up gallery output in wp

  // assets.php
  //add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
  add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles', 999 ); // enqueue base scripts and styles
  add_action( 'admin_head', 'admin_styles_and_scripts' );

  theme_support(); // launching this stuff after theme setup

  // extras.php
  add_filter( 'the_content', 'theme_filter_ptags_on_images' ); // cleaning up random code around images
  add_filter( 'excerpt_more', 'theme_excerpt_more' ); // cleaning up excerpt

  // editor.php
  //add_filter( 'mce_buttons_2', 'tinymce_editor_buttons' );
  //add_filter( 'tiny_mce_before_init', 'tinymce_before_init' ); 

} /* end theme init */

add_action( 'after_setup_theme', 'theme_init' );

// custom-post-types.php
//add_action( 'after_switch_theme', 'theme_flush_rewrite_rules' );
//add_action( 'init', 'init_custom_post_types'); // add custom post type

// nav.php
//add_filter( 'walker_nav_menu_start_el', 'custom_menu_image_nav_menu_item_filter', 15, 4 );

// extras.php
add_filter( 'embed_oembed_html', 'responsive_oembed_html', 99, 3 ); // add responsive embed wrapper
add_filter( 'video_embed_html', 'responsive_oembed_html' ); // add responsive embed wrapper
//add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

// ajax.php
//add_action('wp_ajax_example', 'example');
//add_action('wp_ajax_nopriv_example', 'example');

/* DON'T DELETE THIS CLOSING TAG */ ?>
