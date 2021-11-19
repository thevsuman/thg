<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'sql6451968' );

/** MySQL database username */
define( 'DB_USER', 'sql6451968' );

/** MySQL database password */
define( 'DB_PASSWORD', 'h4H5QVlsQ5' );

/** MySQL hostname */
define( 'DB_HOST', 'sql6.freesqldatabase.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'cG#Ouq1hMvOBWT=7,g59[dRo|B+n5igXeNjsk7h^>{$d2h)rrBZfqcnG?GGL+R>~' );
define( 'SECURE_AUTH_KEY',  'r.{@{&Tlq%MM9MgG?HQ*HroN)`N<#g%urToxg4+CbkThv_u+?g.QWlbeU7#VNbT0' );
define( 'LOGGED_IN_KEY',    'LQNDZP8fM$R^B?Pn1HdnJI{/aK<q=R;{pgUha% `[:;]Aec:^(!WVS*ehG>,Ad*Y' );
define( 'NONCE_KEY',        'aAr{v|.,$|%@~wL6Eax;2#gtKuESBOUJ!vU_(<(mm{o*@~mX]xT^2FpZK*$d]D9?' );
define( 'AUTH_SALT',        'U&)}:2S;1Qw`Wp]TWMY= Dh~&UZ(&wA,j](j;cwN%|730G>t}pjgA:TZ?,`ZR))Y' );
define( 'SECURE_AUTH_SALT', 't>#Nv~kuh&%/ol6weZsH6:1,9Q[~y`K%c`v+>{CNk?](qEjMeEm)i1D2b6Bn:d[u' );
define( 'LOGGED_IN_SALT',   '@@x:GaeV<PR0-$^7Bwmw}5{:;./$P(4ut02GyxQW.]?mC24_3~$MiGsw5,8e+6]_' );
define( 'NONCE_SALT',       ')!66!l|UV7e[D iqtEF9PJV^aZG#U#aPWX(C?-M@q>Y$,:3ew/u=3):Lmz^FT3s`' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
