<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!class_exists('XTFW_Customizer_Controls')) {

	class XTFW_Customizer_Controls {

        protected $controls;

		function __construct( $controls, $wp_customize ) {

		    $this->controls = $controls;

			foreach ( $this->controls as $control ) {
				require_once( $control );
			}

			// Register our custom control with Xirki
			add_filter( 'xirki/control_types', array( $this, 'register_xirki' ), 10, 1 );
		}

		function register_xirki( $controls ) {

			foreach ( $this->controls as $control ) {
				$control_id              = str_replace( array( "class-xirki-control-", "-control" ), array(
					"",
					""
				), basename( $control, ".php" ) );
				$control_name            = str_replace( " ", "_", ucwords( str_replace( "-", " ", $control_id ) ) );
				$controls[ $control_id ] = 'Xirki_Control_' . $control_name;
			}

			return $controls;
		}
	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_Customizer_Controls', false ) ) {
		class_alias( 'XTFW_Customizer_Controls', 'XT_Framework_Customizer_Controls' );
	}
	// xtfw-legacy-alias:end
}