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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'admin_admin_enchantedcabochons2' );

/** MySQL database username */
define( 'DB_USER', 'admin_root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'RootCanal' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ly+<||H@8m&R]S9%;~X8.%:ASu^{Jyp{!GvNX+g*xAYor%];2$c0o`-!2QRHd)Si' );
define( 'SECURE_AUTH_KEY',  'aQ.?E)Z*K(MdTxkp^UuZ}XOB0wT`S42yAK[g+?oK&:_Px*-G0FJ|YbV;j=2y,h&M' );
define( 'LOGGED_IN_KEY',    '.R,)]k(/uL0!>KLRP)p{Ju<,.Qr TO^Q)YViPvN=MDYOFbi`@l>n/|g6S:+FNlh/' );
define( 'NONCE_KEY',        'Wp2-c15w&;A=]3-E@3=do->W;+}s]C~#a>a6Re Y=3)-d#1Y|gkn.?vDV3L)NPYr' );
define( 'AUTH_SALT',        ' JAGF`B)-r2O]dL42fQ{,t]=}SeQJRYo%fVS}zFeQL]wb9z-M:HIkKEw<-kz*o&>' );
define( 'SECURE_AUTH_SALT', '}l*L&6G;bx~N|fI&zz[Mf;@-UyA/YnrnBLxyi.}8@Ms+Z&Ag&t+i4+=O[DuZ`i@W' );
define( 'LOGGED_IN_SALT',   'Q.YE{ce%>p]^7#%AU/517H)l/h~;<fNuE!f~TUs/TCK?}2Go-4S8Uo0LM7<gPia%' );
define( 'NONCE_SALT',       'Z!>d{VSEM67zG}Sl<=dbB`S=;`KM0fa|*%6TadnP|d._0;zSQsh]W]lu)(Y}kh[v' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', FALSE );
define( 'WP_MEMORY_LIMIT', '1024M' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
