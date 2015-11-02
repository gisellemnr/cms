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
define('DB_NAME', 'ressaude');

/** MySQL database username */
define('DB_USER', 'ressaude');

/** MySQL database password */
define('DB_PASSWORD', 'Ressaude123');

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
define('AUTH_KEY',         'h]N4jUpAtI:PNo8s}e*QK0KZjWYO4hvH_/E6Q^Yr|dLs(_:nT~ P)}MH]@P9qU2%');
define('SECURE_AUTH_KEY',  '|q;ba|f2`Sj{904<A:}|W&ed7_C+1>E6C1- ?nvGKQ.GlN|AXoUM+)kNT-9:90;s');
define('LOGGED_IN_KEY',    '8=kh7s-@=.(zjX]/!A.,|:a%u4I>l@*)|>dQbm22$k&7G^5Ot]O)x*::NM;z^R=J');
define('NONCE_KEY',        'XASi3/Tr(<*Qq9TG:mK<;`%(-*o6sp1rWxH&rE]8j_uwwmKc1l6s[W]5WF/&*JY/');
define('AUTH_SALT',        's.#2Bi}MZu~K)G{E::40`|q><|b/0O0Y`T{}c-+h@+oUjQ<-u|%g?.j5ZDg]Zqvv');
define('SECURE_AUTH_SALT', '_X:pI1NK+H]|[orVTumH@61gpCw;QS%H`{$[3![-WVI%}0GUJAZL{GKsI(8&$:se');
define('LOGGED_IN_SALT',   '4e-RY,A3nUo!P_=bRIb:|g9_Kg66|`RY]3+Yf8&2f>]|q-aH+Rb^mI|$-LFd+;68');
define('NONCE_SALT',       'Tp|sqlK|p`B6op=^jvC ;44V(|fS|tU<f?aKQm|Q5O(U&VMgH^nh+?1IV^?}UbXm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cms_';

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
