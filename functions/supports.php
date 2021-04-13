<?php
  /** ==================== 
	 * ==THEME SUPPORTS ====
	 * ===================*/

	 // WP Menus Support
	add_theme_support('menus');
	// Post Thumbnail support
	add_theme_support('post-thumbnails');
  // POST FORMATS
	add_theme_support( 'post-formats', array( 'chat', 'audio', 'video', 'status', 'quote', 'link', 'gallery', 'aside' ) );
  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Add HTML5 markup for captions
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Add editor styles
  add_theme_support('editor-styles');

?>