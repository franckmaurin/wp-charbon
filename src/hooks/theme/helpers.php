<?php
/**
 * Helpers
 */

function charbon_get_heading() {
  // Get the Title
  $before = false;
  $title = 'Archives';
  $after = false;
  $blog = 'Blog';
  if ( is_category() ) {
    $before = $blog;
    $title = single_cat_title( '', false );
  } elseif ( is_search() ) {
    $before = "Search";
    $title = get_search_query();
  } elseif ( is_tag() ) {
    $before = $blog;
    $title = single_tag_title( '', false );
  } elseif ( is_day() ) {
    $before = $blog;
    $title = get_the_date();
  } elseif ( is_month() ) {
    $before = $blog;
    $title = get_the_date( 'F Y' );
  } elseif ( is_year() ) {
    $before = $blog;
    $title = get_the_date( 'Y' );
  } elseif ( is_author() ) {
    $before = $blog;
    $author = (get_query_var('author_name'))
              ? get_userdatabylogin(get_query_var('author_name'))
              : get_userdata(get_query_var('author'));
    $title = $author->display_name;
  } elseif ( is_front_page() ) {
    $title = 'Blog';
  } elseif ( is_home() ) {
    $blog = get_post(get_option('page_for_posts'));
    $title = $blog->post_title;
  } elseif ( is_singular()) {
    if( get_post_type() === 'post') {
      $before = $blog;
    }
    $title = get_the_title();
  } elseif ( !have_posts() ) {
    $title = "404 error";
  }
  return array("title" => $title, "before" => $before, "after" => $after);
}

function charbon_get_cover($postId, $size='full') {
  if(!is_singular()) {
    return false;
  }
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postId), $size );
  if($thumb) {
    return $thumb['0'];
  } else {
    return false;
  }
}

function charbon_get_categories($postId, $seperator='', $withLink=false) {
  $categories = get_the_category($postId);
  $output = '';
  if($categories){
    foreach($categories as $category) {
      if($withLink):
        $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>'.$seperator;
      else:
        $output .= '<span>'.$category->name.'</span>'.$seperator;
      endif;
    }
    return trim($output, $seperator);
  }
}