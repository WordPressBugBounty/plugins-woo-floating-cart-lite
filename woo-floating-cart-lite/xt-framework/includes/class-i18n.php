<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XTFW_i18n' ) ) {

	/**
	 * Define the internationalization functionality.
	 *
	 * Loads and defines the internationalization files for this plugin
	 * so that it is ready for translation.
	 *
	 * @since      1.0.0
	 * @package    XTFW_Framework
	 * @subpackage XTFW_Framework/includes
	 * @author     XplodedThemes
	 */
	class XTFW_i18n {

		private $textdomain;
		private $file;

		public function __construct( $textdomain, $file ) {

			$this->textdomain = $textdomain;
			$this->file       = $file;

			if ( did_action( 'plugins_loaded' ) ) {
				$this->load_plugin_textdomain();
			} else {
				add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
			}
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since    1.0.0
		 */
		public function load_plugin_textdomain() {

			// phpcs:disable PluginCheck.CodeAnalysis.DiscouragedFunctions.load_plugin_textdomainFound -- Loads translations bundled with the plugin for copies installed outside WordPress.org.
			load_plugin_textdomain(
				$this->textdomain,
				false,
				basename( dirname( $this->file ) ) . '/languages/'
			);
			// phpcs:enable PluginCheck.CodeAnalysis.DiscouragedFunctions.load_plugin_textdomainFound
		}
	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_i18n', false ) ) {
		class_alias( 'XTFW_i18n', 'XT_Framework_i18n' );
	}
	// xtfw-legacy-alias:end
}