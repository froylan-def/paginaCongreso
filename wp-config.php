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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'congreso' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'fF]iYdy[lW&#$(Zd=wGXN);3PMFBT3$a01*$rd6T0r6L^Hi@M>R{]cfNV0_Mfy3`' );
define( 'SECURE_AUTH_KEY',  'm~wjbD0(g&zP!;{P/n|,S>9Pv9.?DK7]VU>2oI9N2:EtD2Lo]0E{7LfH ozr:Od+' );
define( 'LOGGED_IN_KEY',    'iAQ1r--,CFS] nGI*&yg.di154*/&(~?+B/e6ajQIk]Q_w0owB$UrM(,yxwRZNZi' );
define( 'NONCE_KEY',        '8pGRLUBJBEeRXroWVa*6}SAYJGIl#k[CVQZgtj4.jICl_rO}~k xHkqqm!~kX$d-' );
define( 'AUTH_SALT',        '{I@N)uzN>f:Bgh;CpbO$cX@I|!P_}$Gd7}>u=12X0`U/KZ{tW~A|JMR-.nLQ8rOL' );
define( 'SECURE_AUTH_SALT', '#<NTdyMn;2?aU}d]onu{Q?NF8:I+G<~FR@)?}ha#mq}{8NrLmtebnwx4>qGA)_,@' );
define( 'LOGGED_IN_SALT',   'Uqett0gGG5SRV;+?>?_n7^#_ 9Y :u;*cgJ:24urcWQq241|Z6ql(-4k7z;Lu1dP' );
define( 'NONCE_SALT',       ') @]MPEBpaRMRUo2DC#+iydo~:oV[D7{FNv|XqjwO:R2?|az V/[lG7x^u#k%;L?' );

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
