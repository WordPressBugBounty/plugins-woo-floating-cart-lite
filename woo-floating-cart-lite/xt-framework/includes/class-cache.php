<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XTFW_Cache' ) ) {

	class XTFW_Cache {

        /**
         * Cache group
         *
         * @since    1.0.0
         * @access   protected
         * @var      string $cache_group
         */
        protected $cache_group;

        public function __construct( $cache_group = '' ) {

            $this->cache_group = $cache_group;
		}

        public function set($key, $val, $expire = 0) {

            return wp_cache_set($key, $val, $this->cache_group, $expire);
        }

        public function get($key) {

            return wp_cache_get( $key, $this->cache_group );
        }

        public function delete($key) {

            return wp_cache_delete( $key, $this->cache_group );
        }

        public function exists($key) {

            return $this->get( $key ) !== false;
        }

        public function flush() {

            return wp_cache_flush();
        }

        public function result($key, callable $callback, $expiration = 0) {

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
	if ( ! class_exists( 'XT_Framework_Cache', false ) ) {
		class_alias( 'XTFW_Cache', 'XT_Framework_Cache' );
	}
	// xtfw-legacy-alias:end
}