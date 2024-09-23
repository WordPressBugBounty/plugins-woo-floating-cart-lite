<?php

/* @var $customizer XT_Framework_Customizer */
$fields[] = array(
    'id'          => 'active_cart_body_overlay_color',
    'section'     => 'cart',
    'label'       => esc_html__( 'Overlay Color', 'woo-floating-cart' ),
    'description' => esc_html__( 'Set the Overlay Color on top of the page content, behind the cart. This helps focusing on the cart.', 'woo-floating-cart' ),
    'type'        => 'color',
    'choices'     => array(
        'alpha' => true,
    ),
    'priority'    => 10,
    'default'     => 'rgba(0,0,0,.5)',
    'transport'   => 'auto',
    'output'      => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-overlay-color',
    )),
);
$fields[] = array(
    'id'          => 'position',
    'section'     => 'cart',
    'label'       => esc_html__( 'Trigger / Cart Position', 'woo-floating-cart' ),
    'type'        => 'radio-buttonset',
    'input_attrs' => array(
        'data-col' => '2',
    ),
    'priority'    => 10,
    'choices'     => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-pos-',
        'media_query' => $customizer->media_query( 'desktop', 'min' ),
    ), array(
        'element'     => '.xt_woofc',
        'function'    => 'html',
        'attr'        => 'data-position',
        'media_query' => $customizer->media_query( 'desktop', 'min' ),
    )),
    'default'     => 'bottom-right',
    'screen'      => 'desktop',
);
$fields[] = array(
    'id'          => 'position_tablet',
    'section'     => 'cart',
    'label'       => esc_html__( 'Trigger / Cart Position', 'woo-floating-cart' ),
    'type'        => 'radio-buttonset',
    'input_attrs' => array(
        'data-col' => '2',
    ),
    'priority'    => 10,
    'choices'     => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-tablet-pos-',
        'media_query' => $customizer->media_query( 'tablet', 'max' ),
    ), array(
        'element'     => '.xt_woofc',
        'function'    => 'html',
        'attr'        => 'data-tablet_position',
        'media_query' => $customizer->media_query( 'tablet', 'max' ),
    )),
    'default'     => 'bottom-right',
    'screen'      => 'tablet',
);
$fields[] = array(
    'id'          => 'position_mobile',
    'section'     => 'cart',
    'label'       => esc_html__( 'Trigger / Cart Position', 'woo-floating-cart' ),
    'type'        => 'radio-buttonset',
    'input_attrs' => array(
        'data-col' => '2',
    ),
    'priority'    => 10,
    'choices'     => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'   => 'postMessage',
    'js_vars'     => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-mobile-pos-',
        'media_query' => $customizer->media_query( 'mobile', 'max' ),
    ), array(
        'element'     => '.xt_woofc',
        'function'    => 'html',
        'attr'        => 'data-mobile_position',
        'media_query' => $customizer->media_query( 'mobile', 'max' ),
    )),
    'default'     => 'bottom-right',
    'screen'      => 'mobile',
);
$fields[] = array(
    'id'        => 'cart_hoffset',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart X Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'priority'  => 10,
    'default'   => '20',
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-hoffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'desktop',
);
$fields[] = array(
    'id'        => 'cart_hoffset_tablet',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart X Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'priority'  => 10,
    'default'   => '20',
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-hoffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'tablet',
);
$fields[] = array(
    'id'        => 'cart_hoffset_mobile',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart X Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'priority'  => 10,
    'default'   => '0',
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-hoffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'mobile',
);
$fields[] = array(
    'id'        => 'cart_voffset',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart Y Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'default'   => '20',
    'priority'  => 10,
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-voffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'desktop',
);
$fields[] = array(
    'id'        => 'cart_voffset_tablet',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart Y Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'default'   => '20',
    'priority'  => 10,
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-voffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'tablet',
);
$fields[] = array(
    'id'        => 'cart_voffset_mobile',
    'section'   => 'cart',
    'label'     => esc_html__( 'Trigger / Cart Y Offset', 'woo-floating-cart' ),
    'type'      => 'slider',
    'choices'   => array(
        'min'    => '0',
        'max'    => '300',
        'step'   => '1',
        'suffix' => 'px',
    ),
    'default'   => '0',
    'priority'  => 10,
    'transport' => 'auto',
    'output'    => array(array(
        'element'       => ':root',
        'property'      => '--xt-woofc-voffset',
        'value_pattern' => '$px',
    )),
    'screen'    => 'mobile',
);
$fields[] = array(
    'id'      => 'cart_features',
    'section' => 'cart',
    'type'    => 'xt-premium',
    'default' => array(
        'type'  => 'image',
        'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/cart.png',
        'link'  => $this->core->plugin_upgrade_url(),
    ),
);