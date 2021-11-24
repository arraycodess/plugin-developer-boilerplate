<?php
/**
 * AdminPage Init
 *
 * @version 1.0.1
 * @package 'plugin-developer-boilerplate'
 */

add_action( 'admin_menu', 'add_submenu_page_test' );
add_action( 'admin_init', 'page_init', 30 );

/**
 * Add options submenu page
 */
function add_submenu_page_test() {
	add_submenu_page(
		'options-general.php',
		__( 'My Plugin Test', 'plugin-developer-boilerplate' ),
		__( 'My Plugin Test', 'plugin-developer-boilerplate' ),
		'manage_options',
		'show-description-admin-page',
		'create_admin_page',
		58
	);
}

/**
 * Options page callback
 */
function create_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	printf('<form method="POST" action="options.php">');
	settings_fields( 'option_group_section_show_description_admin_page' );
	do_settings_sections( 'show-description-admin-page' );
	submit_button();
	printf('</form">');

}

/**
 * Page_init.
 */
function page_init() {
	add_settings_section(
		'section_product_recommendations_ai',
		'',
		'title_section_product_recommendations_ai',
		'show-description-admin-page'
	);
	add_settings_field(
		'field_activate',
		__('Activate', 'plugin-developer-boilerplate'),
		'field_activate_callback',
		'show-description-admin-page',
		'section_product_recommendations_ai'
	);
	register_setting(
		'option_group_section_show_description_admin_page',
		'option_name_section_show_description_admin_page',
		array( 'sanitize' )
	);

}

/**
 * Sanitize each setting field as needed
 *
 * @param array $input Contains all settings fields as array keys.
 */
function sanitize( $input ) {
	$new_input = array();
	if ( isset( $input['field_activate'] ) ) {
		$new_input['field_activate'] = rest_sanitize_boolean( $input['field_activate'] );
	}
	return $new_input;
}

/**
 * Print the Section text
 */
function title_section_product_recommendations_ai() {
	print 'Show Description Page';
}

/**
 * Field_activate_section_product_recommendations_ai_callback
 */
function field_activate_callback() {
	$option_name_section_show_description_admin_page = get_option( 'option_name_section_show_description_admin_page' );
	$checked = 0;
	if ( isset( $option_name_section_show_description_admin_page['field_activate'] ) ) {
		if ( $option_name_section_show_description_admin_page['field_activate'] ) {
			$checked = 1;
		}
	}
	printf(
		'<input type="checkbox" id="field_activate" name="option_name_section_show_description_admin_page[field_activate]" value="1"' . checked( 1, $checked, false ) . '/>',
		isset( $options['field_activate'] ) ? esc_attr( $options['field_activate'] ) : ''
	);
}
