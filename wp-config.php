<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */


/** Mooving /wp-content/ to the root for easy WP update. */
define('WP_CONTENT_DIR', dirname(__FILE__) . '/wp-content');
define('WP_CONTENT_URL', '{{url}}/wp-content');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '{{db_name}}');

/** MySQL database username */
define('DB_USER', '{{db_user}}');

/** MySQL database password */
define('DB_PASSWORD', '{{db_pass}}');

/** MySQL hostname */
define('DB_HOST', '{{db_host}}');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Po;hFJUj84&~>$[+IqP%+GeRz9>k!(X`X;Y;ZlkFt0/p-AYV4|>|p3f%G: +761A');
define('SECURE_AUTH_KEY',  '4D[[d}sUM(2W&+3eYslQ}}n655;S|?Vz fsvY)9kROGse97y cxJQ`[J{5|Sl|r|');
define('LOGGED_IN_KEY',    '-rM?U4^1(SI.*05SJ~h:]sA{LjQpYMpXoAG[cT(:<S[Vg|n6 ~$K$Po-L4-H,_,[');
define('NONCE_KEY',        'lB#_G0pd9qXa~}7m$ aP&rA.Z-nSi1V5qlo:R0WCI?J+Y|oDA$dW>!R6( O,Y^[~');
define('AUTH_SALT',        '_8&VBL3,4!%O8$6P#f9A?#Z9K&V5Hy06Hi;-b_}|>~?J&GF*eEMf`.mT.52Hv5c+');
define('SECURE_AUTH_SALT', 'XVn{roy(1kP3$h_(C[dmNFb|!>AK#Hj+++e$^s~:FWvKH65kL&8{u ~*1b@:b2vF');
define('LOGGED_IN_SALT',   '/nFyw*3-Ns8y>|MGS}]MO.PqJQnWYaoQOidATJxmfy&Y$K&?kBC^U7|@$M >O;LI');
define('NONCE_SALT',       '>~WG8*~[zK%(0!lk-27@c+jaPE30qDD^Ps|J,qzI}PYHNtw6%>1o(v6B7uI*e0H1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
