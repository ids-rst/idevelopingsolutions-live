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
define( 'DB_NAME', 'increjtp_wp54' );

/** MySQL database username */
define( 'DB_USER', 'increjtp_wp54' );

/** MySQL database password */
define( 'DB_PASSWORD', '3pu(7X7[Sn' );

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
define( 'AUTH_KEY',         'whvlhiic7cfevdywsns0ssruwk9iwj9oyuuynmlpykpx588sljwcwyknwpkvbsx7' );
define( 'SECURE_AUTH_KEY',  'yzvcoorrix2eahf3f9p0a1q3phovagkbxno9nlvp8bnvcw3xey2b5jsd3zsw1spb' );
define( 'LOGGED_IN_KEY',    '8mhz3mejvmvm6ujgycejcor0cjnpppljosas5dqvlenmbfnnjdhefv7ci7tefmfj' );
define( 'NONCE_KEY',        'uikusue5kfr76dzy2gi3kcktbkslgilqbqkeh9ocldnzrs3ymaquww1rex09z5a7' );
define( 'AUTH_SALT',        'rq3uvfiav1j3kwttttaauhw9evgpmscwismocwhhakk3z6f2e4rsxhsyubmc3t4x' );
define( 'SECURE_AUTH_SALT', 'xup5wkzogpmuj9c8uoxk5fltwacz4yv5vwxgi5fhpijot0zggett6wzhpn4sxjcb' );
define( 'LOGGED_IN_SALT',   'l8gmej0wrxvbvwhvyn2e5acunzarcmippy0wpaja6alqqvqsfkkv9xivgjoohq8a' );
define( 'NONCE_SALT',       'kuozm6be2syjagekymd9s2sjezklhk5ugljyowjbocirlxkymrsbhuwe1yq5finy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp2g_';

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
define( 'WP_DEBUG', false );

define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_POST_REVISIONS', 5 );
define( 'EMPTY_TRASH_DAYS', 7 );
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
