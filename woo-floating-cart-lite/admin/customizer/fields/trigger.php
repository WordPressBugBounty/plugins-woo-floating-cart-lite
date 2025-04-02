<?php

$fields[] = array(
    'id'          => 'trigger_hidden',
    'section'     => 'trigger',
    'label'       => esc_html__( 'Cart Trigger Hidden', 'woo-floating-cart' ),
    'description' => esc_html__( 'Hide main trigger if you only wish to trigger the cart using the API, shortcode, menu cart item or from custom selectors.', 'woo-floating-cart' ),
    'type'        => 'radio-buttonset',
    'choices'     => array(
        '0' => esc_html__( 'No', 'woo-floating-cart' ),
        '1' => esc_html__( 'Yes', 'woo-floating-cart' ),
    ),
    'default'     => '0',
    'priority'    => 10,
);
$fields[] = array(
    'id'              => 'trigger_event_type',
    'section'         => 'trigger',
    'label'           => esc_html__( 'Cart Trigger Event Type', 'woo-floating-cart' ),
    'type'            => 'radio-buttonset',
    'choices'         => array(
        'pointerdown' => esc_attr__( 'Click Only', 'woo-floating-cart' ),
        'mouseenter'  => esc_attr__( 'Mouse Over Or Click', 'woo-floating-cart' ),
    ),
    'default'         => 'pointerdown',
    'priority'        => 10,
    'active_callback' => array(array(
        'setting'  => 'trigger_hidden',
        'operator' => '!=',
        'value'    => '1',
    )),
);
$fields[] = array(
    'id'              => 'trigger_hover_delay',
    'section'         => 'trigger',
    'label'           => esc_html__( 'Mouse Over delay before trigger', 'woo-floating-cart' ),
    'type'            => 'slider',
    'choices'         => array(
        'min'    => '0',
        'max'    => '1500',
        'step'   => '10',
        'suffix' => 'ms',
    ),
    'priority'        => 10,
    'default'         => 200,
    'active_callback' => array(array(
        'setting'  => 'trigger_hidden',
        'operator' => '!=',
        'value'    => '1',
    ), array(
        'setting'  => 'trigger_event_type',
        'operator' => '==',
        'value'    => 'mouseenter',
    )),
);
$fields[] = array(
    'id'              => 'counter_position',
    'section'         => 'trigger',
    'label'           => esc_html__( 'Product Counter Position', 'woo-floating-cart' ),
    'type'            => 'radio-buttonset',
    'input_attrs'     => array(
        'data-col' => '2',
    ),
    'priority'        => 10,
    'choices'         => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'       => 'postMessage',
    'js_vars'         => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-counter-pos-',
        'media_query' => $customizer->media_query( 'desktop', 'min' ),
    )),
    'default'         => 'top-left',
    'screen'          => 'desktop',
    'active_callback' => array(array(
        'setting'  => 'trigger_hidden',
        'operator' => '!=',
        'value'    => '1',
    )),
);
$fields[] = array(
    'id'              => 'counter_position_tablet',
    'section'         => 'trigger',
    'label'           => esc_html__( 'Product Counter Position', 'woo-floating-cart' ),
    'type'            => 'radio-buttonset',
    'input_attrs'     => array(
        'data-col' => '2',
    ),
    'priority'        => 10,
    'choices'         => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'       => 'postMessage',
    'js_vars'         => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-counter-tablet-pos-',
        'media_query' => $customizer->media_query( 'tablet', 'max' ),
    )),
    'default'         => 'top-left',
    'screen'          => 'tablet',
    'active_callback' => array(array(
        'setting'  => 'trigger_hidden',
        'operator' => '!=',
        'value'    => '1',
    )),
);
$fields[] = array(
    'id'              => 'counter_position_mobile',
    'section'         => 'trigger',
    'label'           => esc_html__( 'Product Counter Position', 'woo-floating-cart' ),
    'type'            => 'radio-buttonset',
    'input_attrs'     => array(
        'data-col' => '2',
    ),
    'priority'        => 10,
    'choices'         => array(
        'top-left'     => esc_html__( 'Top Left', 'woo-floating-cart' ),
        'top-right'    => esc_html__( 'Top Right', 'woo-floating-cart' ),
        'bottom-left'  => esc_html__( 'Bottom Left', 'woo-floating-cart' ),
        'bottom-right' => esc_html__( 'Bottom Right', 'woo-floating-cart' ),
    ),
    'transport'       => 'postMessage',
    'js_vars'         => array(array(
        'element'     => '.xt_woofc',
        'function'    => 'class',
        'prefix'      => 'xt_woofc-counter-mobile-pos-',
        'media_query' => $customizer->media_query( 'mobile', 'max' ),
    )),
    'default'         => 'top-left',
    'screen'          => 'mobile',
    'active_callback' => array(array(
        'setting'  => 'trigger_hidden',
        'operator' => '!=',
        'value'    => '1',
    )),
);
$fields[] = array(
    'id'      => 'trigger_features',
    'section' => 'trigger',
    'type'    => 'xt-premium',
    'default' => array(
        'type'  => 'image',
        'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/trigger.png',
        'link'  => $this->core->plugin_upgrade_url(),
    ),
);