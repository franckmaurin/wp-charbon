<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') ?>/assets/styles/build.css" />
  <?php wp_head(); ?>
</head>

<body>
<nav class="navigation">
  <div class="container">
    <a class="navigation__title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
      WP Charbon <sub>1.0</sub>
    </a><!-- .navigation-title -->

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <?php
        // Primary navigation menu.
        wp_nav_menu( array(
          'container_class' => 'navigation__menu',
          'theme_location' => 'primary',
        ) );
      ?>
    <?php endif; ?>
  </div>
</nav><!-- .navigation -->

<div class="content">
  <div class="content__item">
    <main <?php body_class(); ?> role="main">