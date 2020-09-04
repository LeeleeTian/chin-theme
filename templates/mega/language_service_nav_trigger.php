<?php
echo View::make('mega/service_navs', [
    'en' => 'language_service_nav_trigger', // English
    'ch' => 'language_service_nav_trigger_ch', // Chinese
    'background' => get_field('language_services_background', 'options'),
    'btnLabel' => get_field('language_services_button_label', 'options')
]);
