<?php

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'PluginDeveloperBoilerplate' ) ):
	/**
	 * Class PluginDeveloperBoilerplate
	 * @package PluginDeveloperBoilerplate
	 * @author Heitor <heitorspedroso@gmail.com>
	 * @version 1.0.0
	 */
	final class PluginDeveloperBoilerplate {

		/**
		 * @const PLUGIN_PATH
		 */
		public const PLUGIN_PATH = __FILE__;

		/**
		 * @var $instance
		 */
		protected static $instance = null;

		/**
		 * @return static::$instance
		 */
		final public static function instance() {
			if ( null === static::$instance ) {
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * PluginDeveloperBoilerplate constructor.
		 */
		public function __construct() {
			$this->registerHooks();
		}

		/**
		 * registerHooks
		 */
		private function registerHooks(){
			register_activation_hook( self::PLUGIN_PATH, [$this, 'activate'] );
			register_deactivation_hook ( self::PLUGIN_PATH, [$this, 'deactivate'] );

			// Load plugin text domain.
			add_action( 'init', [$this, 'loadPluginTextDomain'] );
		}

		/**
		 * activate
		 */
		private function activate(){
			Activate::activate();
		}

		/**
		 * deactivate
		 */
		private function deactivate(){
			Deactivate::deactivate();
		}

		/**
		 * loadPluginTextDomain
		 */
		public function loadPluginTextDomain() {
			load_plugin_textdomain( 'plugin-developer-boilerplate', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Debug
		 */
		public function debugMe( $message ) {
			if ( WP_DEBUG === true ) {
				if ( is_array( $message ) || is_object( $message ) ) {
					error_log( print_r( $message, true ) );
				} else {
					error_log( $message );
				}
			}
		}
	}
endif;
