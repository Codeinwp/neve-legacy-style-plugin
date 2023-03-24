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
			wp_deregister_style( 'neve-woocommerce' );
			wp_register_style( 'neve-woocommerce', NEVE_LEGACY_URL . '/assets/css/woocommerce-legacy.min.css', array(), NEVE_LEGACY_VERSION );
			wp_style_add_data( 'neve-woocommerce', 'rtl', 'replace' );
			wp_style_add_data( 'neve-woocommerce', 'suffix', '.min' );
			if ( class_exists('Neve\Compatibility\Elementor', false ) && ! Elementor::is_elementor_checkout() ) {
				wp_enqueue_style( 'neve-woocommerce' );
			}
		}

		// Neve main Legacy Style.
		wp_deregister_style( 'neve-style' );
		wp_register_style( 'neve-style', NEVE_LEGACY_URL . '/assets/css/style-legacy.min.css', array(), NEVE_LEGACY_VERSION );
		wp_style_add_data( 'neve-style', 'rtl', 'replace' );
		wp_style_add_data( 'neve-style', 'suffix', '.min' );
		wp_enqueue_style( 'neve-style' );

		// Mega Menu Legacy Style.
		wp_deregister_style( 'neve-mega-menu' );
		wp_register_style( 'neve-mega-menu', NEVE_LEGACY_URL . '/assets/css/mega-menu-legacy.min.css', array(), NEVE_LEGACY_VERSION );
		wp_style_add_data( 'neve-mega-menu', 'rtl', 'replace' );
		wp_style_add_data( 'neve-mega-menu', 'suffix', '.min' );

		//Lifter Legacy Style.
		if ( class_exists( 'LifterLMS', false ) ) {
			wp_deregister_style( 'neve-lifter' );
			wp_enqueue_style( 'neve-lifter', NEVE_LEGACY_URL . '/assets/css/lifter-legacy.min.css', array(), NEVE_LEGACY_VERSION );
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

		wp_deregister_style( 'neve-gutenberg-style' );
		wp_enqueue_style( 'neve-gutenberg-style', NEVE_LEGACY_URL . '/assets/css/gutenberg-editor-legacy-style.min.css', array(), NEVE_LEGACY_VERSION );
	}
}
