<?php

namespace WPEssential\Plugins;

use WPEssential\Plugins\Subscribers\Admin\AdminInit;
use WPEssential\Plugins\Subscribers\Assets\AssetsInit;
use WPEssential\Plugins\Subscribers\Requesting\RequestingInit;

final class SubscribersInit
{
	public static function init ()
	{
		load_plugin_textdomain( 'wpessential-subscribers', false, WPESUB_DIR . '/language' );
	}

	public static function constructor ()
	{
		self::load_files();
		self::start();
		add_action( 'wpessential_init', [ __CLASS__, 'init' ], 100 );
	}

	public static function load_files ()
	{
		require_once WPESUB_DIR . '/inc/Plugins/Subscribers/Functions/general.php';
	}

	public static function start ()
	{
		RequestingInit::constructor();
		AssetsInit::constructor();
		AdminInit::constructor();
	}
}
