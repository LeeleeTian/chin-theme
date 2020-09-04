<?php

require_once 'vendor/autoload.php';

/**
 * Load environment
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

/**
 * Roots includes
 */
require_once locate_template('/app/roots/utils.php');           // Utility functions
require_once locate_template('/app/roots/init.php');            // Initial theme setup and constants
require_once locate_template('/app/roots/wrapper.php');         // Theme wrapper class
require_once locate_template('/app/roots/sidebar.php');         // Sidebar class
require_once locate_template('/app/roots/config.php');          // Configuration
require_once locate_template('/app/roots/titles.php');          // Page titles
require_once locate_template('/app/roots/cleanup.php');         // Cleanup
require_once locate_template('/app/roots/nav.php');             // Custom nav modifications
require_once locate_template('/app/roots/gallery.php');         // Custom [gallery] modifications
require_once locate_template('/app/roots/comments.php');        // Custom comments modifications
require_once locate_template('/app/roots/relative-urls.php');   // Root relative URLs
require_once locate_template('/app/roots/widgets.php');         // Sidebars and widgets
require_once locate_template('/app/roots/scripts.php');         // Scripts and stylesheets
require_once locate_template('/app/roots/custom.php');          // Custom functions

require_once 'app/core.php';


function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyAb-ao4VTjR6GIxYYwL9ZLeQWyOLuoB7GQ');
}

add_action('acf/init', 'my_acf_init');
