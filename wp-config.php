<?php
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
define('DB_NAME', 'freeads');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'lc4V-cyv>uOuYh>o*Q-h}m/gu9hf_0%L5avCt7:aLtmm.%B6Jpc/Q~.*[y:XcnzF');
define('SECURE_AUTH_KEY',  'h,~QP+X9h*Gw~KCuo-nn PT;(NUnH~|(S Cpsb&ipL8G<&S5M14y5t9+}(1ZCh-<');
define('LOGGED_IN_KEY',    'Po6-Z8y$c<FAc_m1E$aLKo]`[-J(S8b3mTKOJo,V9z_<)HyyHT@}{L#f0}E,T_TI');
define('NONCE_KEY',        '+i~B2X[#S4x %vN(^M84%D B$1&TN6(-;5HCF|C!+zO[_%e:fe+>4Va(4CK@~8Mb');
define('AUTH_SALT',        '4Vkb~x5Fo)Jr OmC)v)0CaL0$[o3-D};F/ae!@?18mqHsXImC!|./_`r5jIAiB%Q');
define('SECURE_AUTH_SALT', '~s-Hi(Ldc{)-Sz> Sv<)T5;{h:qxWlawQQ~wI||NSY9V#=}e,38~e,/~l[x+`]SS');
define('LOGGED_IN_SALT',   '=qF:A}d3>/+%:]Q~W9>w^TqQ{K^TX^IU%)I)doIYCmIkw0Vx:=Db-%zQT9*~w5|(');
define('NONCE_SALT',       't Qr`k]K)+-B[v>||c#mr|,t3^mcd-:Q-JmIe3oGir|E#r7u5Z6*jUnGpy!d Ai`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
