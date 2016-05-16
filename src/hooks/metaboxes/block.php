<?php

add_action( 'cmb2_init', 'charbon_register_block_metabox' );

function charbon_register_block_metabox() {

  $prefix = '_charbon_block_';
  $cmb    = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Blocks', 'charbon' ),
    'object_types'  => array( 'page' ), // Post type
    // 'show_on_cb' => 'charbon_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $args = array(
    'posts_per_page'   => -1,
    'post_type'        => array('block'),
    'post_status'      => 'publish',
    'suppress_filters' => true
  );
  $blocks = get_posts($args);
  $blockList = array();
  foreach ($blocks as $block) {
      $blockList[$block->ID] = $block->post_title;
  }

  $cmb->add_field( array(
    'name'             => __( 'Select blocks', 'charbon' ),
    'desc'             => __( 'field description (optional)', 'charbon' ),
    'id'               => $prefix . 'blocks',
    'type'             => 'pw_multiselect',
    'show_option_none' => true,
    'options'          => $blockList
  ) );
}