<?php

add_action( 'init', 'block_post_type');

function block_post_type() {
  register_post_type( 'block',
    array('labels'          => array(
        'name'                => __('Blocks', 'charbon'), /* This is the Title of the Group */
        'singular_name'       => __('Block item', 'charbon'), /* This is the individual type */
        'all_items'           => __('All Blocks', 'charbon'), /* the all items menu item */
        'add_new'             => __('Add New', 'charbon'), /* The add new menu item */
        'add_new_item'        => __('Add New Block item', 'charbon'), /* Add New Display Title */
        'edit'                => __( 'Edit', 'charbon' ), /* Edit Dialog */
        'edit_item'           => __('Edit Block item', 'charbon'), /* Edit Display Title */
        'new_item'            => __('New Block item', 'charbon'), /* New Display Title */
        'view_item'           => __('View Block item', 'charbon'), /* View Display Title */
        'search_items'        => __('Search Block item', 'charbon'), /* Search Custom Type Title */ 
        'not_found'           =>  __('Nothing found in the Database.', 'charbon'), /* This displays if there are no entries yet */ 
        'not_found_in_trash'  => __('Nothing found in Trash', 'charbon'), /* This displays if there is nothing in the trash */
        'parent_item_colon'   => ''
      ), /* end of arrays */
      'description'           => __( 'This is the example block', 'charbon' ), /* Custom Type Description */
      'public'              => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'show_ui'             => true,
      'query_var'           => true,
      'menu_position'       => 7, /* this is what order you want it to appear in on the left hand side menu */ 
      /*'menu_icon' => get_stylesheet_directory_uri() . '/library/custom-fields/images/icon_slide_16.png',*/ /* the icon for the custom post type menu */
      'rewrite'             => array( 'slug' => 'block', 'with_front' => false ), /* you can specify its url slug */
      'has_archive'         => false, /* you can rename the slug here */
      'capability_type'     => 'page',
      'hierarchical'        => false,
      'can_export'          => true,
      'taxonomies'          => array(),
      /* the next one is important, it tells what's enabled in the post editor */
      'supports'            => array( 'title', 'editor', 'thumbnail' )
    )
  );
}