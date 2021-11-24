<?php
/**
 * PluginDeveloperBoilerplate Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'PluginDeveloperBoilerplate' ) ) :
	/**
	 * Class PluginDeveloperBoilerplate
	 */
	final class PluginDeveloperBoilerplate {

		/**
		 * Const PLUGIN_PATH
		 *
		 * @const PLUGIN_PATH
		 */
		const PLUGIN_PATH = __FILE__;

		/**
		 * Instance of this class.
		 *
		 * @var $instance
		 */
		protected static $instance = null;

		/**
		 * Return an instance of this class.
		 *
		 * @return static::$instance
		 */
		public static function instance() {
			if ( null === static::$instance ) {
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * PluginDeveloperBoilerplate constructor.
		 */
		public function __construct() {
			$this->register_hooks();
			$this->register_classes();
		}

		/**
		 * Register_hooks function.
		 */
		private function register_hooks() {
			add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
			/** Add_action( 'woocommerce_after_shop_loop_item_title', array( DescriptionProduct::class, 'add_short_description' ) ); */
			/** Add_filter( 'woocommerce_cart_item_name', array( DescriptionProduct::class, 'add_excerpt_in_cart_item_name' ), 10, 3 );*/
		}

		/**
		 * Register_classes function.
		 */
		private function register_classes() {
			/** EnqueueScripts::instance();*/
		}

		/**
		 * Load_plugin_textdomain function
		 */
		public function load_plugin_textdomain() {
			load_plugin_textdomain( 'plugin-developer-boilerplate', false, dirname( plugin_basename( __FILE__ ), 2 ) . '/i18n/languages/');
		}
	}
endif;
