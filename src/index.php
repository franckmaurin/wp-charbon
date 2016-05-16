<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 */

get_header();
$heading = charbon_get_heading();
$cover = charbon_get_cover($post->ID, 'full'); ?>

    <header class="header" <?php if($cover): ?>style="background-image: url(<?php echo $cover; ?>);"<?php endif; ?>>
      <div class="container">
        <?php if($heading['before']): ?>
          <div class="header__before"><?php echo $heading['before']; ?></div>
        <?php endif; ?>
        <h1 class="header__title"><?php echo $heading['title']; ?></h1>
        <?php if( is_singular() && get_post_type() === 'post'): ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="header__after">
            By <?php echo get_the_author_link(); ?>
            <time><?php echo get_the_date(); ?></time>
            <?php charbon_share(); ?>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </header>


<?php if(have_posts()): ?>
  <?php if(is_singular()): ?>
    <?php while (have_posts()) : the_post(); ?>

    <article <?php post_class(); ?>>
      <section class="post__section">
        <figure id="attachment_73" class="thumbnail wp-caption alignnone">
          <img class="alignnone size-full wp-image-73" src="http://localhost/lab/hotsauce/wp-content/uploads/px-double.png" alt="" width="2" height="1" />
        </figure>
      </section>
      <section class="post__section">
        <div class="container">
          <?php the_content(); ?>
        </div>
      </section>
    </article>

    <?php endwhile; ?>
  <?php else: ?>

    <div class="container">
      <div class="feed">
        <ul class="feed__list">
    <?php while (have_posts()) : the_post(); ?>
          <li class="feed__item">
            <a href="<?php the_permalink(); ?>" <?php post_class(); ?> rel="bookmark">
              <div class="post__cover">
                <img src="http://localhost/lab/hotsauce/wp-content/uploads/px-double.png" alt="" width="2" height="1">
                <div class="post__category"><?php echo charbon_get_categories($post->ID, '', false); ?></div>
              </div>
              <div class="post__text">
                <h2 class="post__title"><?php the_title(); ?></h2>
                <div class="post__excerpt"><?php the_excerpt(); ?></div>
              </div>
            </a>
          </li>
    <?php endwhile; ?>
        </ul>
        <?php
          wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'charbon' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'charbon' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
          ) );
        ?>
      </div>
      <?php get_sidebar(); ?>
    </div>

  <?php endif; ?>
<?php else: ?>
  <?php /* 404 */ ?>
<?php endif; ?>

<?php get_footer(); ?>
