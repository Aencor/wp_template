<?php
  // Script & Style loading
  add_action( 'wp_enqueue_scripts', 'theme_scripts' );
  function theme_scripts() {

		/* =====================
		======= JS PLUGINS =====
		====================== */

		//Prefixfree 
		wp_enqueue_script( 'prefixfree', get_template_directory_uri() . '/assets/js/prefixfree.min.js', array(), '1.0', true );
		// Bootstrap
		wp_enqueue_script( "popper", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.14.7', true );
		wp_enqueue_script( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js", array(), '4.3.1', true );
		//GSAP TweenMax
		wp_enqueue_script( "gsap-tm-cdn", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . ":////cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js", array(), '3.3.4', true );
		//Theme Custom Script
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );

		/* =====================
		======= CSS PLUGINS =====
		====================== */

		//Bootstrap
		wp_enqueue_style( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css", true );
		//Animate
		wp_enqueue_style( 'animate', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css", true );
		//Font Awesome
		wp_enqueue_style( "font-awesome", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css", true );
		wp_enqueue_style( "font-awesome-all", "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css", true );
	}


	// Login CSS
	function my_login_stylesheet() {
		wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/style-login.css' );
	}
	add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

	// * ==== Editor Styles ===== *//

	// Add Styles to editor
	function husl_add_editor_styles() {
		add_theme_support( 'editor-styles' );

		add_editor_style( [
				'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css',
				'style.css',
				'/assets/css/editor.css'
		] );
	}
	add_action( 'after_setup_theme', 'husl_add_editor_styles' );

?>