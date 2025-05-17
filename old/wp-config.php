<?php
define('WP_CACHE', true); // Added by WP Rocket
define('WP_HOME','https://professionhike.com/');
define('WP_SITEURL','https://professionhike.com/');
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
define( 'DB_NAME', 'profehmn_website' );

/** Database username */
define( 'DB_USER', 'profehmn_website' );

/** Database password */
define( 'DB_PASSWORD', 'website@12345' );

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
define( 'AUTH_KEY',         'Hn9}M_:[_9hQ8@A0xOXigrZ9x}-|jmhh<8vhD)1r0n;mUn[9?w.VN$;P!q.-5;V]' );
define( 'SECURE_AUTH_KEY',  'JTVY:Ct(?IV(PwV._,ZAC,iBy^RS,^QbY!D9kny#xunJ659kZkKM%H<{n&eiW6AE' );
define( 'LOGGED_IN_KEY',    'r)$FGV>$x tO<(ut2x8s}3)9L-rb#TF2c<{t5z5-Lfehb,<)s`}Uw}[*,s`:UBSK' );
define( 'NONCE_KEY',        'R$T>$O$(FHO1B:.TU?(R<b6l)J=O DiCzd[w4J,6Z?!we|KdWdV}MNL_e ,>oGI|' );
define( 'AUTH_SALT',        'C5/T]ShJqI[:zbc3L;6~]Mfw8G3/s`Junjca->dE2PJe6e&%ReK8<xl_XqNC1 Sc' );
define( 'SECURE_AUTH_SALT', '#Q8k6v+>x<I4ARjsvB ,-K~P=PlZ!/&uCj<U^98q 92?F]d]=H).M3bYrCftC?M}' );
define( 'LOGGED_IN_SALT',   'x8fq!8V(8Ns.gP!L;jDOSH5F|/Xm*jP)m#(k~=Pk!{plGu6muk2w)m>81edq$ p/' );
define( 'NONCE_SALT',       '~<jAB)Uk)SMNz]EDkXAF%d.2r5gMK5j4[@{qL5$jGQ+-DlTR]RZdV4Az1d.7x>d_' );

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
