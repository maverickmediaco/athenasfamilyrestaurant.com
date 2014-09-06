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
define('AUTH_KEY',         '+TT=dx^|fBg3VvN+ph0Y[{$jr|C_/gSEuyIZ3?x$ZZNT{2.2BC]K!fR?2sIW^v_B');
define('SECURE_AUTH_KEY',  '+%K0CR6pJc>|gKt/Q7:24]qA$@]pec^|HD^[G>^_S&*[-%j?X#6NY&^M~Wy(byh`');
define('LOGGED_IN_KEY',    '#{zC/2kO(,;3Y(t-Iq7:`[0,H9+wqf}Qs6)5(.7.Y.:X{*+6TCr1kq*0n s1r]2>');
define('NONCE_KEY',        '|-J{L25^CP$<w1|g|SD95;[a#h>/jY0di$nhJ|F1RAs4Spr,D1|#Ns;0Q7}RL@m-');
define('AUTH_SALT',        'LoTUE<{mgQ9v.eMI|W+^E]#cD(&gtis-{)EOkB)2ZTGNY!bt[x9sB#sixQJbA68:');
define('SECURE_AUTH_SALT', 'XK5>Jj1On9B R*3Ju.ru]XUe3A~-^linwQ`:^)al80~BfLoAtcNpYyN9|gdWNgXj');
define('LOGGED_IN_SALT',   'AWS9-!1/;(52wv^;3(R|v!Q#p^SadN9mB)gYMaVf,!8Ic]R&CcPsQR#IzW>i=xw7');
define('NONCE_SALT',       'fW3sg !Oy?<DwME1EaNrhP$SS^q-q/S&c-_5aG{_A_TLRQA|~G?0&7|VfPC`h6 <');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
