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
define('DB_NAME', 'cmsdev_db');

/** MySQL database username */
define('DB_USER', 'cmsdev-user');

/** MySQL database password */
define('DB_PASSWORD', 'cmsdev-pass');

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
define('AUTH_KEY',         '=#yA*X%&ruyO.YD5<!J{!+1)]0[z*QhWlkRIix%X}!Yi;F`TL)p_T;QOFNrn]v(+');
define('SECURE_AUTH_KEY',  'Q~f|i0WCIN(2Dn@o;#m0WP{ft-85*|`L9L^|!Ep&7 NPLfrmh{e.v4V =j+1EGLT');
define('LOGGED_IN_KEY',    'm#Q!3m1w:AHFT ,(~EU-;W^QyFYqLPF6!;Mb?^q1T>~7<Pm>2-R$$X:)Y_w$jf9l');
define('NONCE_KEY',        'h~l]6Q*NRh%[%{iq+kF(){6qLP$wOr68#YI;@V(@qKH1Hs.vrNX+5b&}nWq9@J.9');
define('AUTH_SALT',        '37V[Zbv++qGK4ABH3j%K?sfSg:6KeCB:9IiXD*d]7ap)=+pAhI0%T_5NIWfm>;<h');
define('SECURE_AUTH_SALT', 'Nq&/QhqjrnA<?EE}rCzoU2It&*~EKEhU>jQolqrv6e}[YvVEvWVii^>badBs0:2|');
define('LOGGED_IN_SALT',   '<WTNwDShJHo6Q`Ry)RQ&d S ]dA;h(c <8GNatJ8:DahS)bh|FYgc 5q#.I-_{g,');
define('NONCE_SALT',       'Q42rb@]]3QwUYv~p/b!ZRKtw=Cvy+;ydfi>)KrT8OD68|LScNAu}KR.L}6sB:1Rr');

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
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
