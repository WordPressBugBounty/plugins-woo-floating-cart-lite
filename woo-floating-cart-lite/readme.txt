=== XT Floating Cart for WooCommerce ===

Plugin Name: XT Floating Cart for WooCommerce
Contributors: XplodedThemes
Author: XplodedThemes
Author URI: https://www.xplodedthemes.com
Tags: floating cart, woocommerce side cart, ajax add to cart, mini cart, upsell
Requires at least: 4.6
Tested up to: 6.7
Stable tag: 2.8.7
Requires PHP: 5.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A modern Floating Cart / Side Cart for WooCommerce that will improve customer buying experience and increase conversions.

== Description ==

A modern Floating Cart / Side Cart for WooCommerce that will improve customer buying experience and increase conversions.

**What Would More Sales and Higher Conversions be Worth to You?**

Have you ever found yourself in a situation where site visitors add products to their cart, but then leave your store without finalizing their purchase?

I present to you Floating Cart for WooCommerce, the perfect solution that will improve customer buying experience and encourage them to click the “checkout” button.

<a target="_blank" href="https://demos.xplodedthemes.com/woo-floating-cart/">👉 **Official Demo**</a>

Your site will look more attractive, a cart icon with item count will always be visible on all pages, and a sliding cart will be visible when the customer clicks it.

**Video Overview**

