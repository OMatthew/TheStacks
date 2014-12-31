<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'stacks');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ']HY0[h18]3An]?_}qbk{hur]1iDTf^vOuOA;,&MDyt0FUMq.t7?H^b{nV#+IXk^1');
define('SECURE_AUTH_KEY',  'OrY0anWF<]8:(Q!L~ba/tr]3@ZgXVG>xDr=VFe^?+L23&JnSh?/%w -*Uh&cZ;9m');
define('LOGGED_IN_KEY',    '=3wDOh3 P,}?e6oqk.(P`~VCo|+%x`1u@1{{Em}(E=IG>C%(f|n/S1hzY*G>H_kp');
define('NONCE_KEY',        'cOL-rE%4A4}(Qb6h+,l%X+x&f.0r9c!xPv/l9P{[%OakWJD|c9E{^/__HR{8zV?|');
define('AUTH_SALT',        ';|r6i%bRg6]B9}N6c[?{FofL9M(}?AGW>M}H}nv~]G^_%,L1g.q,r1?U]$e[;4Bt');
define('SECURE_AUTH_SALT', 'k`9(Ds8oB%R[mP>#Nz36m2~D3#YS{6Q+M|X!KhWAw aB_:rzp6b`Lp(T@-9;QXZT');
define('LOGGED_IN_SALT',   '&~~jnzSs4-XoMnrGe(<_nDsB]/ Az^VE|_1|9jXb#}{g=$qh{e|RoPH:p7>q+<i0');
define('NONCE_SALT',       '@C$WIg}{nGa+Ai+>_y2&6oLaQj+Wx~G&[]+3(Mi62!gkMZ0N|5X(.@O+OWXzp<f8');

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
