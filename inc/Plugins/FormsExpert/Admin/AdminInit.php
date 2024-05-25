<?php

namespace WPEssential\Plugins\FormsExpert\Admin;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class AdminInit
{
	public static function constructor ()
	{
		add_filter( 'wpe/register/admin_pages/submenu_nav', [ __CLASS__, 'add_pages' ] );
		add_filter( 'wpe/register/admin_pages/route/plugins/options/files', [ __CLASS__, 'configuration' ] );
		FormEntries::constructor();
	}

	public static function add_pages ( $pages )
	{
		return wp_parse_args( [
			[
				'parent_slug' => 'wpessential',
				'page_title'  => __( 'Form Expert', 'wpessential-forms-expert' ),
				'menu_title'  => __( 'Form Expert', 'wpessential-forms-expert' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'wpessential-form-expert',
				'callback'    => [ FormEntries::class, 'view' ],
				'position'    => 2,
			],
		], $pages );
	}

	public static function configuration ( $list )
	{
		return wp_parse_args( [ WPEFE_DIR . 'config/plugins/forms-expert.php' ], $list );
	}
}
