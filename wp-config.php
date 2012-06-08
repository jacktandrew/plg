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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'w#hr KRINUpg66E!76~w{}b`j;7(y.5/biba_nVZYve]LxV)C0BOev0=UqHrA#{w');
define('SECURE_AUTH_KEY',  'f:@zYzF38`Qa0YE986}WY5`M`wf]}=/#Wc-i0zeaSw29XM(x HbBcXT3OKHM1sQ<');
define('LOGGED_IN_KEY',    '<XBQ=KJ3[hjzXoNzC4x(*=TloF]USgis}:^5ec!t15udCK IjYh:?)J@~!VW|l/m');
define('NONCE_KEY',        'o|8<o>_Jc]3]6lj2*=WZK6wpvuqU.{wXbKQEKrh>SMY{Sf)]V8aa AE{Gm|UA<i$');
define('AUTH_SALT',        'G182V$DE^F^Vnf&8q3hh{uymdOY)6LntQ9~!1Z1A(YNMEZVsIM#/!@FOZSry8}7g');
define('SECURE_AUTH_SALT', 'Xt4ovY~%q?&k|N]&$h,P&:e|][dy8j.y:F.K==;3^/M<i/6/=aCPuU^rTo76U#<g');
define('LOGGED_IN_SALT',   '?coGM4!AXI#EM@j2UMz[`Mo`(E~SrhpkS@%K[YwZx~F_skCo&m4(RM,kE(wWV5)|');
define('NONCE_SALT',       '$aU?f-c~$UP@_HoxE8[K=S)8b:L-t`pPA68?[S0wFeaF5P<ZPqx*<X^VXoR D4D5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sd_plg_';

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
