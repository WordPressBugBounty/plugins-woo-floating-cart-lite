<?php
/**
 * Template for displaying the editor field
 *
 * @var array $field The field.
 *
 * @package XT_Framework_Settings\Fields
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$option_value = $this->get_option( $field['name'], $field['default'] );

$editor_settings = array(
    'textarea_name' => $field['name'],
    'textarea_rows' => ! empty( $field['textarea_rows'] ) ? (int) $field['textarea_rows'] : 5,
    'media_buttons' => isset( $field['media_buttons'] ) ? (bool) $field['media_buttons'] : true,
    'wpautop'       => isset( $field['wpautop'] ) ? (bool) $field['wpautop'] : true,
    'quicktags'     => isset( $field['quicktags'] ) ? (bool) $field['quicktags'] : true,
    'teeny'         => isset( $field['teeny'] ) ? (bool) $field['teeny'] : false,
    'editor_class'  => $field['class'],
);
?>
<tr>
    <th scope="row" class="titledesc">
        <?php $this->render_field_label( $field ); ?>
    </th>
    <td class="forminp forminp-<?php echo esc_attr( sanitize_title( $field['type'] ) ); ?>">
        <?php $this->render_field_before( $field ); // WPCS: XSS ok. ?>
        <?php wp_editor( $option_value, $field['id'], $editor_settings ); ?>
        <?php $this->render_field_description( $field ); // WPCS: XSS ok. ?>
        <?php $this->render_field_after( $field ); // WPCS: XSS ok. ?>
    </td>
</tr>
