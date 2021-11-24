<?php
/**
 * PluginDeveloperBoilerplate Activate
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Activate' ) ) :
	/**
	 * Class Activate
	 */
	final class Activate {

		/**
		 *  Activate
		 */
		public static function activate() {
			flush_rewrite_rules();
		}

	}
endif;
