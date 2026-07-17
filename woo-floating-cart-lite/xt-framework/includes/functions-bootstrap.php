<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'xtfw_get_refresh_url' ) ) {
    /**
     * Get a safe URL for the framework loader's one-time refresh.
     *
     * Plugin files are loaded before WordPress includes pluggable.php, so
     * wp_validate_redirect() is not always available here. A normal request
     * URI is already same-origin; protocol-relative or otherwise malformed
     * values fall back to the local admin URL.
     *
     * @since 2.5.14
     * @return string
     */
    function xtfw_get_refresh_url() {
        $fallback = admin_url();
        $request_uri = isset( $_SERVER['REQUEST_URI'] ) && is_scalar( $_SERVER['REQUEST_URI'] )
            ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) )
            : $fallback;

        if ( function_exists( 'wp_validate_redirect' ) ) {
            return wp_validate_redirect( $request_uri, $fallback );
        }

        if ( empty( $request_uri ) || 0 !== strpos( $request_uri, '/' ) || 0 === strpos( $request_uri, '//' ) ) {
            return $fallback;
        }

        return $request_uri;
    }
}