[youtube https://www.youtube.com/watch?v=kDYMfqPkuCU]

**Video Demo**

[youtube https://www.youtube.com/watch?v=_1cRp4E7iEQ]

**Demo**

<a target="_blank" href="https://demos.xplodedthemes.com/woo-floating-cart/">https://demos.xplodedthemes.com/woo-floating-cart/</a>

**Free Version**

- Unobstructive Floating Cart
- Fast add to cart
- Update quantities
- Remove product from cart
- Undo product removal
- Show max quantity reached msg
- Change Cart / Counter Position
- Responsive / Mobile Support

**Premium Features**

Fully customizable right from WordPress Customizer with Live Preview.

- All Free Features
- Live Preview Customizer
- Enable Fly To Cart animation
- Enable Coupons
- Enable Cart Totals
- Enable Total Savings
- Enable Express Checkout Form
- Enable Cart Menu Item
- Enable Auto Height
- Enable Suggested Products (Related / Cross-Sell / Upsell)
- Enable Free Shipping Bar
- Select Between Morph  Slide Animation
- Support variations, bundles & composites
- Clear / Restore entire cart in 1 click.
- Display product attributes within the cart
- Change Cart Width / Height
- Apply Google Fonts
- Custom Colors / Backgrounds
- Custom Icons (SVG / Image / Font Icons)
- Select from 11 loading spinner animations
- Exclude pages from displaying the cart
- Device Visibility options
- Ajax add to cart on Single Product pages
- Ajax add to cart within Quick View Modals
- Select between Checkout Or View Cart button
- Option to trigger the cart on Mouse Over
- Display Subtotal or Total
- RTL Support
- Automated Updates & Security Patches
- Priority Email & Help Center Support

**Compatible With <a target="_blank" href="https://xplodedthemes.com/products/woo-quick-view/">XT Quick View</a>**
**Compatible With <a target="_blank" href="https://xplodedthemes.com/products/woo-variation-swatches/">XT Variation Swatches</a>**
**Compatible With <a target="_blank" href="https://xplodedthemes.com/products/woo-variations-as-singles/">Woo Variations As Singles</a>**

**Translations**

- English - default

*Note:* All our plugins are localized / translatable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful.

== Installation ==

Installing "Floating Cart for WooCommerce" can be done by following these steps:

1. Download the plugin from the customer area at "XplodedThemes.com" 
2. Upload the plugin ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
3. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

#### V.2.8.7 - 08.09.2025
- **fix**: Replaced pointerdown event for the checkout button with click event instead to avoid checkout page redirection when the embedded checkout form is enabled
- **update**: XT Framework update

#### V.2.8.6 - 01.04.2025
- **fix**: Replaced old Jquery Touch vclick event with modern pointerdown
- **fix**: Fixes conflicts with the Divi theme

#### V.2.8.5 - 10.03.2025
- **fix**: Minor CSS fixed within the customizer panels
- **update**: XT Framework update

#### V.2.8.4 - 04.11.2024
- **security**: Removed SVG upload support for security reasons. To enable SVG uploads, please use a plugin like "Safe SVG" https://wordpress.org/plugins/safe-svg/
- **update**: XT Framework update

#### V.2.8.3 - 04.11.2024
- **update**: Freemius SDK update v2.9.0
- **support**: Fixed deprecated code causing "Creation of dynamic property" log errors in PHP 8.2
- **update**: XT Framework update

#### V.2.8.2 - 03.11.2024
- **fix**: Fixed issue with Cart redirect button

#### V.2.8.1 - 14.09.2024
- **update**: Freemius SDK update v2.8.0

#### V.2.8.0 - 29.07.2024
- **update**: Freemius SDK update v2.7.3
- **support**: WordPress 6.6
- **support**: WooCommerce 9.1

#### V.2.7.9 - 16.04.2024
- **update**: Freemius SDK update v2.7.0
- **fix**: Fix issue with the fly to cart animation image being the wrong one on some themes.
- **fix**: Minor CSS fixes

#### V.2.7.7 - 28.02.2024
- **fix**: Minor CSS fixes

#### V.2.7.6 - 01.02.2024
- **update**: Freemius SDK update v2.6.2
- **support**: WordPress 6.4
- **fix**: Minor fixes

#### V.2.7.5 - 25.08.2023
- **update**: Added WooCommerce HPOS Support

#### V.2.7.4 - 24.07.2023
- **update**: Freemius SDK update v2.5.10

#### V.2.7.3 - 18.04.2023
- **support**: Fixed issue with the "force visible on empty" option not being applied on free versions.
- **update**: XT Framework update

#### V.2.7.2 - 08.03.2023
- **support**: Removed xt-observers-polyfill script, since the plugin does not support old browsers anymore.
- **update**: XT Framework update

#### V.2.7.1 - 14.02.2023
- **fix**: Re-wrote the calculation code for the "Free Shipping Bar" and removed the "Amount Left Display" option from the customizer. The "inc tax" or "ex tax" suffix will now depend only on the native WooCommerce option https://d.pr/i/sOwXUN
- **update**: XT Framework update

#### V.2.7.0 - 08.12.2022
- **fix**: Minor fixes
- **update**: XT Framework update

#### V.2.6.9 - 17.10.2022
- **fix**: Fixed shipping bar amount left calculation in cases where prices are shown including taxes and a coupon is set.
- **new**: Added **Amount Left Display** option for the shipping bar. By default, the amount left will be displayed Including or Excluding taxes based on the native WooCommerce option: **"Display prices during cart and checkout."** You can however choose to override it with this option. **https://d.pr/i/g6PSvB**
- **support**: Make the plugin work with **Disable Cart Fragments** plugin **https://github.com/littlebizzy/disable-cart-fragments**
- **enhance**: Better look on small screens, 350px width and less
- **fix**: Show quantity on bundled items without allowing update.
- **fix**: Minor fixes
- **update**: XT Framework update

#### V.2.6.8 - 03.08.2022
- **new**: Added a return to shop button when the cart is empty.
- **update**: Replaced the following text: "No products in the cart." with "Your cart is empty!" **Note: if this text was translated, you will have to translate it again.**
- **update**: Updated language file
- **support**: Better support for **YITH WooCommerce Product Bundles** Plugin
- **fix**: Minor css fixes

#### V.2.6.7 - 01.08.2022
- **fix**: Fixed Deprecated Message: implode(): Passing glue string after array is deprecated.
- **update**: XT Framework update
- **update**: Freemius SDK update

#### V.2.6.6 - 15.06.2022
- **fix**: Shipping calculator will now be visible only if the native woocommerce option "Enable the shipping calculator on the cart page" is enabled. **https://d.pr/i/UhmUeZ**
- **fix**: Fixed issue with grouped products forcing users to select all products. Allow adding 1 or more products to the cart instead.
- **fix**: When using the "Upsell Order Bump Offer for WooCommerce" plugin, skip Floating Cart single ajax add to cart action and let the plugin do its job instead.
- **fix**: Minor css fixes
- **update**: XT Framework update

#### V.2.6.5 - 19.05.2022
- **fix**: When Checkout Form is enabled and Terms and conditions page is set within Customizer -> WooCommerce -> Checkout, the terms text and required checkbox are not visible, making it impossible to complete the checkout. Now fixed: **https://d.pr/i/3Tkwdo**
- **update**: XT Framework update

#### V.2.6.4 - 12.04.2022
- **fix**: Cart Menu Item: fix alignment option not being applied on mobile / tablet screens
- **fix**: [Bug] Safari Scrolling Issue - The cart stops scrolling after making any cart updates
- **update**: XT Framework update

#### V.2.6.3 - 03.03.2022
- **new**: **Pro** Shipping methods within Cart Totals / Checkout: Added an option to select between Radio buttons or Dropdowns **https://d.pr/i/BsOiBg**
- **new**: **Pro** Added option to hide 3rd party WooCommerce Notices that appear within the Floating Cart (Info & Success notices only) **https://d.pr/i/QiAqIh**
- **fix**: Minor css fixes
- **support**: Support for WooCommerce Minima and Maxima plugin.
- **fix**: Freemius Security Fix
- **update**: XT Framework update

#### V.2.6.2 - 05.02.2022
- **support**: Wrapped the **woocommerce_check_cart_items** action output with the **force_balance_tags()** wp function to make sure the returned html is always valid to avoid 3rd party hooks from messing up the cart display.

#### V.2.6.1 - 02.02.2022
- **fix**: Fixed missing dependency error with free version.

#### V.2.6.0 - 01.02.2022
- **new**: Customizer: Visibility options now included within the free version
- **new**: Customizer: **Body colors** are now **Global colors** and they are now included within the free version. This allows easier global color customizations. You can override some of these colors from other sections.
- **new**: Added 2 new JS api functions: **xt_woofc_scroll_to_top()** and **xt_woofc_scroll_to_bottom()**
- **new**: **Pro** Shipping methods within Cart Totals / Checkout form will be displayed in a dropdown instead of multiple radio buttons. **https://d.pr/i/LLK3AW**
- **new**: **Pro** Major Checkout Form Update. Changed the way the checkout is loaded and will handle checkout validation in a better way. For better compatibility with most themes and third party plugins, the checkout form is now embedded in an iframe. It won't be loaded below the cart list anymore, it will be displayed on its own, once the checkout button is clicked as a 2-step process.
- **new**: **Pro** New checkout thank you template. /parts/checkout/thank-you.php. This template will be displayed after placing an order using the embedded checkout form. https://d.pr/i/3FEQDN
- **new**: Apply **woocommerce_check_cart_items** native action to display woocommerce validation errors if any
- **new**: Added option to override WooCommerce notices colors within the Floating Cart. **https://d.pr/i/6ftu5J**
- **enhance**: **Pro** Enhanced the display of the shipping address within Cart Totals. Added Location & Edit icons. **https://d.pr/i/LLK3AW**
- **fix**: When the cart is empty and the trigger is hidden, adding an item to the cart for the first time, the fly to cart animation brings the image way below, before the trigger is even visible. Fixed by showing the trigger before starting the animation.
- **fix**: Multiple CSS fixes, enhancements
- **update**: **Pro** Updated template: /parts/cart/coupon-list.php
- **update**: **Pro** Updated template: /parts/cart/shipping.php
- **update**: **Pro** Removed deprecated template: /parts/checkout/checkout.php
- **update**: **Pro** Removed deprecated template: /parts/checkout/checkout-fields.php
- **update**: Major Code Update / Restructuring
- **update**: XT Framework update
- **support**: Better support for FlatSome theme
- **support**: Support WP v5.9

#### V.2.5.7 - 27.11.2021
- **fix**: Fixed conflict with PPOM plugin (woocommerce product addons)
- **update**: XT Framework update

#### V.2.5.6 - 27.11.2021
- **update**: XT Framework update

#### V.2.5.5 - 17.11.2021
- **new**: **Pro** Added a new filter hook **xt_woofc_custom_fields** to easily add product custom fields within the cart. Simply append meta fields to the array as meta_key / meta_label: https://d.pr/i/rFDqTr / https://d.pr/i/WA7off
- **update**: XT Framework update

#### V.2.5.4 - 16.11.2021
- **fix**: Fix error in backend
- **update**: XT Framework update

#### V.2.5.3 - 10.11.2021
- **update**: Modify plugin name to avoid trademark violation with WooCommerce
- **new**: **Pro** Added a new filter hook **xt_woofc_custom_attributes** to easily add custom product attributes within the cart. Simply append attribute slugs to the array: https://d.pr/i/yegGjD

#### V.2.5.1 - 09.11.2021
- **new**: **Pro** Added a new option to clear the entire cart in 1 click after customer confirmation. An undo link will also be displayed to be able to restore the entire cart once again. Simply enable the Clear All Icon within the header settings. Screencast: **https://d.pr/i/p43ybf**
- **new**: **Pro** The free shipping bar will now take into consideration taxes in case the woocommerce setting: "display prices during cart and checkout" is set to "Including Taxes".
- **fix**: Fixed issue with the "Keep visible on empty" not being applied properly since v2.5.0
- **fix**: Fixed javascript conflict with the "Disable cart page for WooCommerce" plugin
- **fix**: Minor css fixes
- **support**: Paypal Checkout Button will now support and require the download of **https://wordpress.org/plugins/woocommerce-paypal-payments/** instead of the old Paypal Checkout plugin: **https://wordpress.org/plugins/woocommerce-gateway-paypal-express-checkout/** which will stop being supported starting March 1st 2022. The new plugin should inherit the old plugin settings.
- **update**: Updated language file
- **update**: XT Framework update

#### V.2.5.0 - 28.10.2021
- **fix**: When deleting all products from the cart, the close button disappears even if the cart is still open.
- **fix**: Minor css fixes

#### V.2.4.9 - 16.09.2021
- **new**: **Pro** Added new option to hide Add To Cart buttons within Suggested Products
- **fix**: **Pro** Fixed layout issue with the Shipping Table within the native checkout page when "Cart Totals" is enabled.
- **fix**: Minor other fixes
- **fix**: Updated Xirki Customizer Library

#### V.2.4.8 - 15.09.2021
- **fix**: Disable within new Widget Block Editor to avoid conflicts
- **fix**: Fixed intermittent error: Undefined variable: is_bundle_item when updating item quantity
- **fix**: Fixed conflict within the new Block-based Widgets Editor in WordPress 5.8
- **support**: Support native "woocommerce_update_cart_validation" hook to validate item quantity change

#### V.2.4.6 - 30.08.2021
- **fix**: Fixed conflict with Stripe For WooCommerce plugin when Express Checkout Form is enabled.
- **fix**: Disable quantity input for bundled items.

#### V.2.4.4 - 10.08.2021
- **fix**: Fixed issue with single product ajax add to cart event not being tracked by some analytics plugins
- **support**: Support event tracking by analytics plugins. (add to cart / remove product from within the floating cart)
- **support**: Support PHP v8.x. Removed deprecated warnings.
- **update**: XT Framework update

#### V.2.4.2 - 29.07.2021
- **fix**: Fix issue with the "Have a coupon ?" toggle taking time to appear after adding an item to the cart
- **fix**: Fix outdated "shipping.php" template warning in woocommerce status report
- **fix**: Minor CSS Fixes

#### V.2.4.1 - 28.06.2021
- **support**: CodeCanyon version has been retired, and will no longer be maintained or updated. License migration required. More Info: **https://xplodedthemes.com/codecanyon-license-migration/**

#### V.2.4.0 - 16.06.2021
- **support**: Shipping Bar: Added support for **Flexible Shipping** plugin: https://fr.wordpress.org/plugins/flexible-shipping/
- **fix**: Shipping Calculator not populating states when country changes
- **fix**: Minor CSS Fixes
- **update**: Updated language file

#### V.2.3.9 - 15.06.2021
- **fix**: Cart Menu Item: Always Visible option was not applied correctly.
- **new**: Cart Menu Item / Shortcode Trigger: Added option: If cart is empty, Show icon only without counter or price.

#### V.2.3.8 - 14.06.2021
- **new**: Added new Shipping Bar feature. Display a message and a progress bar, letting customers know how much more they need to spend before getting free shipping.
- **new**: Cart Menu Item / Cart Trigger Shortcode: Customize options based on device screen.
- **new**: Cart Menu Item: Apply to different menus based on device screen.
- **fix**: Fixed issue with suggested products titles not being truncated properly
- **update**: Updated language file

#### V.2.3.7 - 09.06.2021
- **fix**: Fix issue with total savings not refreshing on quantity change, only when Cart Totals are disabled.
- **fix**: Minor CSS fixes applied to Cart Menu Item / Cart Trigger Shortcode
- **support**: Allow html to be displayed in product attributes to support third party plugins.

#### V.2.3.6 - 01.06.2021
- **update**: XT Framework update

#### V.2.3.5 - 01.06.2021
- **fix**: Minor Checkout / Login Form CSS fixes

#### V.2.3.4 - 20.05.2021
- **fix**: Fix error: Cannot use object of type stdClass as array. Happens with some themes.
- **update**: XT Framework update

#### V.2.3.3 - 07.05.2021
- **fix**: Fixed issue with Related Products not visible if the cart has only variable products.
- **fix**: Minor CSS Fixes

#### V.2.3.2 - 05.04.2021
- **support**: Better support / price display for subscription products.
- **fix**: Fix cart visibility issue caused by the z-index css property not being calculated properly when using the SG Optimizer plugin to minify CSS.

#### V.2.3.1 - 01.04.2021
- **new**: Trigger / Cart offset option is now available in free version
- **enhance**: Customizer - Reorganised Sections
- **fix**: Minor CSS Fixes

#### V.2.3.0 - 31.03.2021
- **fix**: Fix intermittent issue with paypal express button not showing the first time after adding to cart
- **support**: Multisite - Network Level License Management
- **update**: XT Framework update

#### V.2.2.4 - 23.03.2021
- **fix**: XT Framework update / fixes

#### V.2.2.3 - 22.03.2021
- **fix**: Fixed issue with customizer option values not being pulled correctly
- **update**: XT Framework update

#### V.2.2.2 - 03.03.2021
- **new**: Added option to change cart totals font size
- **new**: Allow displaying total savings (when enabled) even when cart totals are disabled.
- **update**: XT Framework update

#### V.2.2.0 - 02.03.2021
- **new**: Added option to change product thumbnail radius, border color and padding.
- **new**: Added option to change suggested product title color
- **fix**: Minor CSS Fixes
- **update**: XT Framework update

#### V.2.1.8 - 12.02.2021
- **new**: Added Modal Mode within the General Settings. When enabled, the cart will open as a modal in the middle of the screen.
- **fix**: Minor CSS Fixes

#### V.2.1.7 - 10.02.2021
- **new**: Updated the GSAP library
- **fix**: Fixed conflicts between the GSAP version loaded by the plugin and other versions.

#### V.2.1.6 - 28.01.2021
- **new**: Added new **Display Type** option for suggested products. Select between Slider or Rows.
- **update**: Removed "minicart.php" template file.
- **fix**: Fixed total saving calculation to include all discounts
- **fix**: Minor Customizer Fixes
- **fix**: Minor CSS Fixes

#### V.2.1.5 - 26.01.2021
- **fix**: Remove variation attributes from product title only within the floating cart, keep the default behaviour outside the cart.

#### V.2.1.3 - 23.01.2021
- **fix**: Fixed issue with Woo Add To Cart, ajax add to cart option not disabling correctly.

#### V.2.1.2 - 21.01.2021
- **new**: **Pro** Added new paypal express checkout integration. The button will nicely be displayed below the existing checkout button. See: https://d.pr/i/q5pnPb / Requires: https://wordpress.org/plugins/woocommerce-gateway-paypal-express-checkout/
- **new**: Added JS API function: xt_woofc_is_cart_empty()
- **fix**: Minor CSS Fixes
- **fix**: Prevent buy now buttons from adding to cart.
- **fix**: Prevent scrolling to top when clicking on radio buttons within the customizer.

#### V.2.1.1 - 20.01.2021
- **new**: **Pro** Added new option to display available coupon list that can be applied easily.
- **new**: **Pro** Added new option to hide main trigger if you only wish to trigger the cart using the API, shortcode, menu cart item or from custom selectors set above.
- **support**: Added better fallback support older browsers
- **enhance**: Remove variation info from product title (since recent woocommerce version). Only show attributes below the title if the option is enabled.
- **enhance**: Animate counter when count changes
- **enhance**: Minor cart totals / shipping css enhancement
- **enhance**: Throttle quantity update when clicking on the plus / minus buttons. This way, increasing quantity can be done faster while minimizing the number of update requests.
- **fix**: Javascript API Minor fixes
- **update**: Updated .pot language file

#### V.2.1.0 - 18.01.2021
- **support**: Support more third party quick views / modals that contains add to cart buttons
- **fix**: Minor CSS Fixes

#### V.2.0.9 - 14.01.2021
- **new**: Added option within **Woo Add To Cart** module to force fragment refresh after single add to cart. Enable this only if you notice that after adding a product to the cart, the totals are not correct due to conflicts with your theme or other plugins.

#### V.2.0.8 - 06.01.2021
- **fix**: Remove cart quantity form html filter hook to prevent 3rd party themes / plugins from modifying the look and feel of it and avoid conflicts

#### V.2.0.7 - 25.12.2020
- **fix**: Minor fix when debug mode is enabled, Undefined Variable: $output in quantity template file.

#### V.2.0.6 - 16.12.2020
- **fix**: Fixed issue with Germanized for WooCommerce Plugin not showing info for the first cart item.
- **fix**: Fix quantity input display with bundle / composite items.
- **fix**: Fix issue with single add to cart not adding anything only in customizer preview
- **new**: Added new hooks **xt_woofc_after_product_attributes** and **xt_woofc_after_product_attributes** that can be used to inject info before or after product attributes
- **support**: Added support for composite product in cart edit link.

#### V.2.0.5 - 14.12.2020
- **fix**: Minor CSS Fixes
- **enhance**: Always keep cart totals at the bottom.
- **enhance**: **Pro** Much better and smoother auto height
- **enhance**: Smoother delete / remove animation
- **update**: Updated list template **public/templates/parts/list.php**
- **update**: Updated product template **public/templates/parts/cart/list/product.php**
- **update**: Updated product title template **public/templates/parts/cart/list/product/title.php**
- **support**: Added support for **Germanized for WooCommerce** Plugin

#### V.2.0.4 - 11.12.2020
- **fix**: **Pro** Apply product title truncate option to the suggested product titles as well.
- **fix**: **Pro** Fixed error when adding the shortcode within an Elementor page.
- **support**: Support **WooCommerce Min Max Quantities** plugin
- **support**: Added support for Loco Translate by adding a loco.xml bundle config file.
- **update**: Updated translation file

#### V.2.0.3 - 09.12.2020
- **fix**: CSS fixes
- **fix**: Remove duplicated CSS variables in frontend.css
- **enhance**: Keep displaying error notices, hide other notices after couple of seconds
- **support**: Support WooCommerce v4.8
- **support**: Support WP 5.6

#### V.2.0.2 - 08.12.2020
- **support**: Added support for the latest jQuery modern version 3.5.1

#### V.2.0.1 - 07.12.2020
- **fix**: **Pro** Fixed missing css vars for the trigger shortcode
- **fix**: Fixed missing css vars for the default trigger image icon
- **fix**: Fixed issue with single add to cart form validation

#### V.2.0.0 - 05.12.2020
- **new**: **Pro** Added option to display squared or full height product images.
- **new**: **Pro** Added option to adjust product image width
- **new**: **Pro** Added option to truncate / un-truncate product title on overflow.
- **new**: **Pro** Added option to set extra trigger custom css selectors. You can now insert your existing theme cart icon selector or any other elements and they will act as a trigger.
- **new**: **Pro** Added manual product selection option for the suggested products.
- **new**: **Pro** A trash icon can now be selected instead of the remove text link
- **fix**: Fixed issue with quantity minus / plus buttons not working within the customizer.
- **fix**: Fixed issue with quantity validation before adding to cart.
- **fix**: Remove quantity input for bundled product items.
- **enhance**: Major customizer CSS changes. All customizer options are now native CSS Variables. Much leaner styles without css duplications.
- **enhance**: Restructure Customizer Product Item Options
- **enhance**: Added narrow display mode. The cart will automatically be in narrow mode if the cart width is below 300px;
- **support**: Dropped support for IE 11 since it does not support CSS variables and never will. https://xplodedthemes.com/we-abandoned-internet-explorer-11-and-so-should-you/
- **Update**: Updated translation file
- **update**: XT Framework update

#### V.1.0.0 - 01.11.2016
- **Initial**: Initial Version