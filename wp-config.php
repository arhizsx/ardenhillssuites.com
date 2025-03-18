<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

define('FORCE_SSL_ADMIN', true);
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    $_SERVER['HTTPS']='on';
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define( 'DB_NAME', 'ardenhillssuites' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'YchangThird1!' );

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
define( 'AUTH_KEY',         'p}Fc#@lgUqTD_2FYi{2l?~6sLE#mS:^9lR~ynuK8$x0<!H}:yg;_;*0eh]^wY%M)' );
define( 'SECURE_AUTH_KEY',  'tCi+//YLnsiN|Ts<*TjhhRB7<p,/cTpE8h<?|5Q#K Kc@,E?3j!69fWr4Jy<wD<,' );
define( 'LOGGED_IN_KEY',    'I]@(K)1+M#`RA=#tFp-;TxQ7%cL4_9Vz0maMgQ z/|wz^C2&?r-SMq%XB/PTfZ5[' );
define( 'NONCE_KEY',        'JZ[eBoS9 -uL<lv&.vRE ; <kDS?~nY-Yoc6EiuQyqpl/d/uxf2jGGq*63UGkBps' );
define( 'AUTH_SALT',        ')O]9p.FvPIdpE=LA}c$$wP-z}3M[Fx`uzu|sM0otLjDkPlkUS;9]P](B|P`-)QUh' );
define( 'SECURE_AUTH_SALT', 'bh22Fc(RlI7_{0:7V@d$qC&?YStpkSQ7TsHB!K1(5ZVR|dgjHinP2PaFv2#F&rne' );
define( 'LOGGED_IN_SALT',   ']u,*?I_2D PW/)RV?ATFeI%`0kq7>ClkC#}4Hn`isl}1#eNY+J;OS1vR*h#!FpD{' );
define( 'NONCE_SALT',       '#-2-)5X9Eu);U>b7i12o>jH;u 1mmkqSra8[C~fh0Qek3.xt{{RJaRcA[RBU:@6F' );

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

/** define('WP_HOME','https://www.ardenhillssuites.com'); */
/**define('WP_SITEURL','https://www.ardenhillssuites.com'); */

