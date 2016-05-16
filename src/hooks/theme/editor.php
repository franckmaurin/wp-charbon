<?php
function html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt ) {
  //Always return an image with a <figure> tag, regardless of link or caption

  //Grab the image tag
  $image_tag = get_image_tag($id, '', $title, $align, $size);

  //Let's see if this contains a link
  $linkptrn = "/<a[^>]*>/";
  $found = preg_match($linkptrn, $html, $a_elem);

  // If no link, do nothing
  if($found > 0) {
    $a_elem = $a_elem[0];

    if(strstr($a_elem, "class=\"") !== false){ // If link already has class defined inject it to attribute
        $a_elem = str_replace("class=\"", "class=\"colorbox ", $a_elem);
    } else { // If no class defined, just add class attribute
        $a_elem = str_replace("<a ", "<a class=\"colorbox\" ", $a_elem);
    }
  } else {
    $a_elem = "";
  }
  // Set up the attributes for the caption <figure>
  $attributes  = (!empty($id) ? ' id="attachment_' . esc_attr($id) . '"' : '' );
  $attributes .= ' class="thumbnail wp-caption ' . 'align'.esc_attr($align) . '"';
  $output  = '<figure' . $attributes .'>';
  //add the image back in
  $output .= $a_elem;
  $output .= $image_tag;
  if($a_elem != "") {
    $output .= '</a>';
  }

  if ($caption) {
    $output .= '<figcaption class="caption wp-caption-text">'.$caption.'</figcaption>';
  }
  $output .= '</figure>';
  return $output;
}
add_filter('image_send_to_editor', 'html5_insert_image', 10, 9);
add_filter( 'disable_captions', create_function('$a', 'return true;') );