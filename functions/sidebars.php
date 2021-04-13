<?php
  if ( function_exists('register_sidebar') )
  $sidebar_name = 'Sidebar Main';
  register_sidebar(array(
    'name'=> $sidebar_name,
    'before_title' => '<div class="widget-title">',
    'after_title' => '</div>',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
  ));
?>