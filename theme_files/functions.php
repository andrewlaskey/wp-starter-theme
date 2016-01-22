<?php
/*
Author: [AUTHOR]
URL: [URL]
*/

// Setup Environment
if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'development');
}

// Include theme files
$theme_name_includes = [
  'library/setup.php',      // Setup functions
  'library/assets.php',      // Scripts and Stylesheets
  'library/nav.php',         // Custom nav walkers and pagination
  'library/extras.php'       // helper functions
];

foreach ($theme_name_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'theme_name'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/*********************
LAUNCH THEME_NAME
Let's get everything up and running.
*********************/

function theme_name_init() {

  // setup.php
  add_action( 'init', 'head_cleanup' ); //clean up head
  add_filter( 'the_generator', 'rss_version' ); // remove WP version from RSS
  add_filter( 'gallery_style', 'gallery_style' ); // clean up gallery output in wp
  theme_support(); // launching this stuff after theme setup

  // assets.php
  add_action( 'wp_enqueue_scripts', 'theme_name_scripts_and_styles', 999 ); // enqueue base scripts and styles

  // extras.php
  add_filter( 'the_content', 'bones_filter_ptags_on_images' ); // cleaning up random code around images
  add_filter( 'excerpt_more', 'bones_excerpt_more' ); // cleaning up excerpt

} /* end theme_name init */

// let's get this party started
add_action( 'after_setup_theme', 'theme_name_init' );



/* DON'T DELETE THIS CLOSING TAG */ ?>
