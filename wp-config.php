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
define( 'DB_NAME', 'blanche' );

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
define( 'AUTH_KEY',         '6Lmp|oh3%-y:@h48Q,plInbKb4l-U0OX?#aGcjg|DBAkI.Y8Wd-&n Z|EHTeMW{E' );
define( 'SECURE_AUTH_KEY',  'tnL!Lwk<db(O)W-}(a>!f7=W9]lt=*7tf y?`$ocV}ED=*`AFP,Fh|&!*KLWy2x]' );
define( 'LOGGED_IN_KEY',    'f6F`v$+uO;T75Qrs(.>**0,k$0~%GDXQ.Fz2_~N-5R}s1 Yd,iZ%_U*f$H9b&.,o' );
define( 'NONCE_KEY',        'Bf+m<bh;7UFq!;c,`*#0.GJkzEQS7yq5n[tmd5$K[#{DR0cnt0~$IkM/sFzS|N[6' );
define( 'AUTH_SALT',        '%1zPoa^gkou]tT(B^6[lr0|aKpH4$HzZP{{W{AH,%vKY$$|$zb1U{X_Mg8!, Aey' );
define( 'SECURE_AUTH_SALT', 'eCZlE?4RkyPpKKJk]RUoaA-[vU7: `K313_3SrD#hh*_06~t(gD_:Xp!!kXc:^oe' );
define( 'LOGGED_IN_SALT',   't]Xz{,)1pJUZmt^ZL(*d}tw3uNq70?1oEm(.9n:DDQG2yM=JLq1bv&&<rCe_QY_F' );
define( 'NONCE_SALT',       '7e5Q3f$CPE>`{Hyq_Ht.IuXob!]1X-/|$lWf+gEE7_k(mqafe+EP;P>V= L1pj1O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_blanche_';

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
