<?php
  
  //Inserción de jQuery
	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
	function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.3.1.min.js", '', '', false);
    wp_enqueue_script('jquery');
	}

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

	// ACF Json

	add_filter('acf/settings/save_json', 'monk_json_save');
 
	function monk_json_save( $path ) {
			
			// update path
			$path = get_stylesheet_directory() . '/acf-json';
			
			
			// return
			return $path;
			
	}

	add_filter('acf/settings/load_json', 'monk_json_load');

	function monk_json_load( $paths ) {
			
			// remove original path (optional)
			unset($paths[0]);
			
			
			// append path
			$paths[] = get_stylesheet_directory() . '/acf-json';
			
			
			// return
			return $paths;
			
	}

	// Redirect to post if is the only one on Category or tag
	function redirect_to_post(){
    global $wp_query;
    if( is_archive() && $wp_query->post_count == 1 ){
        the_post();
        $post_url = get_permalink();
        wp_redirect( $post_url );
    }
  } 
  add_action('template_redirect', 'redirect_to_post');


  // Add Support for SVGs
  function nylon_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'nylon_mime_types');
?>