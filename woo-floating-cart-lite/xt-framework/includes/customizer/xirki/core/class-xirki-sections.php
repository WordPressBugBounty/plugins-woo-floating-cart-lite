<?php
/**
 * Additional tweaks for sections.
 *
 * @package     Xirki
 * @category    Core
 * @author      XplodedThemes (@XplodedThemes)
 * @copyright   Copyright (c) 2019, XplodedThemes (@XplodedThemes)
 * @license     https://opensource.org/licenses/MIT
 * @since       3.0.17
 */

defined( 'ABSPATH' ) || exit;

/**
 * Additional tweaks for sections.
 */
class Xirki_Sections {

	/**
	 * The object constructor.
	 *
	 * @access public
	 * @since 3.0.17
	 */
	public function __construct() {
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'outer_sections_css' ) );
	}

	/**
	 * Generate CSS for the outer sections.
	 * These are by default hidden, we need to expose them.
	 *
	 * @since 3.0.17
	 * @return void
	 */
	public function outer_sections_css() {
		$css = '';
		if ( ! empty( Xirki::$sections ) ) {
			foreach ( Xirki::$sections as $section_args ) {
				if ( isset( $section_args['id'], $section_args['type'] ) && ( 'outer' === $section_args['type'] || 'xirki-outer' === $section_args['type'] ) ) {
					$css .= '#customize-theme-controls li#accordion-section-' . sanitize_html_class( $section_args['id'] ) . '{display:list-item!important;}';
				}
			}
		}

		if ( ! empty( $css ) ) {
			wp_register_style( 'xirki-outer-sections', false, array(), XIRKI_VERSION );
			wp_enqueue_style( 'xirki-outer-sections' );
			wp_add_inline_style( 'xirki-outer-sections', $css );
		}
	}
}
