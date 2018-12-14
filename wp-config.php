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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ekari4io_education_first');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'VJ+$m]]JC-fM3_QnVyj&z3_ )KEpPyvL[u?VEY3~JzAR%S}vOMf%N0N|Mx-D<p}6');
define('SECURE_AUTH_KEY',  'p{$KbvXTM8/S5VKRY9_t{$zS,1X|J~JI2e7)==B[8Mr$+7VXbA9~5//YXg$3.k!7');
define('LOGGED_IN_KEY',    'WaOiFtQI85zSKoT-UG(5&_gooF>!C]&c7=`VPAHCcs]Et<N+k,RNC5QEKiiE}*1q');
define('NONCE_KEY',        '<j,=RB2+A?6D3O~V,)YKJ7~Nj</(z?`#C_<k[>^@YbFEHu6]ui$HSA`Z1ixTB&;<');
define('AUTH_SALT',        '?jg[a354Z:&vwE(n)/TB9sIUxYD kNm#9VUNA.ixtam_7n$/0a1?^IS;{MLu`2/x');
define('SECURE_AUTH_SALT', '=dPr(_#Z*%,FM<C:A=>.5&q9+T+wes3)p9_79_B(In6+4^|?acz7gRmv%LW[w-I|');
define('LOGGED_IN_SALT',   '.CeFDzn.w{:?#~=G8,@jy6mIw*v32vq:6+MBk-2CR]B;%>U$fe6PVoud_V%emx.*');
define('NONCE_SALT',       'P2*wn&|>jjVmE^L#o(O7Z3y :)0`(2Lz%VXe9gyzAuM5/h0VRWK*4O pppKo0E=B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
@ini_set('upload_max_size' , '256M' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
