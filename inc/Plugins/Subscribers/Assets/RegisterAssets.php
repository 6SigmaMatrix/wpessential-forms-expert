<?php

namespace WPEssential\Plugins\Subscribers\Assets;

class RegisterAssets
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/js', [ __CLASS__, 'register_script' ], 20 );
	}

	public static function register_script ( $list )
	{
		return wp_parse_args( [
			'wpessential-subscribers' => [
				'link' => WPESUB_URL . 'assets/js/wpessential-subscribers',
				'dep'  => false,
				'ver'  => WPESUB_VERSION,
			]
		], $list );
	}
}
