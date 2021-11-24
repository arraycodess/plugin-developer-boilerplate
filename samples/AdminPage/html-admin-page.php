<?php
/**
 * Admin Page
 *
 * @package 'product-recommendations-artificial-intelligence-for-woocommerce'
 * @version 1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style>
	.form-table{
		clear:none !important;
	}
	.status{
		display: inline-block;
		position: relative;
		top: -10px;
		left: 0;
	}
	.status .dashicons{
		font-size: 40px;
		color:green;
	}
</style>
<div class="wrap">
	<!--suppress HtmlUnknownTarget -->
	<form method="POST" action="options.php">
		<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
		<div id="poststuff" class="metabox-holder has-right-sidebar">
			<div class="sm-padded">
				<div id="post-body-content" class="has-sidebar-content">
					<div class="meta-box-sortabless">
						<div class="postbox">
							<h3 class="hndle"><span><?php esc_html_e( 'Page Title', 'plugin-developer-boilerplate' ); ?></span></h3>
							<div class="inside">
								<?php
								settings_fields( 'option_group_section_show_description_admin_page' );
								do_settings_sections( 'show-description-admin-page' );
								submit_button();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
