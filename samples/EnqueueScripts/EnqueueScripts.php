<?php
/**
 * EnqueueScripts Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'EnqueueScripts' ) ) :
	/**
	 * Class EnqueueScripts
	 */
	final class EnqueueScripts {

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
		 * Start up
		 */
		private function __construct() {
			add_action('wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action('wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		}

		/**
		 * Enqueue_scripts function
		 */
		public function enqueue_scripts() {
			wp_enqueue_script('main-script-boilerplate', plugins_url('../assets/js/main-script-boilerplate.min.js', __FILE__), array(), '1.2', true);
		}

		/**
		 * Enqueue_styles function
		 */
		public function enqueue_styles()
		{
			wp_enqueue_style('style-boilerplate', plugins_url('../assets/css/style-boilerplate.min.css', __FILE__), '', '1.1');
		}
	}
endif;
