<?php
echo View::make('mega/service_navs', [
    'en' => 'marketing_service_nav_trigger', // English
    'ch' => 'marketing_service_nav_trigger_ch', // Chinese
    'background' => get_field('marketing_services_background', 'options'),
    'btnLabel' => get_field('marketing_services_button_label', 'options')
]);
