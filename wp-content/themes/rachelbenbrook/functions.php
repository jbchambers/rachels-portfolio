<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = array (
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
);

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action( 'init', 'cptui_register_my_cpts' );
function cptui_register_my_cpts() {
    $labels = array(
        "name" => "Portfolio Items",
        "singular_name" => "Portfolio Item",
        "menu_name" => "Portfolio",
        "all_items" => "Portfolio Items",
        "add_new" => "Add New",
        "add_new_item" => "Add New Portfolio Item",
        "edit_item" => "Edit Portfolio Item",
        "new_item" => "New Portfolio Item",
    );

    $args = array(
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "show_ui" => true,
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "page",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "work", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "excerpt", "thumbnail", "page-attributes", "post-formats" ),		"taxonomies" => array( "category" )	);
    register_post_type( "portfolio", $args );

// End of cptui_register_my_cpts()
}

if( function_exists('acf_add_options_page') ) {

    $page = acf_add_options_page(array(
        'page_title' 	=> 'Site Images',
        'menu_title' 	=> 'Site Images',
        'menu_slug' 	=> 'site-images-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false
    ));

}