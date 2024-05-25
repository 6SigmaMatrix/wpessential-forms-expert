<?php
/**
 * Plugin Name: WPEssential Forms Expert
 * Description: WPEssential Forms Expert.
 * Plugin URI: https://wp.wpessential.org/plugins/wpessential/forms-export
 * Author: WPEssential
 * Version: 1.0.0
 * Author URI: https://wpessential.org/
 * Text Domain: wpessential-forms-expert
 * Requires PHP: 7.4
 * Requires at least: 5.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages/
 */

require_once plugin_dir_path( __FILE__ ) . 'constants.php';
require_once WPEFE_DIR . 'vendor/autoload.php';

add_action( 'plugins_loaded', function () {
	if ( ! did_action( 'wpessential_loaded' ) ) {
		$plugin_notify = \WPEssential\Plugins\Icons\Libraries\RequiredNotifire::make( __( 'Thanks for', 'wpessential-forms-export' ) );
		$plugin_notify->plugin_check( 'wpessential' );
		$plugin_notify->desc( __( 'Choosing the WPEssential product. The installed plugin has required the WPEssential base plugin.', 'wpessential-forms-export' ) );
		$plugin_notify->dismiss( true );
		$plugin_notify->icon( WPEOEW_URL . 'assets/images/wpessential-logo.jpg' );

	}
}, 1000 );

add_action( 'wpessential_loaded', function () {
	\WPEssential\Plugins\FormsExpertInit::constructor();
}, 20 );

register_activation_hook( __FILE__, function () {
	require_once WPEFE_DIR . 'install.php';
	wpe_subsciber_install();
} );

register_deactivation_hook( __FILE__, function () {
	require_once WPEFE_DIR . 'uninstall.php';
	wpe_subsciber_unsintall();
} );
