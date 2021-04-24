<?php


namespace PluginDeveloperBoilerplate;

if ( ! defined( 'ABSPATH' ) )
	exit;

if ( ! class_exists( 'Activate' ) ):
	final class Activate {

		public static function activate(){
			flush_rewrite_rules();
		}

	}
endif;
