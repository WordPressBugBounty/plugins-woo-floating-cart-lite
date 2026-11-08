<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'XTFW_Conflicts_Check' ) ) {

	/**
	 * Class that takes care of disabling plugin conflicts and throws notices
	 *
	 * @since      1.0.0
	 * @package    XTFW_Framework
	 * @subpackage XTFW_Framework/includes
	 * @author     XplodedThemes
	 */
	class XTFW_Conflicts_Check {

		/**
		 * Core class reference.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      XTFW_Framework $core Core Class
		 */
		private $core;

		protected $conflicts = array();

		/**
		 * Construct.
		 *
		 * @since    1.0.0
		 * @access   public
		 * @var      XTFW_Framework $core Core Class
		 */
		public function __construct( $core ) {

			$this->core = $core;

			if ( empty( $core->plugin()->conflicts() ) ) {
				return;
			}

			$this->conflicts = $core->plugin()->conflicts();

			add_action( 'admin_init', array( $this, 'check_conflicted_plugins' ));
		}

		/**
		 * Check if conflicting plugins are active and show a notice. Plugins are never deactivated automatically.
		 *
		 * @since    1.0.0
		 */
		public function check_conflicted_plugins() {

			$failed = array();
			foreach ( $this->conflicts as $key => $item ) {

				if ( is_plugin_active( $item->path ) ) {

					$failed[]                        = $item->path;
					$this->conflicts[ $key ]->failed = true;
				}
			}

			if ( ! empty( $failed ) ) {

				$this->render_conflicts_notices();

				return false;
			}

			return true;
		}

		/**
		 * Render error notice if conflicted plugins are active
		 *
		 * @since    1.0.0
		 */
		public function render_conflicts_notices() {

			foreach ( $this->conflicts as $key => $item ) {
				if ( ! empty( $item->failed ) ) {

					$this->core->plugin_notices()->add_warning_message( sprintf(
						/* translators: 1: conflicting plugin name, 2: this plugin's name. */
						esc_html__( '%1$s conflicts with %2$s. Please deactivate %1$s to avoid issues.', 'xt-framework' ),
						'<strong>' . $item->name . '</strong>',
						'<strong>' . $this->core->plugin_name() . '</strong>'
					) );

				}
			}
		}
	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_Conflicts_Check', false ) ) {
		class_alias( 'XTFW_Conflicts_Check', 'XT_Framework_Conflicts_Check' );
	}
	// xtfw-legacy-alias:end
}