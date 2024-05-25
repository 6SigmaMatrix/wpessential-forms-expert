<?php

namespace WPEssential\Plugins\FormsExpert\Assets;

class RegisterAssets
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/js', [ __CLASS__, 'register_script' ], 20 );
	}

	public static function register_script ( $list )
	{
		return wp_parse_args( [
			'wpessential-forms-expert' => [
				'link' => WPEFE_URL . 'assets/js/wpessential-forms-expert',
				'dep'  => false,
				'ver'  => WPEFE_VERSION,
			]
		], $list );
	}
}
