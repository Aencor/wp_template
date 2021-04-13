<?php
  // Auto Plugin Setup
	require_once ('inc/theme_plugin_activator/class-tgm-plugin-activation.php');

	add_action( 'tgmpa_register', 'monk_theme_register_required_plugins' );

	function monk_theme_register_required_plugins() {
		$plugins = array(
	
			// This is an example of how to include a plugin bundled with a theme.
			array(
				'name'               => 'Advanced Custom Fields PRO',
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_template_directory() . '/functions/inc/theme_plugin_activator/plugins/advanced-custom-fields-pro.zip',
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '', 
				'is_callable'        => '', 
			),
			array(
				'name'               => 'All In One WP Migration File Extension',
				'slug'               => 'all-in-one-wp-migration-file-extension',
				'source'             => get_template_directory() . '/functions/inc/theme_plugin_activator/plugins/all-in-one-wp-migration-file-extension.zip',
				'required'           => false,
			),
			array(
				'name'               => 'All In One WP Migration Unlimited Extension',
				'slug'               => 'all-in-one-wp-migration-unlimited-extension',
				'source'             => get_template_directory() . '/functions/inc/theme_plugin_activator/plugins/all-in-one-wp-migration-unlimited-extension.zip',
				'required'           => false,
			),
	
			// This is an example of how to include a plugin from the WordPress Plugin Repository.
			array(
				'name'      => 'WebP Express',
				'slug'      => 'webp-express',
				'required'  => false
			),
			array(
				'name'        => 'WordPress SEO by Yoast',
				'slug'        => 'wordpress-seo',
				'required'  => false
			),
			array(
				'name'        => 'Contact Form 7',
				'slug'        => 'contact-form-7',
				'required'  => false
			),
			array(
				'name'        => 'ACF to REST API',
				'slug'        => 'acf-to-rest-api',
				'required'  => false
			),
			array(
				'name'        => 'Advanced Contact form 7 DB',
				'slug'        => 'advanced-cf7-db',
				'required'  => false
			),
			array(
				'name'        => 'Duplicate Post',
				'slug'        => 'duplicate-post',
				'required'  => false,
				'force_activation'   => true
			),
			array(
				'name'        => 'Wordfence Security – Firewall & Malware Scan',
				'slug'        => 'wordfence',
				'required'  => false,
				'force_activation'   => true
			),
			array(
				'name'        => 'W3 Total Cache',
				'slug'        => 'w3-total-cache',
				'required'  => false,
				'force_activation'   => true
			),
			array(
				'name'        => 'Under Construction',
				'slug'        => 'under-construction-page',
				'required'  => false,
				'force_activation'   => true
			),
			array(
				'name'        => 'All-in-One WP Migration',
				'slug'        => 'all-in-one-wp-migration',
				'required'  => false,
				'force_activation'   => true
			),

			
	
		);
	
		$config = array(
			'id'           => 'monk-theme',             
			'default_path' => '',                      
			'menu'         => 'tgmpa-install-plugins', 
			'parent_slug'  => 'themes.php',            
			'capability'   => 'edit_theme_options',   
			'has_notices'  => true,                   
			'dismissable'  => true,                   
			'dismiss_msg'  => '',                    
			'is_automatic' => true,                  
			'message'      => '',                 
		);
	
		tgmpa( $plugins, $config );
	}
?>