<?php

add_action( 'cmb2_init', 'charbon_register_demo_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function charbon_register_demo_metabox() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_charbon_demo_';

  /**
   * Sample metabox to demonstrate each field type included
   */
  $cmb = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => __( 'Test Metabox', 'charbon' ),
    'object_types'  => array( 'page' ), // Post type
    // 'show_on_cb' => 'charbon_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $cmb->add_field( array(
    'name'       => __( 'Test Text', 'charbon' ),
    'desc'       => __( 'field description (optional)', 'charbon' ),
    'id'         => $prefix . 'text',
    'type'       => 'text',
    'show_on_cb' => 'charbon_hide_if_no_cats', // function should return a bool value
    // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
    // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
    // 'on_front'        => false, // Optionally designate a field to wp-admin only
    // 'repeatable'      => true,
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Small', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textsmall',
    'type' => 'text_small',
    // 'repeatable' => true,
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Medium', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textmedium',
    'type' => 'text_medium',
    // 'repeatable' => true,
  ) );

  $cmb->add_field( array(
    'name' => __( 'Website URL', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'url',
    'type' => 'text_url',
    // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
    // 'repeatable' => true,
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Email', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'email',
    'type' => 'text_email',
    // 'repeatable' => true,
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Time', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'time',
    'type' => 'text_time',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Time zone', 'charbon' ),
    'desc' => __( 'Time zone', 'charbon' ),
    'id'   => $prefix . 'timezone',
    'type' => 'select_timezone',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Date Picker', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textdate',
    'type' => 'text_date',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Date Picker (UNIX timestamp)', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textdate_timestamp',
    'type' => 'text_date_timestamp',
    // 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'datetime_timestamp',
    'type' => 'text_datetime_timestamp',
  ) );

  // This text_datetime_timestamp_timezone field type
  // is only compatible with PHP versions 5.3 or above.
  // Feel free to uncomment and use if your server meets the requirement
  // $cmb->add_field( array(
  //  'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'charbon' ),
  //  'desc' => __( 'field description (optional)', 'charbon' ),
  //  'id'   => $prefix . 'datetime_timestamp_timezone',
  //  'type' => 'text_datetime_timestamp_timezone',
  // ) );

  $cmb->add_field( array(
    'name' => __( 'Test Money', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textmoney',
    'type' => 'text_money',
    // 'before_field' => '£', // override '$' symbol if needed
    // 'repeatable' => true,
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Test Color Picker', 'charbon' ),
    'desc'    => __( 'field description (optional)', 'charbon' ),
    'id'      => $prefix . 'colorpicker',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Area', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textarea',
    'type' => 'textarea',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Area Small', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textareasmall',
    'type' => 'textarea_small',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Text Area for Code', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'textarea_code',
    'type' => 'textarea_code',
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Title Weeeee', 'charbon' ),
    'desc' => __( 'This is a title description', 'charbon' ),
    'id'   => $prefix . 'title',
    'type' => 'title',
  ) );

  $cmb->add_field( array(
    'name'             => __( 'Test Select', 'charbon' ),
    'desc'             => __( 'field description (optional)', 'charbon' ),
    'id'               => $prefix . 'select',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
      'standard' => __( 'Option One', 'charbon' ),
      'custom'   => __( 'Option Two', 'charbon' ),
      'none'     => __( 'Option Three', 'charbon' ),
    ),
  ) );

  $cmb->add_field( array(
    'name'             => __( 'Test Radio inline', 'charbon' ),
    'desc'             => __( 'field description (optional)', 'charbon' ),
    'id'               => $prefix . 'radio_inline',
    'type'             => 'radio_inline',
    'show_option_none' => 'No Selection',
    'options'          => array(
      'standard' => __( 'Option One', 'charbon' ),
      'custom'   => __( 'Option Two', 'charbon' ),
      'none'     => __( 'Option Three', 'charbon' ),
    ),
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Test Radio', 'charbon' ),
    'desc'    => __( 'field description (optional)', 'charbon' ),
    'id'      => $prefix . 'radio',
    'type'    => 'radio',
    'options' => array(
      'option1' => __( 'Option One', 'charbon' ),
      'option2' => __( 'Option Two', 'charbon' ),
      'option3' => __( 'Option Three', 'charbon' ),
    ),
  ) );

  $cmb->add_field( array(
    'name'     => __( 'Test Taxonomy Radio', 'charbon' ),
    'desc'     => __( 'field description (optional)', 'charbon' ),
    'id'       => $prefix . 'text_taxonomy_radio',
    'type'     => 'taxonomy_radio',
    'taxonomy' => 'category', // Taxonomy Slug
    // 'inline'  => true, // Toggles display to inline
  ) );

  $cmb->add_field( array(
    'name'     => __( 'Test Taxonomy Select', 'charbon' ),
    'desc'     => __( 'field description (optional)', 'charbon' ),
    'id'       => $prefix . 'taxonomy_select',
    'type'     => 'taxonomy_select',
    'taxonomy' => 'category', // Taxonomy Slug
  ) );

  $cmb->add_field( array(
    'name'     => __( 'Test Taxonomy Multi Checkbox', 'charbon' ),
    'desc'     => __( 'field description (optional)', 'charbon' ),
    'id'       => $prefix . 'multitaxonomy',
    'type'     => 'taxonomy_multicheck',
    'taxonomy' => 'post_tag', // Taxonomy Slug
    // 'inline'  => true, // Toggles display to inline
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Checkbox', 'charbon' ),
    'desc' => __( 'field description (optional)', 'charbon' ),
    'id'   => $prefix . 'checkbox',
    'type' => 'checkbox',
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Test Multi Checkbox', 'charbon' ),
    'desc'    => __( 'field description (optional)', 'charbon' ),
    'id'      => $prefix . 'multicheckbox',
    'type'    => 'multicheck',
    // 'multiple' => true, // Store values in individual rows
    'options' => array(
      'check1' => __( 'Check One', 'charbon' ),
      'check2' => __( 'Check Two', 'charbon' ),
      'check3' => __( 'Check Three', 'charbon' ),
    ),
    // 'inline'  => true, // Toggles display to inline
  ) );

  $cmb->add_field( array(
    'name'    => __( 'Test wysiwyg', 'charbon' ),
    'desc'    => __( 'field description (optional)', 'charbon' ),
    'id'      => $prefix . 'wysiwyg',
    'type'    => 'wysiwyg',
    'options' => array( 'textarea_rows' => 5, ),
  ) );

  $cmb->add_field( array(
    'name' => __( 'Test Image', 'charbon' ),
    'desc' => __( 'Upload an image or enter a URL.', 'charbon' ),
    'id'   => $prefix . 'image',
    'type' => 'file',
  ) );

  $cmb->add_field( array(
    'name'         => __( 'Multiple Files', 'charbon' ),
    'desc'         => __( 'Upload or add multiple images/attachments.', 'charbon' ),
    'id'           => $prefix . 'file_list',
    'type'         => 'file_list',
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  $cmb->add_field( array(
    'name' => __( 'oEmbed', 'charbon' ),
    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'charbon' ),
    'id'   => $prefix . 'embed',
    'type' => 'oembed',
  ) );

  $cmb->add_field( array(
    'name'         => 'Testing Field Parameters',
    'id'           => $prefix . 'parameters',
    'type'         => 'text',
    'before_row'   => 'charbon_before_row_if_2', // callback
    'before'       => '<p>Testing <b>"before"</b> parameter</p>',
    'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
    'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
    'after'        => '<p>Testing <b>"after"</b> parameter</p>',
    'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
  ) );

}