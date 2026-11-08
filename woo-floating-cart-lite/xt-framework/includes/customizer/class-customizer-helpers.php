<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!class_exists('XTFW_Customizer_Helpers')) {

	/**
	 * Class that contains static helper methods.
	 *
	 * @since      1.0.0
	 * @package    XTFW_Framework
	 * @subpackage XTFW_Framework/includes
	 * @author     XplodedThemes
	 */
	class XTFW_Customizer_Helpers {

		public static function repeater_fields_string_to_array($data) {

			if(!empty($data) && !is_array($data) && $data !== 'string') {
				$tmp = explode(',', $data);
				$data = array();
				if(!empty($tmp)) {
					foreach ( $tmp as $attr ) {
						$attr   = explode( ":", $attr );
						if(!empty($attr[1])) {
							$data[] = array(
								$attr[0] => $attr[1]
							);
						}
					}
				}
			}

			if(!is_array($data)) {
				$data = array();
			}

			return $data;
		}

	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_Customizer_Helpers', false ) ) {
		class_alias( 'XTFW_Customizer_Helpers', 'XT_Framework_Customizer_Helpers' );
	}
	// xtfw-legacy-alias:end // End Class
}

