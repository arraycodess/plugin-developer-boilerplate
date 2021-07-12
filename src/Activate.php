<?php
/**
 * PluginDeveloperBoilerplate Activate
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate
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
			$log       = new \WC_Logger();
			$log_entry = 'activate function';
			$log->add( 'plugin-developer-boilerplate', $log_entry );
			flush_rewrite_rules();
		}

	}
endif;
