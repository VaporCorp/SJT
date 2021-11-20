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
define( 'DB_NAME', 'InitWP' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'DoNQ3BLGeULNenqDPelKKuzDiaHIN6eAOGm0l460duF6kfrHFNNk4oL3eqldyVOU' );
define( 'SECURE_AUTH_KEY',  '0qUedt0IDqUFOUxs9PIPxhaiFb6DAMHdu8cYWn4pEnkDGRENGiWWxcXoqwninaPu' );
define( 'LOGGED_IN_KEY',    'wijfo8kHME5xwktabnk4AHPFdxzD8rPd893dy1545tpkWEth2xPbrdHZnsjpKNTV' );
define( 'NONCE_KEY',        'eit4YSL1v8yYIaZJcp2lfJYsAnE2Clibgu80wXc3vvciMQW6F9RDnc3t405eGmdh' );
define( 'AUTH_SALT',        'SDWIKlwS8ffdny23jCBTC2VxCXafePqIBSM3G3WLXPX8MwEFr2B0vtYfdZAsevMm' );
define( 'SECURE_AUTH_SALT', 'UVwdiAohngFBgASQPIPTKNWSEa4qgLzWT6T8BoZXqqXNNmSFs88my6bhl1xb3jXZ' );
define( 'LOGGED_IN_SALT',   'OsEH2VSA9F6FJJg9YdyeY2scmcNN1mptKSIFB4swX3yttCD3JZNS0RGek8P24mYd' );
define( 'NONCE_SALT',       'aSZYXh3iZTOB6aFNrMRiIpXXfVgl3wTGzq4qRJE3szir5Tvm5prjett00TBro8pL' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
