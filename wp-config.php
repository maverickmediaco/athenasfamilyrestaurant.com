<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'athenas');

/** MySQL database username */
define('DB_USER', 'athenas');

/** MySQL database password */
define('DB_PASSWORD', 'sDj6HPweduxszwrN');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'stX kVS@~`=-@B:AoPXuyTmm#o]8?ya>zuyveecTUN2i,|-bK|W|{|7.VTSM::J$');
define('SECURE_AUTH_KEY',  'jbwe@*X^Uw QF0{}oAP|nt1$*(+NDg-=wy~^nS:~PZ!4GvMDhq72Q0 D_HOSH^T(');
define('LOGGED_IN_KEY',    'uQp+AFa%bt~@NpYsXCD(G5m`DP-ja^%Pm+.b|]Jey]wog!j|fi`jE4nx><yrhL-7');
define('NONCE_KEY',        'cbQuB5i3_|*qv3!Z1U,0MxWq{|xowV|IeVcdI.RNglvAK^8Zoox6#uRltnMbp`cv');
define('AUTH_SALT',        'PyMt7]M r$O:/K)<r{-8jpSX2pAd(n91.6vHA+elFs-N7}w5Khb _Xqh-^SsW.Tr');
define('SECURE_AUTH_SALT', '&7)=Y=!,KvW>R;cCSCvs-)%7-aUxeqT8<}^HWS:ACvl)i-ks8thy|D?|OX9<2i-W');
define('LOGGED_IN_SALT',   'gGCI*6nmZAnv}^(WFEWu4I <%+XyU;%I iP =n7N4^``B^e J5=+;=?}3Zwsu6AX');
define('NONCE_SALT',       'S$||*I[^|YsK2Wk|rIUqirN1X@o/UZ}?3E=%EBj?Y-.Y8--gd_,]aSM#7aOIE9)8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
