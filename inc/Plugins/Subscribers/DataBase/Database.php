<?php

namespace WPEssential\Plugins\Subscribers\DataBase;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

abstract class Database
{
	public static function constructor ()
	{
		self::load_file();
	}

	public static function load_file ()
	{
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	}
}
