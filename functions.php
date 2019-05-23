<?php
function child_theme_enqueue_styles() {
    wp_enqueue_style( 'child-main', get_stylesheet_directory_uri() . '/css/child-main.css', array( 'main.min' ), wp_get_theme()->get('Version') );
    wp_enqueue_script( 'child-main', get_stylesheet_directory_uri() . '/js/child-main.js', 'jquery', wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'child-admin', get_stylesheet_directory_uri() . '/js/child-admin.js', 'jquery', wp_get_theme()->get('Version'), true );
    // wp_enqueue_style( 'child-main.min', get_stylesheet_directory_uri() . '/css/child-main.min.css', array( 'main.min' ), wp_get_theme()->get('Version') );
    // wp_enqueue_script( 'child-main.min', get_stylesheet_directory_uri() . '/js/child-main.min.js', 'jquery', wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
function child_admin_enqueue_styles() {
    wp_enqueue_script( 'child-admin', get_stylesheet_directory_uri() . '/js/child-admin.js', 'jquery', wp_get_theme()->get('Version'), true );
}
add_action( 'admin_enqueue_scripts', 'child_admin_enqueue_styles' );

require_once('functions/config.php');
require_once(get_template_directory() . '/functions/array.php');
require_once('functions/array.php');
// require_once('functions/post-types.php');
// require_once('functions/taxonomy.php');
require_once('functions/metaboxes.php');
// require_once('functions/shortcodes.php');
require_once('functions/theme-hooks.php');
// require_once('functions/setup.php');
require_once('scripts.php');
if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {    
    // WP > 5 beta
    add_filter('use_block_editor_for_post_type', '__return_false', 100);    
} else {    
    // WP < 5 beta
    add_filter('gutenberg_can_edit_post_type', '__return_false');    
}