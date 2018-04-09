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
define('DB_NAME', 'aktproject_fulfill');

/** MySQL database username */
define('DB_USER', 'aktproject_fulfill');

/** MySQL database password */
define('DB_PASSWORD', 'Fulfill@2018');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'QS9FMIQ#(,&^g/c-;rBQY6XgO_;G+-(Q*&^}MRPAoI9( h@ko&&_1SK310E3cN<%');
define('SECURE_AUTH_KEY',  'k9(PsPbmbO_q}+UT%E?fMAtd6^|-t!#=A*4MUJ]d|Vy-VUUp0K}Yx=6NMLAQK&T$');
define('LOGGED_IN_KEY',    ' hN%n2XeN/eg/~<,e/?xMMyM>4VI]633a^^-cVY&c;|Ty|.D+Wa-Ywe0IR1:j-(m');
define('NONCE_KEY',        'aQKYh6{W(~&n?^uz101I7b>>pv8THZ|u2Y/zm @GMLy58 u}%-Rk$dAkDoB55,c0');
define('AUTH_SALT',        'FvoKUr8ph.[XKt>xeYT.8W%rde}} p7X^g4PBEtGboQL0d/TjK4h#7BC@2ya8ycl');
define('SECURE_AUTH_SALT', '&c?k,<akqAKH7 yI;A}NB9k/=NhF|d@Ji%YL9Yb(4H<mG+U*H*nRBuGff-={vH$L');
define('LOGGED_IN_SALT',   '>k8Xj049s`f5E)u<e{H?E8Y#mMv(uKrFVYj ?7oBB&Pi5OO?;h&0U5)M<w:M CE}');
define('NONCE_SALT',       'A3u~?@YKG:Q9.-t!{3N&YP^H(qy43{ZE[emFh$^tBSCEagOLi]AeH1LvhcSK>D<b');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
