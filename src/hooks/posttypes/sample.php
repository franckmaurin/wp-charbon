<?php

add_action( 'init', 'portfolio_post_type');

function portfolio_post_type() {
  register_post_type( 'portfolio',
    array('labels'          => array(
        'name'                => __('Portfolio', 'charbon'), /* This is the Title of the Group */
        'singular_name'       => __('Portfolio item', 'charbon'), /* This is the individual type */
        'all_items'           => __('All Portfolio', 'charbon'), /* the all items menu item */
        'add_new'             => __('Add New', 'charbon'), /* The add new menu item */
        'add_new_item'        => __('Add New Portfolio item', 'charbon'), /* Add New Display Title */
        'edit'                => __( 'Edit', 'charbon' ), /* Edit Dialog */
        'edit_item'           => __('Edit Portfolio item', 'charbon'), /* Edit Display Title */
        'new_item'            => __('New Portfolio item', 'charbon'), /* New Display Title */
        'view_item'           => __('View Portfolio item', 'charbon'), /* View Display Title */
        'search_items'        => __('Search Portfolio item', 'charbon'), /* Search Custom Type Title */ 
        'not_found'           =>  __('Nothing found in the Database.', 'charbon'), /* This displays if there are no entries yet */ 
        'not_found_in_trash'  => __('Nothing found in Trash', 'charbon'), /* This displays if there is nothing in the trash */
        'parent_item_colon'   => ''
      ), /* end of arrays */
      'description'           => __( 'This is the example portfolio', 'charbon' ), /* Custom Type Description */
      'public'              => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'show_ui'             => true,
      'query_var'           => true,
      'menu_position'       => 7, /* this is what order you want it to appear in on the left hand side menu */ 
      /*'menu_icon' => get_stylesheet_directory_uri() . '/library/custom-fields/images/icon_slide_16.png',*/ /* the icon for the custom post type menu */
      'rewrite'             => array( 'slug' => 'portfolio', 'with_front' => false ), /* you can specify its url slug */
      'has_archive'         => false, /* you can rename the slug here */
      'capability_type'     => 'page',
      'hierarchical'        => false,
      'can_export'          => true,
      'taxonomies'          => array('post_tag', 'media'),
      /* the next one is important, it tells what's enabled in the post editor */
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' )
    )
  );

  register_taxonomy( 'media',
    array('portfolio'),
    array(
      'hierarchical'          => false,
      'labels'                => array(
        'name'                       => _x( 'Media', 'taxonomy general name' ),
        'singular_name'              => _x( 'Media', 'taxonomy singular name' ),
        'search_items'               => __( 'Search Media', 'charbon' ),
        'popular_items'              => __( 'Popular Media', 'charbon' ),
        'all_items'                  => __( 'All Media', 'charbon' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Media', 'charbon' ),
        'update_item'                => __( 'Update Media', 'charbon' ),
        'add_new_item'               => __( 'Add New Media', 'charbon' ),
        'new_item_name'              => __( 'New Media Name', 'charbon' ),
        'separate_items_with_commas' => __( 'Separate writers with commas', 'charbon' ),
        'add_or_remove_items'        => __( 'Add or remove writers', 'charbon' ),
        'choose_from_most_used'      => __( 'Choose from the most used writers', 'charbon' ),
        'not_found'                  => __( 'No writers found.', 'charbon' ),
        'menu_name'                  => __( 'Media', 'charbon' )
      ),
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'media' ),
    )
  );
}