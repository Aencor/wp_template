<?php

/**
 * Includes
 *
 * The $monk_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$monk_includes = array(
	'functions/autoplugins.php',     // Autoplugin installations
	'functions/init.php',            // Initial theme setup and constants
	'functions/blocks.php',          // Block Register
	'functions/menus.php',           // Removing unneeded WP defaults
	'functions/scripts.php',         // Scripts and stylesheets
	'functions/security.php',        // Security focused settings
	'functions/cpt.php',             // Custom Post Types
	'functions/options.php',         // ACF Theme Options
	'functions/shortcodes.php',      // Add Shortcodes
	'functions/optional.php',      	// Optional Settings
	'functions/removes.php',      	// Removes default WordPress elements
	'functions/sidebars.php',      	// Configure Sidebars
	'functions/supports.php',      	// Theme Supports
);

function monk_include( $includes ){
	if( !is_array( $includes ) ){
			$includes = array( $includes );
	}
	foreach ($includes as $file) {
			if (!$filepath = locate_template($file)) {
					trigger_error(sprintf(__('Error locating %s for inclusion', 'nylon'), $file), E_USER_ERROR);
			}
			require_once $filepath;
	}
}
monk_include( $monk_includes );




	/** ===REGISTER AJAX ON MAIN JS == */
		$admin_scripts = array( 'ajax' => admin_url( 'admin-ajax.php' ) );
		wp_localize_script( 'main-js', 'admin_scripts', $admin_scripts );

	/* Optional

  


	// Use AJAX CALLS
	add_action( 'wp_ajax_$nombrecall', '$nombrecall_init' );
	add_action( 'wp_ajax_nopriv_$nombrecall', '$nombrecall_init' );

	function $nombrecall_init() {

	}

	// Change Thumbnail sizes
	add_image_size('home', 200, 217, true);
	add_image_size('medium', 600, 300, true);


	*/

?>