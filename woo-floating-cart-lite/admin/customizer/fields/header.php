<?php

// HEADER COLORS
$fields[] = array(
    'id'      => 'header_colors',
    'section' => 'header',
    'label'   => esc_html__( 'Header Colors', 'woo-floating-cart' ),
    'type'    => 'custom',
);
$fields[] = array(
    'id'        => 'cart_header_bg_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Bg Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-bg-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_bottom_border_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Bottom Border Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-border-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_title_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Title Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-title-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Text Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_link_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Link Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-link-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_link_hover_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Link Hover Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-link-hover-color',
    )),
);
$fields[] = array(
    'id'        => 'cart_header_error_color',
    'section'   => 'header',
    'label'     => esc_html__( 'Cart Header Error Message Color', 'woo-floating-cart' ),
    'type'      => 'color',
    'priority'  => 10,
    'default'   => '',
    'transport' => 'auto',
    'output'    => array(array(
        'element'  => ':root',
        'property' => '--xt-woofc-header-error-color',
    )),
);
$fields[] = array(
    'id'      => 'header_features',
    'section' => 'header',
    'type'    => 'xt-premium',
    'default' => array(
        'type'  => 'image',
        'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/header.png',
        'link'  => $this->core->plugin_upgrade_url(),
    ),
);