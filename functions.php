<?php

	//Inserción de jQuery
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.3.1.min.js", '', '', false);
	   wp_enqueue_script('jquery');
	}

	/** ==================== 
	 * ==THEME SUPPORTS ====
	 * ===================*/

	 // WP Menus Support
	add_theme_support('menus');
	// Post Thumbnail support
	add_theme_support('post-thumbnails');


	//Add ID Column to posts and page table on admin
	add_filter('manage_posts_columns', 'posts_columns_id', 5);
	add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns_id', 5);
	add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);

	function posts_columns_id($defaults){
		$defaults['wps_post_id'] = __('ID');
		return $defaults;
	}
	function posts_custom_id_columns($column_name, $id){
		if($column_name === 'wps_post_id'){
			echo $id;
		}
	}


	// Script & Style loading
	add_action( 'wp_enqueue_scripts', 'theme_scripts' );
	function theme_scripts() {

		/* =====================
		======= JS PLUGINS =====
		====================== */

		//Prefixfree 
		wp_enqueue_script( 'prefixfree', get_template_directory_uri() . '/assets/js/prefixfree.min.js', array(), '1.0', true );
		// Bootstrap
		wp_enqueue_script( "popper", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", array(), '1.14.7', true );
		wp_enqueue_script( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js", array(), '4.3.1', true );
		//GSAP TweenMax
		wp_enqueue_script( "gsap-tm-cdn", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . ":////cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js", array(), '3.3.4', true );
		//Theme Custom Script
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );

		/* =====================
		======= CSS PLUGINS =====
		====================== */

		//Bootstrap
		wp_enqueue_style( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css", true );
		//Animate
		wp_enqueue_style( 'animate', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css", true );
		//Font Awesome
		wp_enqueue_style( "font-awesome", get_template_directory_uri() . '/assets/css/fontawesome.min.css', true );
		wp_enqueue_style( "font-awesome-all", get_template_directory_uri() . '/assets/css/all.min.css', true );
	}


	/** ===REGISTER AJAX ON MAIN JS == */
		$admin_scripts = array( 'ajax' => admin_url( 'admin-ajax.php' ) );
		wp_localize_script( 'main-js', 'admin_scripts', $admin_scripts );

	// Change default excerpt Length
	function new_excerpt_length($length) {
		return 140;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

	// Auto Plugin Setup
	require_once ('inc/theme_plugin_activator/class-tgm-plugin-activation.php');

	add_action( 'tgmpa_register', 'monk_theme_register_required_plugins' );

	function monk_theme_register_required_plugins() {
		$plugins = array(
	
			// This is an example of how to include a plugin bundled with a theme.
			array(
				'name'               => 'Advanced Custom Fields PRO',
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_template_directory() . '/inc/theme_plugin_activator/plugins/advanced-custom-fields-pro.zip',
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
				'source'             => get_template_directory() . '/inc/theme_plugin_activator/plugins/all-in-one-wp-migration-file-extension.zip',
				'required'           => false,
			),
			array(
				'name'               => 'All In One WP Migration Unlimited Extension',
				'slug'               => 'all-in-one-wp-migration-unlimited-extension',
				'source'             => get_template_directory() . '/inc/theme_plugin_activator/plugins/all-in-one-wp-migration-unlimited-extension.zip',
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



	// Login CSS
	function my_login_stylesheet() {
		wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
	
	/* Optional

	/* Sidebar Support
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=> $sidebar_name,
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
	));
  
	// ACF Register Options Page
	if( function_exists('acf_add_options_sub_page') ) {
		acf_add_options_sub_page($pagename);
	}

	// Use AJAX CALLS
	add_action( 'wp_ajax_$nombrecall', '$nombrecall_init' );
	add_action( 'wp_ajax_nopriv_$nombrecall', '$nombrecall_init' );

	function $nombrecall_init() {

	}

	// POST FORMATS
	add_theme_support( 'post-formats', array( 'chat', 'audio', 'video', 'status', 'quote', 'link', 'gallery', 'aside' ) );

	// Change Thumbnail sizes
	add_image_size('home', 200, 217, true);
	add_image_size('medium', 600, 300, true);


	// Change Roles Names
	function wps_change_role_name() {
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
	    $wp_roles->roles[$rol]['name'] = '$nombreRol';
	    $wp_roles->role_names[$rol] = '$nombreRol';
	}
	add_action('init', 'wps_change_role_name');

	// Redirect to post if is the only one on Category or tag
	function redirect_to_post(){
	    global $wp_query;
	    if( is_archive() && $wp_query->post_count == 1 ){
	        the_post();
	        $post_url = get_permalink();
	        wp_redirect( $post_url );
	    }
	} add_action('template_redirect', 'redirect_to_post');

	// Add search input to WP Menus
	add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
	function add_search_form($items, $args) {
	if( $args->theme_location == 'MENU-NAME' )
	        $items .= '<li class="search"><form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" value="search" name="s" id="s" /><input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" /></form></li>';
	        return $items;
	}
	*/

?>