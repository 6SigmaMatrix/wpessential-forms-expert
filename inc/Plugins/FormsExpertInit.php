<?php

namespace WPEssential\Plugins;

use WPEssential\Plugins\FormsExpert\Admin\AdminInit;
use WPEssential\Plugins\FormsExpert\Assets\AssetsInit;
use WPEssential\Plugins\FormsExpert\Requesting\RequestingInit;

final class FormsExpertInit
{
	public static function init ()
	{
		load_plugin_textdomain( 'wpessential-forms-export', false, WPEFE_DIR . '/language' );
	}

	public static function constructor ()
	{
		self::load_files();
		self::start();
		add_action( 'wpessential_init', [ __CLASS__, 'init' ], 100 );
	}

	public static function load_files ()
	{
		require_once WPEFE_DIR . '/inc/Plugins/FormsExpert/Functions/general.php';
	}

	public static function start ()
	{
		RequestingInit::constructor();
		AssetsInit::constructor();
		AdminInit::constructor();
	}
}
