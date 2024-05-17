<?php
/**
 * Plugin Name: WPEssential Subscriber
 * Description: WPEssential Subscriber.
 * Plugin URI: https://wp.wpessential.org/plugins/wpessential/subscriber
 * Author: WPEssential
 * Version: 1.0.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-subscriber
 * Requires PHP: 7.4
 * Requires at least: 5.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages/
 */

require_once plugin_dir_path( __FILE__ ) . 'constants.php';
require_once WPESUB_DIR . 'vendor/autoload.php';

add_action( 'plugins_loaded', function () {
	if ( ! did_action( 'wpessential_loaded' ) ) {
		$plugin_notify = \WPEssential\Plugins\Icons\Libraries\RequiredNotifire::make( __( 'Thanks for', 'wpessential-order-export-woo' ) );
		$plugin_notify->plugin_check( 'wpessential' );
		$plugin_notify->desc( __( 'Choosing the WPEssential product. The installed plugin has required the WPEssential base plugin.', 'wpessential-order-export-woo' ) );
		$plugin_notify->dismiss( true );
		$plugin_notify->icon( WPEOEW_URL . 'assets/images/wpessential-logo.jpg' );

	}
}, 1000 );

add_action( 'wpessential_loaded', function () {
	\WPEssential\Plugins\SubscribersInit::constructor();
}, 20 );

register_activation_hook( __FILE__, function () {
	require_once WPESUB_DIR . 'install.php';
	wpe_subsciber_install();
} );

register_deactivation_hook( __FILE__, function () {
	require_once WPESUB_DIR . 'uninstall.php';
	wpe_subsciber_unsintall();
} );
