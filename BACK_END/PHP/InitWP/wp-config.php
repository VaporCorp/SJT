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
define( 'DB_NAME', 'Initwp' );

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
define( 'AUTH_KEY',         'me93Yb17FWpJYXSDx1uX0oeRqX6NKjIh5UgvdpvY5X72SX99eJV4LTIols55xaJT' );
define( 'SECURE_AUTH_KEY',  'kR2pJ8c6PE3Vkxfc0iBdYp6v8TpNTQw4x0YylTbUxQ5z4hCUo89k1NyIYCMcXw0g' );
define( 'LOGGED_IN_KEY',    '13P9TeNavr9LK0w9IVK9uzDrkBHBWxkjh2QXUU8LYvlXtIcA7Rwj2qbQoSVecn6Y' );
define( 'NONCE_KEY',        'Ow20FVL7nSNYfEJz6a7xBexNcR8JO3NsGPwr5GP7qCHEzciLy1vcHvAoMRxpc9zd' );
define( 'AUTH_SALT',        'GFTieVqsnBfoizpgleyGZDCRpo61BXB5UBCW1lUHTq7tue9aTQM2cjlEGJobykPH' );
define( 'SECURE_AUTH_SALT', 'sSEumGxUVn65GQR3G75yDnLKrSI5wKLH7tCppfBMpBCRvro4pjRD0D6bG8cRPtip' );
define( 'LOGGED_IN_SALT',   'JOXz76a1BDDeJCAQOrIvW9uXObQSbifJHymCu7dVU5N8QoD2WbyEv0O3LB7U75z5' );
define( 'NONCE_SALT',       'aTYZQJZ9ycamDusLbP9iYgaq2bRz9Q5nm68qyFMGpjzdgbfA0jv3puYG5e8TPhMR' );

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
