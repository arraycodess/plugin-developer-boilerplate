<?php
/**
 *
 * Plugin Name: Plugin Developer Boilerplate
 * Plugin URI:  #
 * Description: Plugin Developer Boilerplate Description
 * Version:     1.0.0
 * Requires at least: 5.6.2
 * Requires PHP:      7.2
 * Author:      Array é Vida
 * Author URI:  https://arrayevida.com.br/
 * Developer: Heitor Sousa
 * Developer URI: https://github.com/heitorspedroso
 * Domain Path: /languages
 * Text Domain: plugin-developer-boilerplate
 * *
 * Woo: 12345:12345
 * WC requires at least: 4.8.0
 * WC tested up to: 5.0.0
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package 'plugin-developer-boilerplate'
 */

use PluginDeveloperBoilerplate\Activate;
use PluginDeveloperBoilerplate\Deactivate;
use PluginDeveloperBoilerplate\PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if ( ! class_exists( 'Activate' ) ) :
	/**
	 * Activate function.
	 */
	function activate_plugin_developer_boilerplate() {
		Activate::activate();
	}
	register_activation_hook( __FILE__, 'activate_plugin_developer_boilerplate' );
endif;


if ( ! class_exists( 'Deactivate' ) ) :
	/**
	 * Deactivate function.
	 */
	function deactivate_plugin_developer_boilerplate() {
		Deactivate::deactivate();
	}
	register_deactivation_hook( __FILE__, 'deactivate_plugin_developer_boilerplate' );
endif;

if ( ! class_exists( 'PluginDeveloperBoilerplate' ) ) :
	PluginDeveloperBoilerplate::instance();
endif;
