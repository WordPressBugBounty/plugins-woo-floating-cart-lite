<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'XTFW_GTM_ID' ) ) {
	define( 'XTFW_GTM_ID', 'GTM-MRT34RM' );
}

if ( ! class_exists( 'XTFW_Checkout_Tracking' ) ) {

	/**
	 * Purchase tracking for the Freemius checkout.
	 *
	 * Loads Google Tag Manager on the Freemius checkout screen and pushes the completed purchase
	 * to its data layer. WordPress.org packages leave this file out, so nothing here runs there.
	 *
	 * @package    XTFW_Framework
	 * @subpackage XTFW_Framework/includes
	 * @author     XplodedThemes
	 * @since      2.5.19
	 */
	class XTFW_Checkout_Tracking {

		/**
		 * Core class.
		 *
		 * @var XTFW_Framework
		 */
		protected $core;

		/**
		 * Freemius instance.
		 *
		 * @var Freemius
		 */
		protected $access_manager;

		/**
		 * @param XTFW_Framework $core           Core class.
		 * @param Freemius       $access_manager Freemius instance.
		 */
		public function __construct( $core, $access_manager ) {

			$this->core           = $core;
			$this->access_manager = $access_manager;

			$this->access_manager->add_filter( 'checkout/purchaseCompleted', array( $this, 'after_purchase_js' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_checkout_gtm_script' ) );
		}

		public function after_purchase_js() {

			$plugin_name = wp_json_encode( $this->core->plugin_name() );
			$product_id  = absint( $this->core->market_product()->id );

			return 'function ( data ) {

                 /**
                 * Since the user just entered their personal & billing information, agreed to the TOS & privacy,
                 * know they are running within a secure iframe from an external domain, they implicitly permit tracking
                 * this purchase. So initializing GTM here (after the purchase), is legitimate.
                 */

                var is_subscription = typeof(data.purchase.initial_amount) !== "undefined";
                var is_trial = typeof(data.purchase.trial_ends) !== "undefined" && data.purchase.trial_ends !== null;
                var total = is_subscription ? data.purchase.initial_amount : data.purchase.gross;
                total = is_trial ? 0 : total;

                var coupon = data && data.coupon ? data.coupon.code : "";
                var currency = data && data.currency ? data.currency.toUpperCase() : "USD";

                var item = {
                    item_name: ' . $plugin_name . ',
                    item_id: ' . $product_id . ',
                    item_brand: "XplodedThemes",
                    affiliation: "XplodedThemes",
                    price: data.total,
                    discount: 0,
                    currency: currency,
                    coupon: coupon,
                    index: 1,
                    quantity: 1
                };

                // Purchase Event
                dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
                dataLayer.push({
                    event: "purchase",
                    ecommerce: {
                        transaction_id: data.purchase.id,
                        affiliation: item.affiliation,
                        tax: 0,
                        shipping: 0,
                        items: [item],
                        currency: item.currency,
                        coupon: item.coupon,
                        value: total
                    }
                });
        }';
		}

		/**
		 * Enqueue Google Tag Manager only inside the user-initiated Freemius checkout.
		 *
		 * @return void
		 */
		public function enqueue_checkout_gtm_script() {

			if ( ! $this->access_manager->is_admin_page( 'pricing' ) ) {
				return;
			}

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only checkout routing.
			$checkout = isset( $_GET['checkout'] ) && is_scalar( $_GET['checkout'] ) ? sanitize_text_field( wp_unslash( $_GET['checkout'] ) ) : '';

			if ( 'true' !== $checkout ) {
				return;
			}

			$handle = 'xtfw-google-tag-manager';
			$src    = add_query_arg( 'id', rawurlencode( XTFW_GTM_ID ), 'https://www.googletagmanager.com/gtm.js' );

			// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion -- External Google Tag Manager script; a version query argument doesn't apply.
			wp_register_script( $handle, $src, array(), null, false );
			// phpcs:enable WordPress.WP.EnqueuedResourceParameters.MissingVersion
			wp_script_add_data( $handle, 'strategy', 'async' );
			wp_add_inline_script(
				$handle,
				"window.dataLayer = window.dataLayer || []; window.dataLayer.push({'gtm.start': new Date().getTime(), event: 'gtm.js'});",
				'before'
			);
			wp_enqueue_script( $handle );
		}
	}
}
