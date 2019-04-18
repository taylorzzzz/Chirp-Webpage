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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('WP_CACHE', false);
// define( 'WPCACHEHOME', '/home2/goboinfo/public_html/chirpforbirds/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'Chirp_Local');

/** MySQL database username */
define('DB_USER', 'wordpress_admin');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'ZG:22,aJiX.>MoBA9DP duQ#V=I-5am;{sL`(6eQucit&Ab_6$(b7RQQDa<2JH^r');
define('SECURE_AUTH_KEY',  'y0GV}-^dfK<m$DYQ3!~9e nF!V=<Q>.XN_(%7oj9B_l@g3cvnpCux3{ >t| nxe8');
define('LOGGED_IN_KEY',    'F-bP+^d,z:OW5M>#(8,e}qVUu57Fu4/R:5c+RmE y@*S3(z9LDpkeD#WM^zP}je`');
define('NONCE_KEY',        '|]QA2r=DjCbed}|Ixl+WwxF>rMMyxH:1[3D`f;?w}|4se`;wo_Vb]#&+ts9a?=z|');
define('AUTH_SALT',        '>;uo;6<8C@)QEX@UQupX>ODy|MdrHB30u5C[b+<^R{3-Vseq&< n=<boT]85?5UA');
define('SECURE_AUTH_SALT', 'dm|-plF|247=,67pK(7T8W5> 2|VtQEg%?(b%H9d/F1=Of7KgWTA},|>7w$yf+M]');
define('LOGGED_IN_SALT',   'QYb!*tS+5bjg;+~6GMg=2&wYoL?7-j9Z%ZbA+q|-DSE?5ge1LP{}XS:mjUDkbl1M');
define('NONCE_SALT',       '^Zw ny5N2 l7JUuOev|=^= q-9r`G2Yn H2phYHgmOQ;6c!gVs2i{3E-,au0o{1V');

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

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
