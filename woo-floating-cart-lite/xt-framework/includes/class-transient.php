<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XTFW_Transient' ) ) {

	class XTFW_Transient {

        /**
         * Transient prefix
         *
         * @since    1.0.0
         * @access   protected
         * @var      string $prefix
         */
        protected $prefix;

        public function __construct( $prefix = '' ) {

            $this->prefix = $prefix.'_';
		}

        public function set($key, $val, $expiration = MONTH_IN_SECONDS) {

            return set_transient( $this->prefix.$key, $val, $expiration );
        }

        public function get($key) {

            return get_transient( $this->prefix.$key );
        }

        public function delete($key) {

            return delete_transient( $this->prefix.$key );
        }

        public function exists($key) {

            return $this->get( $key ) !== false;
        }

        public function result($key, callable $callback, $expiration = YEAR_IN_SECONDS) {

            $cached = $this->get($key);

            // phpcs:disable WordPress.Security.NonceVerification.Recommended -- Read-only flag that skips the cache for this request.
            if($cached === false || !empty($_GET['nocache'])) {
            // phpcs:enable WordPress.Security.NonceVerification.Recommended

                $cached = $callback();

                $this->set($key, $cached, $expiration);
            }

            return $cached;
        }
	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_Transient', false ) ) {
		class_alias( 'XTFW_Transient', 'XT_Framework_Transient' );
	}
	// xtfw-legacy-alias:end
}