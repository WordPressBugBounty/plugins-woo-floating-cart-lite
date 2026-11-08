<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Included inside an XTFW_Settings method; these variables are local to it.
/**
 * Template for displaying the multi select countries field
 *
 * @var array $field The field.
 *
 * @package XTFW_Settings\Fields
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

$selections = (array) $this->get_option( $field['name'], $field['default'] );

if ( ! empty( $field['options'] ) ) {
	$countries = $field['options'];
} else {
	$countries = WC()->countries->countries;
}

asort( $countries );
?>
<tr>
    <th scope="row" class="titledesc">
        <?php $this->render_field_label($field); ?>
    </th>
    <td class="forminp">
        <?php $this->render_field_before( $field ); // WPCS: XSS ok. ?>
        <select multiple="multiple" name="<?php echo esc_attr( $field['name'] ); ?>[]" style="width:350px" data-placeholder="<?php esc_attr_e( 'Choose countries&hellip;', 'xt-framework' ); ?>" aria-label="<?php esc_attr_e( 'Country', 'xt-framework' ); ?>" class="wc-enhanced-select">
            <?php
            if ( ! empty( $countries ) ) {
                foreach ( $countries as $key => $val ) {
                    echo '<option value="' . esc_attr( $key ) . '" ' . selected( in_array( (string) $key, array_map( 'strval', $selections ), true ), true, false ) . '>' . esc_html( $val ) . '</option>';
                }
            }
            ?>
        </select>
        <?php $this->render_field_description( $field ); // WPCS: XSS ok. ?> <br /><a class="select_all button" href="#"><?php esc_html_e( 'Select all', 'xt-framework' ); ?></a> <a class="select_none button" href="#"><?php esc_html_e( 'Select none', 'xt-framework' ); ?></a>
        <?php $this->render_field_after( $field ); // WPCS: XSS ok. ?>
    </td>
</tr>
