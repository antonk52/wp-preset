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
define('DB_NAME', 'wp_update');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ',+Rs{_XKe7(@?!&EHzxi8+Qg?^4.Qq=/4E}$5A-+ekF+~2,/2zaB?srWS/HnPHoH');
define('SECURE_AUTH_KEY',  'BAc2J}-h67[Lutfz[Lgn>7-Y]+5|o$!38.%VKXthk{-s+nDk9}(:dQxI9n7TM38n');
define('LOGGED_IN_KEY',    '-$t^ky? 9Otz`D=lro7FsAO9++j`Hs^&Xp{lza+(JBR$D,.:]e-,fPKlP LNujzM');
define('NONCE_KEY',        'GY+PNmZ>G8p!U[0;s5[BpZB};-()Gl%#)18/C->&IQW(3l%TF5W=dX6lc=F&8k= ');
define('AUTH_SALT',        't/fQ58O]qibv+:?-2xrT_/V3n47oy8Ul8j>b:im<AW#gM]G$ogR@Y+;[-r|TC>9[');
define('SECURE_AUTH_SALT', '>Mmj<>)8qe?zEV9_S]-ErGC:iL[Ji:R}l8TPF=ll)(Ui;7;;Qb7^:[}=RzFox#Z:');
define('LOGGED_IN_SALT',   'Mz&h;UW39|jGkDAX]lHhwb78!,:oPw+D#YT#H(vV[T-w>TsZi<0r`XsB9.rbvrPK');
define('NONCE_SALT',       'dt1L~i7@cOI(e>7L&9%UnpMSMOwgB+B0,_Mu?&@$2M_eqJMwMTgRT;eBcrtheVaZ');

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
