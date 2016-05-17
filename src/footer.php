<?php
/**
 * The template for displaying the footer
 */
?>

<?php
      // Get blocks
      if(is_singular()):
        $blocksId = get_post_meta($post->ID, '_charbon_blocks_blocks', true);
        if($blocksId != ''):
          $blocksArg = array(
            'post__in' => $blocksId,
            'orderby' => 'post__in',
            'post_type' => array('block'),
            'posts_per_page' => -1
          );
          $blocks = get_posts($blocksArg);

          foreach ($blocks as $post) : ?>
            <?php get_template_part('single-block', $post->post_name); ?>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>


      <footer class="footer">
        <?php if (is_active_sidebar('footer')):
                $the_widgets = wp_get_sidebars_widgets();
                $number      = count($the_widgets['footer']);
        ?>
        <section class="footer__sidebar footer__sidebar--<?php echo $number; ?>" role="complementary">
          <div class="container">
            <?php dynamic_sidebar('footer'); ?>
          </div>
        </section>
        <?php endif; ?>

        <section class="footer__bottom">
          <div class="container">
            <p class="footer__copy">&copy; <strong>WP Charbon</strong> 2016</p>

            <?php
              if(has_nav_menu('primary')):
                wp_nav_menu(array(
                  'container_class' => 'footer__navigation',
                  'theme_location' => 'primary',
                ));
              endif;
            ?>
          </div>
        </section>
      </footer><!-- .footer -->

    </main><!-- .template -->
  </div><!-- .content__item -->
</div><!-- .content -->

<?php wp_footer(); ?>
<script src="<?php echo get_bloginfo('template_directory') ?>/assets/scripts/build.js"></script>
</body>
</html>
