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
define( 'DB_NAME', 'hirunavi_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Gb.:Vx)6u-P16SkB9K2zVdFt?x<s$eVeS*_z^bRh!T^Mg9YV.?O]Vm@4g!Q ?wn_' );
define( 'SECURE_AUTH_KEY',  '?|M=B;k/;_}VqznGg?`G>|&/3:3Db{J`t8@MG)|4ide$7p:P8hVb._faSiw`BX e' );
define( 'LOGGED_IN_KEY',    '=m`KZ] 7jyg0?8)`C}G@qR07HM4rcTn(m-Lg!4&;q*d]Kqc[PcSSAZMpbah#4K1z' );
define( 'NONCE_KEY',        '$hWw*n87@*Nsd <=.Z~5bj.=40D9qQS5],gx5n&S;fO%<KA;bOc-e?q>[-qly6,_' );
define( 'AUTH_SALT',        '*L$Y#34}Lws8p~5pf^Q9@m2MktQy.(^jg(k+/1=8UjyWHoj0YRPn%phvc{>k(V3X' );
define( 'SECURE_AUTH_SALT', '4BwbeRh@7000_>=VUf:~vWS@1]Igh<(Ut/G^P7D8_rT{Sfdf3l!WD2xLQq2:Q#G4' );
define( 'LOGGED_IN_SALT',   'LhT9a%4}FTn~+D2bYMBFFQrEN=_MD0i7^xC](kO+S{Gf+PIuV)Lp=h(KAk8wMC%L' );
define( 'NONCE_SALT',       'PE{LRVa^|1p23a1Y.IxsAZGBac@#`h8!?==&tlS=bkM}A6uOv>X{q.,/UQn`1|3s' );

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
