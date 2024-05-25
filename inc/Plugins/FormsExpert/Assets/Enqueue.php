<?php

namespace WPEssential\Plugins\FormsExpert\Assets;

class Enqueue
{

	public static function constructor ()
	{
		add_filter( 'wpe/backend/js', [ __CLASS__, 'backend_js' ], 20 );
	}

	public static function backend_js ( $list )
	{
		return wp_parse_args( [ 'wpessential-forms-expert' ], $list );
	}
}
