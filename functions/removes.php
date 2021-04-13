<?php
  /*
  * Removing WP Cruft for security and aesthetics
  */

  add_action( 'wp_head', 'monk_remove_actions', 1);

  add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
  function wps_deregister_styles() {
      wp_dequeue_style( 'wp-block-library' );
  }


  function monk_remove_actions(){
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'print_emoji_styles');

      remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
      remove_action( 'admin_print_styles', 'print_emoji_styles' );

      remove_action( 'wp_head', 'rsd_link'); // Weblog Client
      remove_action( 'wp_head', 'wlwmanifest_link'); // Windows Livewriter
      remove_action( 'wp_head', 'wp_shortlink_wp_head'); // Auto shortlink
      remove_action( 'wp_head', 'wp_generator'); // WordPress Meta Generator
      remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); // REST url
      remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 ); // Oembed URLs

      remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
      remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
      remove_action( 'wp_head', 'index_rel_link' ); // index link
      remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
      remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
      remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
  }

  // Remove Admin Menus
  function monk_remove_menus(){
    remove_menu_page( 'edit-comments.php' );          //Comments
  }
  add_action( 'admin_menu', 'monk_remove_menus' );

  // Remove <link rel='dns-prefetch' href='//s.w.org' />
  add_filter( 'emoji_svg_url', '__return_false' );


  // Hide WordPress Version Info
  function monk_hide_wordpress_version() {
      return '';
  }
  add_filter('the_generator', 'monk_hide_wordpress_version');
  // Remove WordPress Version Number In URL Parameters From JS/CSS
  function monk_hide_wordpress_version_in_script($src, $handle) {
      $src = remove_query_arg('ver', $src);
      return $src;
  }
  add_filter( 'style_loader_src', 'monk_hide_wordpress_version_in_script', 10, 2 );
  add_filter( 'script_loader_src', 'monk_hide_wordpress_version_in_script', 10, 2 );

  // Remove Recent Comments style
  add_action( 'widgets_init', 'monk_remove_recent_comments_style' );
  function monk_remove_recent_comments_style() {
      global $wp_widget_factory;
      remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
  }

?>