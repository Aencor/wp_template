<?php

	//Inserción de jQuery
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.3.1.min.js", false, null);
	   wp_enqueue_script('jquery');
	}

	// Soporte para menús con wp_nav_menu( array('menu' => 'Nombre_del_menu' ));
	add_theme_support('menus');

	// Soporte para imagen destacada
	add_theme_support('post-thumbnails');

	// shortcode in widgets
	if ( !is_admin() ){
	    add_filter('widget_text', 'do_shortcode', 11);
	}

	//Añadir columna de IDs
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


	// Registrar scripts en el tema
	add_action( 'wp_enqueue_scripts', 'registrar_scripts', 1 );
	function registrar_scripts() {
		//Scripts
		//Prefixfree
		wp_register_script( 'prefixfree', get_template_directory_uri() . '/assets/js/prefixfree.min.js', array( 'jquery' ), '1.0', true );
		// Bootstrap
		wp_register_script( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js", array( 'jquery' ), '1.0', true );
		//Popper
		wp_register_script( "popper", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://unpkg.com/popper.js/dist/umd/popper.min.js", true );
		//GSAP TweenMax
		wp_register_script( "gsap-tm-cdn", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js", true );
		//Scroll Magic
		wp_register_script( "scrollmagic-cdn", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdn.jsdelivr.net/g/scrollmagic@2.0.5(ScrollMagic.min.js+plugins/animation.gsap.min.js+plugins/animation.velocity.min.js+plugins/debug.addIndicators.min.js+plugins/jquery.ScrollMagic.min.js)", true );
		//Main
		wp_register_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0', true );
		//CSS
		//Bootstrap
		wp_register_style( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css", true );
		
		//Animate
		wp_register_style( 'animate', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css", true );
		//Font Awesome
		wp_register_style( "font-awesome", get_template_directory_uri() . '/assets/css/fontawesome.min.css', true );
		//Font Awesome All
		wp_register_style( "font-awesome-all", get_template_directory_uri() . '/assets/css/all.min.css', true );
		// Para usar ajax
		/*
		$admin_scripts = array( 'ajax' => admin_url( 'admin-ajax.php' ) );
	 	wp_localize_script( $scriptenelqueusamosajax, 'admin_scripts', $admin_scripts );
	 	*/
	}

	// Añadir los scripts al DOM
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
	function theme_enqueue_scripts() {
		// Scripts
		wp_enqueue_script('prefixfree');
		wp_enqueue_script('popper');
		wp_enqueue_script('bootstrap');
		// wp_enqueue_script('gsap-tm-cdn');
		// wp_enqueue_script('scrollmagic-cdn');
		wp_enqueue_script('main');
		// CSS
		wp_enqueue_style('bootstrap');
		wp_enqueue_style('animate');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('font-awesome-all');
	}

	// Cambiar largo del excerpt
	function new_excerpt_length($length) {
		return 140;
	}
	add_filter('excerpt_length', 'new_excerpt_length');

	/* Opcionales
  	

	/* Soporte para sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar(array('name'=>'nombre_de_la_sidebar',
		'before_title' => '<div class="nombre_de_la_clase_titulo">',
		'after_title' => '</div>',
		'before_widget' => '<div class="contenedor_del_widget">',
		'after_widget' => '</div>',
	));
  
	// Registrar options page con ACF
	if( function_exists('acf_add_options_sub_page') ) {

		acf_add_options_sub_page($pagename);
	}

	// Login Nuevo
	function my_login_stylesheet() {
	    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

	// Usar ajax
	add_action( 'wp_ajax_$nombrecall', '$nombrecall_init' );
	add_action( 'wp_ajax_nopriv_$nombrecall', '$nombrecall_init' );

	function $nombrecall_init() {

	}

	//Añadir google analytics
	add_action('wp_footer', 'add_googleanalytics');
	function add_googleanalytics() { ?>
	// Paste your Google Analytics code from Step 6 here
	<?php }

	// Añadir soporte para posrt formats
	add_theme_support( 'post-formats', array( 'chat', 'audio', 'video', 'status', 'quote', 'link', 'gallery', 'aside' ) );

	// Cambiar tamaño de the post thumbnail
	add_image_size('home', 200, 217, true);
	add_image_size('medium', 600, 300, true);


	// Detectar navegadores
	function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = ‘lynx’;
	elseif($is_gecko) $classes[] = ‘gecko’;
	elseif($is_opera) $classes[] = ‘opera’;
	elseif($is_NS4) $classes[] = ‘ns4’;
	elseif($is_safari) $classes[] = ‘safari’;
	elseif($is_chrome) $classes[] = ‘chrome’;
	elseif($is_IE) $classes[] = ‘ie’;
	else $classes[] = ‘unknown’;

	if($is_iphone) $classes[] = ‘iphone’;
	return $classes;
	}
	add_filter(‘body_class’,’browser_body_class’);

	// Cambiar nombres de los roles
	function wps_change_role_name() {
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
	    $wp_roles->roles[$rol]['name'] = '$nombreRol';
	    $wp_roles->role_names[$rol] = '$nombreRol';
	}
	add_action('init', 'wps_change_role_name');

	// Redireccionar directo al post si es el único en una categoría o tag
	function redirect_to_post(){
	    global $wp_query;
	    if( is_archive() && $wp_query->post_count == 1 ){
	        the_post();
	        $post_url = get_permalink();
	        wp_redirect( $post_url );
	    }

	} add_action('template_redirect', 'redirect_to_post');

	// Agregar search a un menú
	add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
	function add_search_form($items, $args) {
	if( $args->theme_location == 'MENU-NAME' )
	        $items .= '<li class="search"><form role="search" method="get" id="searchform" action="'.home_url( '/' ).'"><input type="text" value="search" name="s" id="s" /><input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" /></form></li>';
	        return $items;
	}
	*/

?>