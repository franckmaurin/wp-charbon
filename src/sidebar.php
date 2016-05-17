<?php
/**
 * The sidebar containing the main widget area
 */
?>

<div class="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>
</div><!-- .sidebar -->
