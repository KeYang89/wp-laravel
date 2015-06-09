<?php
//config file
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_matchdayhero_ke89');

/** MySQL database username */
define('DB_USER', 'devuser');

/** MySQL database password */
define('DB_PASSWORD', 'Rhoot3qU');

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
define('AUTH_KEY',         'j&GP_@#fXkD$QJy@b3yOd36?E"@TLCXW5|gMZR;k&Xi2EQRUxl@LSx`aa3BcdjuV');
define('SECURE_AUTH_KEY',  'eBwXmbTGV%tYXi3M8P&21;?73ANR0$$$2xlsvX%JsG^JMS?@zXo??~qwvdqOaD;:');
define('LOGGED_IN_KEY',    'V!G|to5+)UbFVUZS%ge:9tL"KwV9GwO0iRf_bYAS)oVth5@7~;0d0q!*vdmSL8)L');
define('NONCE_KEY',        ')R`Qc_&c/U5S4S;K!CGtM)QI0|"3xT5EaoXLSt@!"vTMPNnWM(~n!mR!z!4_G6nC');
define('AUTH_SALT',        'y1TEp~jxbS$"PBFq"~~_TDLyFZgswu`ohDm`$)P^SPB"xt+Tl(z4Tl*6VGpLw^IF');
define('SECURE_AUTH_SALT', '4&Q(?wKW*AavD3doKbm9&BK"$sKmNs&ujJ$`eLGT*Fc#%_zfcPM99sxi?"@L|)d7');
define('LOGGED_IN_SALT',   'v?;^3|po6^qLXN4X#X2CcgL?(WFNrBUPWLtiX%9jsyCPh~e`d@(8iKd;P*wWT/WR');
define('NONCE_SALT',       'H_|(Pg5`yrTt!vWhJMNb1|8~F3#Z6Y5Py?vj3brgC(_"y9Y"K"j:j%xIkbeupgy:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_hnzihx_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

