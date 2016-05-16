<?php
/**
 * Load the hooks index
 */

define( 'THEME_DIRECTORY',     get_template_directory() );
define( 'THEME_DIRECTORY_URI', get_template_directory_uri() );
define( 'SPRITE_URI',          get_template_directory_uri() . '/assets/images/sprite.svg' );

require_once 'hooks/theme/index.php';
require_once 'hooks/posttypes/index.php';
require_once 'hooks/metaboxes/index.php';
require_once 'hooks/options/index.php';
require_once 'hooks/widgets/index.php';
