<?php

add_action( 'after_setup_theme', 'charbon_setup' );

if ( ! function_exists( 'charbon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0
 */
function charbon_setup() {
  global $content_width;

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /**
   * Register our primary menu
   */
  register_nav_menu( 'primary', __( 'Primary Menu', 'charbon' ) );

  /**
   * Register sidebar widget area
   */
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'charbon' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'charbon' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );

  /**
   * Register however many footer widgets our options say to
   */
  register_sidebar( array(
    'name'          => __( 'Footer', 'charbon' ),
    'id'            => 'footer',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'charbon' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget__title">',
    'after_title'   => '</h2>',
  ) );

  /**
   * Add the editor stylesheet
   */
  add_editor_style( 'assets/styles/editor.css' );


  /**
   * Set the content width to our options content width
   */
  if ( ! isset( $content_width ) ) {
    $site_width = 0 < absint( charbon_get_option( 'width' ) ) ? absint( charbon_get_option( 'width' ) ) : 960;
    $content_width = absint( charbon_get_option( 'width' ) / 1.62 );
  }

  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 600, 300, true );


  /**
   * Clean up! (thx to http://cubiq.org/clean-up-and-optimize-wordpress-for-your-next-theme)
   *
   * 1. Removes the “generator” meta tag from the document header (we definitely don’t need to let the world know that we are using WordPress and actually we are rather ashamed about it).
   * 2. Removes the “wlwmanifest” link. wlwmanifest.xml is the resource file needed to enable support for Windows Live Writer. Nobody on Earth needs that. Note that this command simply removes the link, if you want to completely disable the functionality you need to deny access to the file /wp-includes/wlwmanifest.xml probably from your .htaccess (but that’s not strictly needed).
   * 3. The RSD is an API to edit your blog from external services and clients. If you edit your blog exclusively from the WP admin console, you don’t need this.
   * 4. "wp_shortlink_wp_head" adds a "shortlink" into your document head that will look like http://example.com/?p=ID. No need, thanks.
   * 5. Removes a link to the next and previous post from the document header. This could be theoretically beneficial, but to my experience it introduces more problems than it solves. Please note that this has nothing to deal with the “next/previous” post that you may want to add at the end of each post.
   * 6. Removes the generator name from the RSS feeds.
   * 7. Removes the administrator’s bar and also the associated CSS styles. Especially during the development phase I find it very annoying.
   * 8. Removes WP 4.2 emoji styles and JS. Nasty stuff.
   */
    remove_action('wp_head', 'wp_generator');                         // #1
    remove_action('wp_head', 'wlwmanifest_link');                     // #2
    remove_action('wp_head', 'rsd_link');                             // #3
    remove_action('wp_head', 'wp_shortlink_wp_head');                 // #4
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);  // #5
    add_filter('the_generator', '__return_false');                    // #6
    // add_filter('show_admin_bar','__return_false');                    // #7
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );    // #8
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    // remove_action( 'wp_head', 'feed_links_extra', 3);
}
endif;




