<?php

$fields[] = array(
    'id'      => 'totals_features',
    'section' => 'totals',
    'type'    => 'xt-premium',
    'default' => array(
        'type'  => 'image',
        'value' => $this->core->plugin_url() . 'admin/customizer/assets/images/totals.png',
        'link'  => $this->core->plugin_upgrade_url(),
    ),
);