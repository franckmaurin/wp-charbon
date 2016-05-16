<?php

/**
 * Template
 */
add_filter('body_class', function($classes) {
  $block = apply_filters('bem_body_block', 'template');
  $classes = array_map(function($class) use($block) {
    if('page-template' == $class) {
      return false;
    }
    if('page-id-' == substr($class, 0, 8)) {
      $class = 'postid-'.substr($class, 8);
    }
    if('single-format-' == substr($class, 0, 14)) {
      $class = substr($class, 7);
    }
    if('page-template-default' == $class) {
      $class = 'default';
    }
    if('page-template-template-' == substr($class, 0, 23)) {
      $class = 'custom-'.substr($class, 23, 4);
    }

    return $block.'--'.$class;
  }, $classes);
  array_unshift($classes, $block);
  return $classes;
}, apply_filters('bem_body_class_priority', 30), 1);


/**
 * Navigation
 */
add_filter('nav_menu_css_class', function($classes, $item, $args) {
  $block   = $args->menu_class;
  $element = $block."__item";
  $classes = array();
  $classes[] = $element;
  $classes[] = $element.'--'.$item->ID;
  $classes[] = $element.'--'.$item->object;
  if($item->current) {
    $classes[] = $element.'--current';
  }
  if($item->current_item_ancestor) {
    $classes[] = $element.'--ancestor';
  }
  if($item->current_item_parent) {
    $classes[] = $element.'--parent';
  }
  if(in_array('menu-item-has-children', $item->classes)) {
    $classes[] = $element.'--has-children';
  }
  if(in_array('menu-item-home', $item->classes)) {
    $classes[] = $element.'--home';
  }
  return $classes;
}, apply_filters('bem_nav_menu_priority', 30), 3);


/**
 * Page
 */
add_filter('page_css_class', function($class, $page, $depth, $args, $current_page) {
  $block   = $args['menu_class'];
  $element = $block."__item";
  $classes = array();
  $classes[] = $element;
  $classes[] = $element.'--'.$page->ID;
  $classes[] = $element.'--depth-'.$depth;
  if($current_page == $page->ID) {
    $classes[] = $element.'--current';
  }
  if(in_array('page_item_has_children', $class)) {
    $classes[] = $element.'--has-children';
  }
  return $classes;
}, apply_filters('bem_page_menu_priority', 30), 5);


/**
 * Post
 */
add_filter('post_class', function($classes) {
  $block = 'post';
  $classes = array_map(function($class) use($block) {
    if('post' == $class || 'page' == $class) {
      return $block;
    }
    if('post-' == substr($class, 0, 5)) {
      $class = substr($class, 5);
    }
    return $block.'--'.$class;
  }, $classes);
  return $classes;
}, apply_filters('bem_post_class_priority', 30), 1);