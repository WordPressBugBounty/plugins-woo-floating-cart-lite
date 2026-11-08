<?php
/**
* XT Framework WP Override functions or define them if they don't exist is older WP versions
*
* @author      XplodedThemss
* @category    Core
* @package     XTFW_Framework/Admin/Functions
* @version     1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'xtfw_is_json_request' ) ) {
	/**
	 * Check if the current request is a JSON request.
	 *
	 * Uses wp_is_json_request() (WordPress 5.0+) when available.
	 *
	 * @return bool
	 */
	function xtfw_is_json_request() {

		if ( function_exists( 'wp_is_json_request' ) ) {
			return wp_is_json_request();
		}

		if ( isset( $_SERVER['HTTP_ACCEPT'] ) && false !== strpos( sanitize_text_field( wp_unslash( $_SERVER['HTTP_ACCEPT'] ) ), 'application/json' ) ) {
			return true;
		}

		if ( isset( $_SERVER['CONTENT_TYPE'] ) && 'application/json' === sanitize_text_field( wp_unslash( $_SERVER['CONTENT_TYPE'] ) ) ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'xtfw_get_registered_image_subsizes' ) ) {
	/**
	 * Returns a normalized list of all currently registered image sub-sizes.
	 *
	 * Uses wp_get_registered_image_subsizes() (WordPress 5.3+) when available.
	 *
	 * @return array Associative array of the registered image sub-sizes.
	 */
	function xtfw_get_registered_image_subsizes() {

		if ( function_exists( 'wp_get_registered_image_subsizes' ) ) {
			return wp_get_registered_image_subsizes();
		}

		global $_wp_additional_image_sizes;

		$additional_sizes = is_array( $_wp_additional_image_sizes ) ? $_wp_additional_image_sizes : array();
		$all_sizes        = array();

		foreach ( get_intermediate_image_sizes() as $size_name ) {
			$size_data = array(
				'width'  => 0,
				'height' => 0,
				'crop'   => false,
			);

			if ( isset( $additional_sizes[ $size_name ]['width'] ) ) {
				// For sizes added by plugins and themes.
				$size_data['width'] = intval( $additional_sizes[ $size_name ]['width'] );
			} else {
				// For default sizes set in options.
				$size_data['width'] = intval( get_option( "{$size_name}_size_w" ) );
			}

			if ( isset( $additional_sizes[ $size_name ]['height'] ) ) {
				$size_data['height'] = intval( $additional_sizes[ $size_name ]['height'] );
			} else {
				$size_data['height'] = intval( get_option( "{$size_name}_size_h" ) );
			}

			if ( empty( $size_data['width'] ) && empty( $size_data['height'] ) ) {
				// This size isn't set.
				continue;
			}

			if ( isset( $additional_sizes[ $size_name ]['crop'] ) ) {
				$size_data['crop'] = $additional_sizes[ $size_name ]['crop'];
			} else {
				$size_data['crop'] = get_option( "{$size_name}_crop" );
			}

			if ( ! is_array( $size_data['crop'] ) || empty( $size_data['crop'] ) ) {
				$size_data['crop'] = (bool) $size_data['crop'];
			}

			$all_sizes[ $size_name ] = $size_data;
		}

		return $all_sizes;
	}
}
