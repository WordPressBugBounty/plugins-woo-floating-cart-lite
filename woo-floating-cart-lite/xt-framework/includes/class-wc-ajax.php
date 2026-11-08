<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XTFW_WC_Ajax' ) ) {

	class XTFW_WC_Ajax {

		/**
		 * Core class reference.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      XTFW_Framework   $core    Core Class
		 */
		protected $core;

        /**
         * Ajax events to be added
         *
         * @since    1.0.0
         * @access   private
         * @var      array    $ajax_add_events
         */
        protected $ajax_add_events = array();

        /**
         * Ajax events to be removed
         *
         * @since    1.0.0
         * @access   private
         * @var      array    $ajax_remove_events
         */
        protected $ajax_remove_events = array();

		/**
		 * Construct.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @var      XTFW_Framework $core Core Class
		 */
		public function __construct( $core ) {

			$this->core = $core;

			if(class_exists('WC_AJAX')) {
                add_action('init', array($this, 'init'), 9999);
            }
		}

        /**
         * Get WC Ajax Endpoint.
         *
         * @param string $request Optional.
         *
         * @return string
         */
        public function get_endpoint( $request = '' ) {

            return WC_AJAX::get_endpoint($request);
        }

		/**
		 * Init custom ajax events
		 */
		public function init() {

			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.DynamicHooknameFound -- Prefixed with the plugin's own prefix.
			$this->ajax_add_events = apply_filters($this->core->plugin_prefix('wc_ajax_add_events'), $this->ajax_add_events, $this);
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.DynamicHooknameFound -- Prefixed with the plugin's own prefix.
			$this->ajax_remove_events = apply_filters($this->core->plugin_prefix('wc_ajax_remove_events'), $this->ajax_remove_events, $this);

			// Add events
			foreach ( $this->ajax_add_events as $event) {

				add_action( 'wp_ajax_woocommerce_' . $event['function'], $event['callback'] );

				if ( !empty($event['nopriv']) ) {
					add_action( 'wp_ajax_nopriv_woocommerce_' . $event['function'], $event['callback'] );
					// WC AJAX can be used for frontend ajax requests
					add_action( 'wc_ajax_' . $event['function'], $event['callback'] );
				}
			}

			// Remove events
			foreach ( $this->ajax_remove_events as $event) {

				remove_action( 'wp_ajax_woocommerce_' . $event['function'], $event['callback'] );

				if ( !empty($event['nopriv']) ) {
					remove_action( 'wp_ajax_nopriv_woocommerce_' . $event['function'], $event['callback'] );
					// WC AJAX can be used for frontend ajax requests
					remove_action( 'wc_ajax_' . $event['function'], $event['callback'] );
				}
			}
		}

		/**
		 * Get ajax url
		 *
		 * @var   string $endpoint
		 * @return string $url
		 */
		public function get_ajax_url($endpoint = null) {

			$url = urldecode(add_query_arg( 'wc-ajax', '%%endpoint%%', home_url( '/' ) ));

			if(!empty($endpoint)) {
				$url = str_replace('%%endpoint%%', $endpoint, $url);
			}

			return $url;
		}
	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_WC_Ajax', false ) ) {
		class_alias( 'XTFW_WC_Ajax', 'XT_Framework_WC_Ajax' );
	}
	// xtfw-legacy-alias:end
}