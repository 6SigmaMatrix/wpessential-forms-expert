<?php

namespace WPEssential\Plugins\FormsExpert\Admin;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class FormEntries
{
	public static function constructor ()
	{
		add_action( 'wp_ajax_' . WPE_AJAX_PREFIX . '_get_forms_entries', [ __CLASS__, 'list' ] );
		add_action( 'wp_ajax_' . WPE_AJAX_PREFIX . '_dell_forms_entries', [ __CLASS__, 'remove' ] );
	}

	public static function list ()
	{
		wpe_ajax_authorized();
		global $wpdb;
		$sub_query = $wpdb->get_results( "SELECT email_address, id FROM {$wpdb->prefix}wpe_forms_entries" );
		wp_send_json_success( $sub_query );
	}

	public static function remove ()
	{
		wpe_ajax_authorized();

		$id = sanitize_text_field( wpe_array_get( $_POST, 'id' ) );
		if ( ! $id ) {
			wp_send_json_error( __( 'Please try again. There is no subscriber reference.', 'wpessential-forms-expert' ), 401 );
		}

		global $wpdb;
		$wpdb->delete( "{$wpdb->prefix}wpe_forms_entries", [ 'id' => $id ], [ '%d' ] );
		wp_send_json_success( 'done' );
	}

	public static function view ()
	{
		$localization = [
			'ajaxurl'        => admin_url( 'admin-ajax.php' ),
			'web_plug'       => WPE_URL,
			'nonce'          => wp_create_nonce( WPE_NONCE ),
			'ajaxshort'      => '/wp-admin/admin-ajax.php',
			'root'           => home_url( '/' ),
			'ajaxurl_prefix' => WPE_AJAX_PREFIX,
		];
		wp_localize_script( 'wpessential-forms-expert', 'WPEssential', $localization );
		wp_add_inline_script( 'wpessential-forms-expert', 'jQuery(".update-nag,.updated,.error,.is-dismissible").remove();' );
		wp_enqueue_script( 'wpessential-forms-expert' );
		?>
		<div class="wrap">
			<div class="wpessential-admin wpe-container-fluid">
				<div class="wpe-admin-page" id="wpessential-admin"></div>
			</div>
		</div>
		<?php
	}
}
