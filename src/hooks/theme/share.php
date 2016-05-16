<?php

function charbon_share() {
  // Get current page URL & title
  $url   = get_permalink();
  $title = str_replace( ' ', '%20', get_the_title());

  // Construct sharing URL without using any script
  $twitterURL  = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url;
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$url;

  // Output html
  ?>
  <div class="share">
    <ul class="share__list">
      <li class="share__item">
        <a class="share__link share__link--facebook" href="<?php echo $facebookURL; ?>" target="_blank">
          <span class="share__icon icon icon--white"><svg><use xlink:href="<?php echo SPRITE_URI; ?>#facebook"></use></svg></span>
        </a>
      </li>
      <li class="share__item">
        <a class="share__link share__link--twitter" href="<?php echo $twitterURL; ?>" target="_blank">
          <span class="share__icon icon icon--white"><svg><use xlink:href="<?php echo SPRITE_URI; ?>#twitter"></use></svg></span>
        </a>
      </li>
    </ul>
  </div>
  <?php
}

