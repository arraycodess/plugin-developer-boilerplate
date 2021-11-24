<?php
/**
 * AdminPage Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AdminPage' ) ) :
	/**
	 * Class AdminPage
	 */
	final class AdminPage {

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
		 * Holds the values to be used in the fields callbacks
		 *
		 * @var $option_name_section_show_description_admin_page AdminPage Page.
		 */
		private $option_name_section_show_description_admin_page;

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
			add_action( 'admin_menu', array( $this, 'add_submenu_page' ) );
			add_action( 'admin_init', array( $this, 'page_init' ), 30 );
		}

		/**
		 * Add options submenu page
		 */
		public function add_submenu_page() {
			add_submenu_page(
				'options-general.php',
				__( 'My Plugin Test', 'plugin-developer-boilerplate' ),
				__( 'My Plugin Test', 'plugin-developer-boilerplate' ),
				'manage_options',
				'show-description-admin-page',
				array( $this, 'create_admin_page' ),
				58
			);
		}

		/**
		 * Options page callback
		 */
		public function create_admin_page() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$this->option_name_section_show_description_admin_page = get_option( 'option_name_section_show_description_admin_page' );
			include plugin_dir_path( self::PLUGIN_PATH ) . '../views/html-admin-page.php';

		}

		/**
		 * Page_init.
		 */
		public function page_init() {
			add_settings_section(
				'section_product_recommendations_ai',
				'',
				array( $this, 'title_section_product_recommendations_ai' ),
				'show-description-admin-page'
			);
			add_settings_field(
				'field_activate',
				__('Activate', 'plugin-developer-boilerplate'),
				array( $this, 'field_activate_callback' ),
				'show-description-admin-page',
				'section_product_recommendations_ai'
			);

			register_setting(
				'option_group_section_show_description_admin_page',
				'option_name_section_show_description_admin_page',
				array( $this, 'sanitize' )
			);

		}

		/**
		 * Sanitize each setting field as needed
		 *
		 * @param array $input Contains all settings fields as array keys.
		 */
		public function sanitize( $input ) {
			$new_input = array();
			if ( isset( $input['field_activate'] ) ) {
				$new_input['field_activate'] = rest_sanitize_boolean( $input['field_activate'] );
			}
			return $new_input;
		}

		/**
		 * Print the Section text
		 */
		public function title_section_product_recommendations_ai() {
			print 'Show Description Page';
		}

		/**
		 * Field_activate_section_product_recommendations_ai_callback
		 */
		public function field_activate_callback() {

			$checked = 0;
			if ( isset( $this->option_name_section_show_description_admin_page['field_activate'] ) ) {
				if ( $this->option_name_section_show_description_admin_page['field_activate'] ) {
					$checked = 1;
				}
			}
			printf(
				'<input type="checkbox" id="field_activate" name="option_name_section_show_description_admin_page[field_activate]" value="1"' . checked( 1, $checked, false ) . '/>',
				isset( $this->options['field_activate'] ) ? esc_attr( $this->options['field_activate'] ) : ''
			);
		}
	}
endif;
