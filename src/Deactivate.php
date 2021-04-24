<?php


namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'Deactivate' ) ):
	final class Deactivate {

		public static function deactivate(){
			flush_rewrite_rules();
		}

	}
endif;
