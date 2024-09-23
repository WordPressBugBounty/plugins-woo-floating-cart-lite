<?php

$fields[] = array(
    'id'      => 'checkout_features',
    'section' => 'checkout',
    'type'    => 'xt-premium',
    'default' => array(
        'type'  => 'image',
        'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/checkout.png',
        'link'  => $this->core->plugin_upgrade_url(),
    ),
);