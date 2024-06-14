<?php
/**
 * @wordpress-plugin
 * Plugin Name: The Plugin
 * Version:     0.0.1
 * Description: The Description
 * Author:      Team Xfive
 * Author URI:  http://xfive.co
 * Text Domain: the-plugin
 * Domain Path: /languages/
 * License:     GPL v3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

defined( 'ABSPATH' ) || exit;

define( 'THE_PLUGIN_FILE', __FILE__ );
define( 'THE_PLUGIN_PATH', realpath( plugin_dir_path( THE_PLUGIN_FILE ) ) . '/' );
define( 'THE_PLUGIN_URL', plugin_dir_url( THE_PLUGIN_FILE ) );
define( 'THE_PLUGIN_TEXTDOMAIN', 'the-plugin' );

spl_autoload_register(
	function ( $class ) {
		// project-specific namespace prefix.
		$prefix = 'ThePlugin\\';

		// base directory for the namespace prefix.
		$base_dir = THE_PLUGIN_PATH . 'src/';

		// does the class use the namespace prefix?
		$len = strlen( $prefix );

		if ( strncmp( $prefix, $class, $len ) !== 0 ) {
			return;
		}

		$relative_class = substr( $class, $len );

		$file = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

		// if the file exists, require it.
		if ( file_exists( $file ) ) {
			require $file;
		}
	}
);

ThePlugin\Base::instance();
