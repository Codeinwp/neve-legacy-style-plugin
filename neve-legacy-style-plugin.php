<?php
/**
 * Plugin Name: Neve Legacy Style
 * Plugin URI: https://themeisle.com
 * Description: This plugin is used to add legacy support for Neve theme
 * Version: 1.0.0
 * Author: ThemeIsle
 * Author URI: https://themeisle.com
 **/
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

add_action(
	'after_setup_theme',
	function() {
		add_action( 'wp_enqueue_scripts', 'enqueue_scripts', 0, PHP_INT_MIN );
	}
);

/**
 * Enqueue the legacy style.
 */
function enqueue_scripts() {

	// Neve main Legacy Style.
	wp_register_style( 'neve-legacy-style', NEVE_LEGACY_URL . '/assets/css/style-legacy.min.css', array(), NEVE_LEGACY_VERSION );
	wp_style_add_data( 'neve-legacy-style', 'rtl', 'replace' );
	wp_style_add_data( 'neve-legacy-style', 'suffix', '.min' );
	wp_enqueue_style( 'neve-legacy-style' );
}
