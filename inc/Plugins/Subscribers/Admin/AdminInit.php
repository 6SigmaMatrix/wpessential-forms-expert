<?php

namespace WPEssential\Plugins\Subscribers\Admin;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class AdminInit
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/admin_pages/submenu_nav', [ __CLASS__, 'add_pages' ] );
		Subscribers::constructor();
	}

	public static function add_pages ( $pages )
	{
		return wp_parse_args( [
			[
				'parent_slug' => 'wpessential',
				'page_title'  => __( 'Subscribers', 'wpessential-subscriber' ),
				'menu_title'  => __( 'Subscribers', 'wpessential-subscriber' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'wpessential-subscribers',
				'callback'    => [ Subscribers::class, 'view' ],
				'position'    => 2,
			],
		], $pages );
	}
}
