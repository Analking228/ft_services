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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql-svc:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '}{_TPNdVnUbw}yPY8x1r06TI6zsm}km$t-Yb,I($nK+skf1oSB~Raxd$!$%+h|N@');
define('SECURE_AUTH_KEY',  'SLH8!gZ:G;?hs61SL(FPX,[XqRQt.x|k|BK-c{)KFd>X)-Y+h=S3Rj1DN|n[rPxo');
define('LOGGED_IN_KEY',    'oug=!EgFmb~Fc<*/;kPzZMQV%-||[Cj.[8!;lJIS=X0X{uvZ7^zI6?vTC07cA`x_');
define('NONCE_KEY',        'zdQ.T@*/f`+PlCjN[EL`{(|}ry4vyOaW0d+w1P51yq-CNy&e3U,y0pskfV5(MyZP');
define('AUTH_SALT',        'Kd HbojE|+ aiUEQ|UgY4T_|/tSwAK7)-cCc]rY U~mK|4kUd3_+!FNR|~q2TkON');
define('SECURE_AUTH_SALT', 'z<#v9cs^;&~xV4b^04lP1yR1 o+$g%A+IFZ&`;L`YB1i2XCE{N@Na*oTz#23Pi_O');
define('LOGGED_IN_SALT',   '|aob =rku]W~E(B+H%?NMx:4/M,VfD^yVqP8y mE `wx4^OI,kC-C|;Oxpu|OHO9');
define('NONCE_SALT',       '*+A+)yK8U^Tv;-c0k++?6Q_Tca^!}eWFd-ZCO`Lc=hKpj^;_I$zQyxE|I+z! 1K)');

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
        define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';