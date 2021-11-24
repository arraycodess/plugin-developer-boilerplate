<?php
/**
 * DescriptionProduct Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

add_action( 'woocommerce_after_shop_loop_item_title', 'add_short_description' );
add_filter( 'woocommerce_cart_item_name', 'add_excerpt_in_cart_item_name', 10, 3 );


/**
 * Add_short_description
 */
function add_short_description() {
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
function add_excerpt_in_cart_item_name( $item_name, $cart_item, $cart_item_key ) {
	if ( ! is_cart() ) {
		return $item_name;
	}
	$excerpt      = wp_strip_all_tags( get_the_excerpt($cart_item['product_id']), true );
	$excerpt_html = '<p name="short-description">' . $excerpt . '</p>';

	return $item_name . $excerpt_html;
}
