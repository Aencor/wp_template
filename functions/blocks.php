<?php

function register_acf_block_types()
{
    // Normal Content
    $block_icon = 'admin-comments';

    acf_register_block_type(array(
        'name' => 'normal_content',
        'title' => __('Normal Content'),
        'description' => __(''),
        'render_template' => 'blocks/core/normal-content.php',
        'category' => 'formatting',
        'icon' => $block_icon,
        'keywords' => array('Content'),
        'show_in_rest' => true,
        'supports' => array('editor'),
    ));

}

//
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function monk_allowed_block_types($allowed_blocks)
{
    return array(
        'acf/mac',
        'acf/slider',
        'acf/normal_content',
        'core/block' //Needed for re-usable blocks
    );
}

// add_filter( 'allowed_block_types', 'monk_allowed_block_types' );

/*
  Disable Gutenberg per post type
*/
function monk_disable_gutenberg($current_status, $post_type)
{
    $disabled_post_types = array('post');
    if (in_array($post_type, $disabled_post_types, true)) {
        $current_status = false;
    }
    return $current_status;
}
//add_filter( 'use_block_editor_for_post_type', 'monk_disable_gutenberg', 10, 2 );