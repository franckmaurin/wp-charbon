<?php
/**
 * Options
 */

require_once WP_PLUGIN_DIR . '/cmb2/init.php';
require_once 'sample.php';

add_action( 'admin_init', 'init' );

function init() {
  register_setting( 'charbon_options', 'charbon_options' );
}

add_action( 'admin_menu', 'add_options_pagette' );

function add_options_pagette() {
  // To create a nav at the root (at the bottom of Settings) use add_menu_page()
  $options_page = add_theme_page( __( 'Site Options', 'charbon' ), __( 'Site Options', 'charbon' ), 'manage_options', 'charbon_options', 'admin_page_display' );
  // Include CMB CSS in the head to avoid FOUT
  add_action( "admin_print_styles-{$options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
}

function admin_page_display() {
  ?>
  <div class="wrap cmb2-options-page <?php echo 'charbon_options'; ?>">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <?php cmb2_metabox_form( 'charbon_option_metabox', 'charbon_options' ); ?>
  </div>
  <?php
}


/**
 * Wrapper function around cmb2_get_option
 */
function charbon_get_option( $key = '' ) {
  if( function_exists( 'cmb2_get_option' ) ) {
    return cmb2_get_option( 'charbon_options', $key );
  } else {
    $options = get_option( 'charbon_options' );
    return isset( $options[ $key ] ) ? $options[ $key ] : false;
  }
}

