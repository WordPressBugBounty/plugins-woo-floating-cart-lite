<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Included inside an XTFW_Settings method; these variables are local to it.
/**
 * Template for displaying the heading field
 *
 * @var array $field The field.
 *
 * @package XTFW_Settings\Fields
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if(!empty($field['notice'])) {
    $variant = !empty($field['variant']) && in_array($field['variant'], array('info', 'warning', 'error')) ? $field['variant'] : 'info';
	echo '<div class="xtfw-settings-notice notice-'.esc_attr($variant).'">
	    <p>'.wp_kses_post($field['notice']).'</p>
	</div>';
}
