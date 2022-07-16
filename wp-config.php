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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kremzy_test' );

/** Database username */
define( 'DB_USER', 'kremzy_dev' );

/** Database password */
define( 'DB_PASSWORD', 'lol1005but31heal' );

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
define( 'AUTH_KEY',         ' G],cIOtI!L2oRJ1{%,C;wWgkY}r`6-bmcKOv/lbzv=hoWmmupkQLR[Q$M2v9(mI' );
define( 'SECURE_AUTH_KEY',  '$r+@1(`~q/p*o$eGw8B$bf2u0}+Sy*Rd)opu9?4QUn~/@MHyfLWpWEu2xHh/LqhP' );
define( 'LOGGED_IN_KEY',    'DYhT8Oe3|vb $(BDf(.7E`d1RV?<z{EZ `N4:&FLOvr={RIdSi*3*hs:x>vLr&DW' );
define( 'NONCE_KEY',        'U{(dwCw|>:(P{n/ntb5DU66_d9YA3>0rs5zJ*GV!^-ddF!jLMXM>D!DJCze[7t_m' );
define( 'AUTH_SALT',        'B49c|wJkYPC 10K{.:ik9X?(yZN/~2p^IXr2G$Z.;uE<1rJ%!k}V}@ODY&n<;4/#' );
define( 'SECURE_AUTH_SALT', 'ljpowEre?X}Lbb$C9aQ=%94Jxc&<:]?)swm3USC-Kv+jgNs~d@!rP&.]=vY97/l[' );
define( 'LOGGED_IN_SALT',   '1>31R{})TcYo&0pmK(P!owKW1&B[e9wGizydk+5;#i%ydAE5AzT{.;X0MsK29`a*' );
define( 'NONCE_SALT',       'of@i?R>7?h-/9D4hni@c=RuK2Ohc,ukSuvy^I&%T5kicPZH0X%i+qA;SO-xRk|*s' );

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
