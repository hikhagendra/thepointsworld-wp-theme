<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thepointsworld_db' );

/** Database username */
define( 'DB_USER', 'thepointsworld_admin' );

/** Database password */
define( 'DB_PASSWORD', 'thepointsworld_admin' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'nkzg-S@jQrl7&]-4ib%7mg3!m_u@:RNy#>HdHQd_17?`;NDrQ/wh-l%77$7g81(y' );
define( 'SECURE_AUTH_KEY',  'KpFJ]73Bx`E%1`Po2hRuvTsTQC/9+_?:aa{$Qz_MFK3CD?Nr{d5dX5d1hsKjxt{w' );
define( 'LOGGED_IN_KEY',    'GOPnLw&}cAmYW88#*U|~WtWcE/,zCP@n2+~k1drS;W*b|St4fEj):58K5td06N5F' );
define( 'NONCE_KEY',        '=V.:Z>9KQ82evI8?4vbonG<<]Wkw[F|J,UkxG?$CC#17aga~z,Wwp/?SlD:G2Z6q' );
define( 'AUTH_SALT',        'b&RE-k6;2>cLp>iIM5|<598+I~4Q(3B)QuRC[^z%5#6=8Rriwr([_:es4k^ds+1Q' );
define( 'SECURE_AUTH_SALT', 'FQgN>qH<Vy@JK>u5ex2SZwoO>35f1oxRc`p:Wtn]~b0u(]8[` DX,69&/hH0Yl&6' );
define( 'LOGGED_IN_SALT',   ',do{l&8awgEioh/r2$^C4XE?1XP8[ex`&XM%wj^$8aD^F_v_vDg84GaOkclH$$gt' );
define( 'NONCE_SALT',       'jz&YhURU`&k-spkmk6[ouq7@X/W_r{`qE0di$SUu@=RSbfRocWF4Cj5t_()769Ba' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
