<?php

namespace WPEssential\Plugins\FormsExpert\Requesting;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class RequestingInit
{
	public static function constructor ()
	{
		$prefix = WPE_AJAX_PREFIX;
		add_action( "wp_ajax_{$prefix}_subscribe", [ __CLASS__, 'subscribe' ] );
		add_action( "wp_ajax_nopriv_{$prefix}_subscribe", [ __CLASS__, 'subscribe' ] );

		add_action( "wp_ajax_{$prefix}_get_subscribers", [ __CLASS__, 'list' ] );
		add_action( "wp_ajax_nopriv_{$prefix}_get_subscribers", [ __CLASS__, 'list' ] );
	}

	public static function subscribe ()
	{
		wpe_ajax_authorized();

		$email = sanitize_email( wpe_array_get( $_POST, 'email' ) );
		global $wpdb;
		$check = $wpdb->get_row( "SELECT email FROM {$wpdb->prefix}wpe_forms_entries WHERE email='{$email}'" );
		if ( $check ) {
			wp_send_json_success( __( 'Thank you for subscribe.', 'wpessential-forms-expert' ) );
		}

		$user_info                  = wpe_get_user_location_info();
		$user_info[ 'ip_location' ] = $user_info[ 'query' ];
		$user_info[ 'email' ]       = $email;
		unset( $user_info[ 'query' ], $user_info[ 'message' ], $user_info[ 'status' ] );

		$wpdb->insert( "{$wpdb->prefix}wpe_subscribers", $user_info );
		$headers = 'Content-Type: text/html; charset=UTF-8';
		$mail  = wp_mail( get_bloginfo( 'admin_email' ), __( 'A New Subscribers from ', 'wpessential-forms-expert' ) . get_bloginfo( 'name' ), $email, $headers );
		if ( $mail ) {
			wp_mail( $email, 'Thank you from ' . get_bloginfo( 'name' ), __( 'Thank you for subscribing us.', 'wpessential-forms-expert' ), $headers );
			wp_send_json_success( __( 'Thank you for subscribe.', 'wpessential-forms-expert' ) );
		}
		wp_send_json_error( __( 'Server was busy. Please try again.', 'wpessential-forms-expert' ), 401 );
	}

	public static function list ()
	{
		wpe_ajax_authorized();
		global $wpdb;
		$data = $wpdb->get_results( "SELECT sub.*, post.post_title FROM {$wpdb->prefix}wpe_forms_entries sub LEFT JOIN {$wpdb->posts} post ON sub.post_id=post.ID" );
		wp_send_json_success( $data );
	}
}
