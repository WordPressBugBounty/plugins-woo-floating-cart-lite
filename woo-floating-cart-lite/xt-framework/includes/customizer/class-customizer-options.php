<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!class_exists('XTFW_Customizer_Options')) {

	/**
	 * Class that contains static methods to generate dynamic data options for the customizer.
	 *
	 * @since      1.0.0
	 * @package    XTFW_Framework
	 * @subpackage XTFW_Framework/includes
	 * @author     XplodedThemes
	 */
	class XTFW_Customizer_Options {

		/**
		 * Get page array.
		 *
		 * @return array menu id => title
		 */

		public static function get_page_options() {

			$pages = get_posts( array(
				'post_type'        => 'page',
				'posts_per_page'   => 100,
			) );

			$pages_options = array();
			foreach ( $pages as $page ) {
				$pages_options[ $page->ID ] = $page->post_title;
			}

			return $pages_options;
		}

		/**
		 * Get menu array.
		 *
		 * @return array menu slug => menu name
		 */
		public static function get_menu_options() {

			$terms = get_terms( array( 'taxonomy' => 'nav_menu', 'hide_empty' => false ) );
			$menu_options = array();

			foreach ( $terms as $term ) {
				$menu_options[ $term->slug ] = $term->name;
			}

			return $menu_options;
		}

        /**
         * Get all registered image sizes as options array.
         *
         * @return array menu size => size name
         */
		public static function get_image_sizes() {

            $sizes = xtfw_get_registered_image_subsizes();
            $sizes_options = array();

            foreach ( $sizes as $key => $size ) {

                $size_name = $key;
                $width = (!empty($size['width']) ? $size['width'] : 'auto');
                $height = (!empty($size['height']) ? $size['height'] : 'auto');

                $size_string = $width.' x '.$height;

                if($size_name !== $width.'x'.$height) {
                    $size_name = ucwords(str_replace("_", " ", $size_name));
                    $size_name .= ' - '.$size_string;
                }else{
                    $size_name = str_replace("x", " x ", $size_name);
                }

                if($size['crop']) {
                    $size_name .= ' (Cropped)';
                }

                $sizes_options[ $key ] = $size_name;
            }

            return $sizes_options;
        }

	}

	// xtfw-legacy-alias:start -- Keeps the pre-2.5.19 class name working for plugins bundling an older copy.
	if ( ! class_exists( 'XT_Framework_Customizer_Options', false ) ) {
		class_alias( 'XTFW_Customizer_Options', 'XT_Framework_Customizer_Options' );
	}
	// xtfw-legacy-alias:end // End Class
}

