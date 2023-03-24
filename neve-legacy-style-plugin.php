<?php
/**
 * Plugin Name: Neve Legacy Style
 * Plugin URI: https://themeisle.com
 * Description: This plugin is used to add legacy support for Neve theme
 * Version: 1.0.0
 * Author: ThemeIsle
 * Author URI: https://themeisle.com
 **/

use Neve_Legacy\Load_Legacy;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NEVE_LEGACY_VERSION', '0.1' );
define( 'NEVE_LEGACY_PATH', plugin_dir_path( __FILE__ ) );
define( 'NEVE_LEGACY_URL', plugin_dir_url( __FILE__ ) );

// Check if the Neve theme is active.
if ( 'Neve' !== wp_get_theme()->name ) {
	return;
}

require NEVE_LEGACY_PATH . 'vendor/autoload.php';
add_action(
	'after_setup_theme',
	function() {
		$legacy = new Load_Legacy();
		$legacy->init();
	}
);
