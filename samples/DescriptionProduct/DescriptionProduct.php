<?php
/**
 * DescriptionProduct Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'DescriptionProduct' ) ) :
	/**
	 * Class DescriptionProduct
	 */
	final class DescriptionProduct {

		/**
		 * Const PLUGIN_PATH
		 *
		 * @const PLUGIN_PATH
		 */
		const PLUGIN_PATH = __FILE__;

		/**
		 * Add_short_description
		 */
		public static function add_short_description() {
			global $product;
			printf('<div class="short-description">%s</div>',
				wp_kses_post(apply_filters( 'woocommerce_short_description', $product->get_short_description() ))
			);
			?>
			<?php
		}


		/**
		 * Add_excerpt_in_cart_item_name
		 *
		 * @param string $item_name Item name.
		 * @param array  $cart_item Items.
		 * @param int    $cart_item_key Item key.
		 */
		public static function add_excerpt_in_cart_item_name( $item_name, $cart_item, $cart_item_key ) {
			if ( ! is_cart() ) {
				return $item_name;
			}
			$excerpt      = wp_strip_all_tags( get_the_excerpt($cart_item['product_id']), true );
			$excerpt_html = '<p name="short-description">' . $excerpt . '</p>';

			return $item_name . $excerpt_html;
		}
	}
endif;
