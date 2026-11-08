/**
 * XT Cart Bridge
 *
 * WooCommerce block buttons (Product Button, Add to Cart with Options, the Mini Cart) add and
 * remove items through the Store API and only dispatch the native "wc-blocks_added_to_cart" /
 * "wc-blocks_removed_from_cart" events. The classic jQuery events that XT plugins (and many
 * themes) listen to ("added_to_cart", "wc_fragments_refreshed") never fire, so a floating cart
 * stays out of date until the page reloads.
 *
 * This bridge listens for those native events (and the Interactivity API's
 * "wc-blocks_store_sync_required"), fetches fresh cart fragments, applies them and
 * replays the classic jQuery events, so everything built on them keeps working on block stores.
 *
 * WooCommerce itself translates jQuery "added_to_cart" into a native event with an empty detail;
 * blocks dispatch theirs with detail.preserveCartData = true. Only the latter is bridged, and a
 * re-entry guard covers anything else, so the two translations can never loop.
 */
(function () {

	'use strict';

	var vars = window.XT_ATC || {};
	var replaying = false;
	var lastButton = null;
	var lastButtonTime = 0;

	if (!vars.ajaxUrl || !window.fetch) {
		return;
	}

	function isBlockEvent(evt) {

		return !replaying && !!(evt && evt.detail && evt.detail.preserveCartData === true);
	}

	// Remember the block button the shopper pressed, so classic listeners get their "trigger".
	document.addEventListener('click', function (evt) {

		var button = evt.target && evt.target.closest ? evt.target.closest('.wp-block-button__link, .wc-block-components-product-button__button, .add_to_cart_button, .single_add_to_cart_button') : null;

		if (button) {
			lastButton = button;
			lastButtonTime = Date.now();
		}
	}, true);

	function isBlockButton(button) {

		return !!button.closest('.wp-block-woocommerce-product-button, .wc-block-components-product-button, .wp-block-woocommerce-add-to-cart-with-options');
	}

	function recentButton() {

		return lastButton && (Date.now() - lastButtonTime) < 10000 ? lastButton : null;
	}

	function fetchFragments() {

		return fetch(vars.ajaxUrl.replace('%%endpoint%%', 'get_refreshed_fragments'), {
			method: 'POST',
			credentials: 'same-origin',
			headers: {'X-Requested-With': 'XMLHttpRequest'}
		}).then(function (response) {

			return response.ok ? response.json() : null;
		});
	}

	function applyFragments(fragments) {

		Object.keys(fragments || {}).forEach(function (selector) {

			var html = fragments[selector];

			try {
				document.querySelectorAll(selector).forEach(function (el) {

					var tpl = document.createElement('template');
					tpl.innerHTML = String(html).trim();

					if (tpl.content.firstElementChild) {
						el.replaceWith(tpl.content.firstElementChild);
					}
				});
			} catch (e) {
				// Invalid selector from a third-party fragment: skip it.
			}
		});
	}

	function replay(type, data) {

		var fragments = data && data.fragments ? data.fragments : {};
		var cartHash = data && data.cart_hash ? data.cart_hash : '';
		var $ = window.jQuery;

		replaying = true;

		try {
			applyFragments(fragments);

			if ($) {
				if (type === 'added') {
					var button = recentButton();
					$(document.body).trigger('added_to_cart', [fragments, cartHash, button ? $(button) : undefined]);

					// WooCommerce's classic handler appends a "View cart" link after the button it is
					// given; block buttons show their own added state, so drop it there.
					if (button && isBlockButton(button) && button.parentNode) {
						button.parentNode.querySelectorAll(':scope > .added_to_cart.wc-forward').forEach(function (link) {
							link.remove();
						});
					}
				}

				$(document.body).trigger('wc_fragments_refreshed');
			}

			document.body.dispatchEvent(new CustomEvent('xt_cart_bridge_synced', {detail: {type: type, fragments: fragments, cartHash: cartHash}}));

		} finally {
			replaying = false;
		}
	}

	var pending = null;
	var timer = null;

	// One shopper action can dispatch several events (a block add fires both
	// "wc-blocks_added_to_cart" and "wc-blocks_store_sync_required"), so coalesce them.
	function schedule(type) {

		pending = (pending === 'added' || type === 'added') ? 'added' : type;

		clearTimeout(timer);
		timer = setTimeout(function () {

			var syncType = pending;
			pending = null;

			fetchFragments().then(function (data) {

				if (data) {
					replay(syncType, data);
				}
			}).catch(function () {});

		}, 150);
	}

	function bridge(type) {

		return function (evt) {

			if (isBlockEvent(evt)) {
				schedule(type);
			}
		};
	}

	document.body.addEventListener('wc-blocks_added_to_cart', bridge('added'));
	document.body.addEventListener('wc-blocks_removed_from_cart', bridge('removed'));

	// The Interactivity API mini cart and product buttons (WooCommerce 9.x+) report quantity
	// changes and removals with this event only.
	window.addEventListener('wc-blocks_store_sync_required', function (evt) {

		if (!replaying && evt && evt.detail && evt.detail.type === 'from_iAPI') {
			schedule('synced');
		}
	});

})();
