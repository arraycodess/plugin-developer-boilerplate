<?php
/**
 * PluginDeveloperBoilerplate Deactivate
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Deactivate' ) ) :
	/**
	 * Class Activate
	 */
	final class Deactivate {

		/**
		 *  Deactivate
		 */
		public static function deactivate() {
			flush_rewrite_rules();
		}

	}
endif;
