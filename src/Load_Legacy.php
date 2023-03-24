<?php
namespace Neve_Legacy;

use Neve\Compatibility\Elementor;

/**
 * Class Load_Legacy
 */
class Load_Legacy {

	/**
	 * Init function.
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_gutenberg_scripts' ] );
	}

	/**
	 * Enqueue the legacy style.
	 */
	public function enqueue_scripts() {
		// WooCommerce Legacy Style.
		if ( class_exists( 'WooCommerce', false ) ) {
			wp_register_style( 'neve-legacy-woocommerce', NEVE_LEGACY_URL . '/assets/css/woocommerce-legacy.min.css', array(), NEVE_LEGACY_VERSION );
			wp_style_add_data( 'neve-legacy-woocommerce', 'rtl', 'replace' );
			wp_style_add_data( 'neve-legacy-woocommerce', 'suffix', '.min' );
			if ( class_exists('Neve\Compatibility\Elementor', false ) && ! Elementor::is_elementor_checkout() ) {
				wp_enqueue_style( 'neve-legacy-woocommerce' );
			}
		}

		// Neve main Legacy Style.
		wp_register_style( 'neve-legacy-style', NEVE_LEGACY_URL . '/assets/css/style-legacy.min.css', array(), NEVE_LEGACY_VERSION );
		wp_style_add_data( 'neve-legacy-style', 'rtl', 'replace' );
		wp_style_add_data( 'neve-legacy-style', 'suffix', '.min' );
		wp_enqueue_style( 'neve-legacy-style' );

		// Mega Menu Legacy Style.
		wp_register_style( 'neve-legacy-mega-menu', NEVE_LEGACY_URL . '/assets/css/mega-menu-legacy.min.css', array(), NEVE_LEGACY_VERSION );
		wp_style_add_data( 'neve-legacy-mega-menu', 'rtl', 'replace' );
		wp_style_add_data( 'neve-legacy-mega-menu', 'suffix', '.min' );

		//Lifter Legacy Style.
		if ( class_exists( 'LifterLMS', false ) ) {
			wp_enqueue_style( 'neve-legacy-lifter', NEVE_LEGACY_URL . '/assets/css/lifter-legacy.min.css', array(), NEVE_LEGACY_VERSION );
		}
	}

	/**
	 * Enqueue the legacy style for the Gutenberg editor.
	 */
	public function enqueue_gutenberg_scripts() {
		$screen = get_current_screen();
		// if is_block_editor is `true` we should allow the Gutenberg styles to load eg. the new widgets page.
		if ( ! post_type_supports( $screen->post_type, 'editor' ) && $screen->is_block_editor !== true ) {
			return;
		}

		wp_enqueue_style( 'neve-legacy-gutenberg-style', NEVE_LEGACY_URL . '/assets/css/gutenberg-editor-legacy-style.min.css', array(), NEVE_LEGACY_VERSION );
	}
}
