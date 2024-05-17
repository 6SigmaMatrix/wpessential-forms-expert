<?php

namespace WPEssential\Plugins\Subscribers\DataBase;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class DatabaseInit
{
	public static function constructor ()
	{
		self::tables();
	}

	public static function tables ()
	{
		Subscribers::constructor();
	}
}
