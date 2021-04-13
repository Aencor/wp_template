<?php
/**
 * Add Menus
 */
function monk_nav_menus() {
    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', 'monk'),
        'mobile_navigation' => __('Mobile Navigation', 'monk'),
        'footer_navigation' => __('Footer Navigation', 'monk'),
    ));
}

add_action('after_setup_theme', 'monk_nav_menus');