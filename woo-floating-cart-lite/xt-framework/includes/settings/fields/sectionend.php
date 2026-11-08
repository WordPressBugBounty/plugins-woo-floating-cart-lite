<?php
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.DynamicHooknameFound -- Hook names are built from the plugin's own prefix (plugin_prefix(), config IDs or prefixed option names).
// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Included inside an XTFW_Settings method; these variables are local to it.
/**
 * Template for displaying the sectionend field
 *
 * @var bool $section_has_preview Section has preview flag
 * @var array $field The field.
 *
 * @package XTFW_Settings\Fields
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if ( ! empty( $field['id'] ) ) {
    do_action( $this->core->plugin_prefix('settings_') . sanitize_title( $field['id'] ) . '_end' );
}
?>
</table>

    <?php

    // Close preview if any
    if ( $section_has_preview ):
        $section_has_preview = false;
        ?>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php

if ( ! empty( $field['id'] ) ) {
	do_action( $this->core->plugin_prefix('settings_') . sanitize_title( $field['id'] ) . '_after' );
}