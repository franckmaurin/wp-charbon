<?php

add_action( 'cmb2_init', 'add_options_page_metabox' );

function add_options_page_metabox() {
  $cmb = new_cmb2_box( array(
    'id'         => 'charbon_option_metabox',
    'hookup'     => false,
    'cmb_styles' => false,
    'show_on'    => array(
      // These are important, don't remove
      'key'   => 'options-page',
      'value' => 'charbon_option'
    ),
  ) );
  // Set our CMB2 fields
  $cmb->add_field( array(
      'name'    => __( 'Logo', 'charbon' ),
      'desc' => __( 'field description (optional)', 'charbon' ),
      'id'      => 'logo',
      'type'    => 'file'
  ) );

  $cmb->add_field( array(
      'name'    => __( 'Site Width', 'charbon' ),
      'desc'    => __( 'field description (optional)', 'charbon' ),
      'id'      => 'width',
      'type'    => 'text_small',
      'default' => '960'
  ) );
  $cmb->add_field( array(
      'name'    => __( 'Background Color', 'charbon' ),
      'desc'    => __( 'field description (optional)', 'charbon' ),
      'id'      => 'bg_color',
      'type'    => 'colorpicker',
      'default' => '#404040'
  ) );
  $cmb->add_field( array(
      'name'    => __( 'Content Background Color', 'charbon' ),
      'desc'    => __( 'field description (optional)', 'charbon' ),
      'id'      => 'content_bg_color',
      'type'    => 'colorpicker',
      'default' => '#ffffff'
  ) );
  $cmb->add_field( array(
      'name'    => __( 'Sidebar Position', 'charbon' ),
      'desc'    => __( 'field description (optional)', 'charbon' ),
      'id'      => 'sidebar_position',
      'type'    => 'radio',
      'default' => 'right',
      'options' => array(
        'left'  => __( 'Left', 'charbon' ),
        'right' => __( 'Right', 'charbon' ),
      )
  ) );
  $cmb->add_field( array(
      'name'    => __( 'Footer Widget Areas', 'charbon' ),
      'desc'    => __( 'field description (optional)', 'charbon' ),
      'id'      => 'footer_widget_areas',
      'type'    => 'radio',
      'default' => 'two',
      'options' => array(
        0 => __( 'None', 'charbon' ),
        1 => __( 'One', 'charbon' ),
        2 => __( 'Two', 'charbon' ),
        3 => __( 'Three', 'charbon' ),
        4 => __( 'Four', 'charbon' ),
      )
  ) );
}

