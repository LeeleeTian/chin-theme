<?php
class AcfExtensions
{
    public static function init()
    {
        add_filter('acf/load_field/name=cs_service', [__CLASS__, 'acfLoadServices']);

        $language_service_nav_trigger = self::acfLoadMultiregionMenu('language_service_nav_trigger', 'language_service_nav_trigger_ch');
        add_filter('acf/load_field/name=language_service_nav_trigger', $language_service_nav_trigger);
        add_filter('acf/load_field/name=language_service_nav_trigger_ch', $language_service_nav_trigger);

        $marketing_service_nav_trigger = self::acfLoadMultiregionMenu('marketing_service_nav_trigger', 'marketing_service_nav_trigger_ch');
        add_filter('acf/load_field/name=marketing_service_nav_trigger', $marketing_service_nav_trigger);
        add_filter('acf/load_field/name=marketing_service_nav_trigger_ch', $marketing_service_nav_trigger);

        $industries_nav_trigger = self::acfLoadMultiregionMenu('industries_nav_trigger', 'industries_nav_trigger_ch');
        add_filter('acf/load_field/name=industries_nav_trigger', $industries_nav_trigger);
        add_filter('acf/load_field/name=industries_nav_trigger_ch', $industries_nav_trigger);
    }

    public static function acfLoadServices($field)
    {
        $servicesPageId = icl_object_id(getenv('PAGE_OUR_SERVICES'), 'page', true, ICL_LANGUAGE_CODE);
        $services = get_children([
            'post_parent' => $servicesPageId,
            'post_type' => 'page',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ]);

        $field['choices'] = [];

        foreach ($services as $service) {
            $shortName = get_field('services_short_name', $service);
            if (!$shortName) {
                $shortName = $service->post_title;
            }

            $field['choices'][$service->ID] = $shortName;
        }

        return $field;
    }

    public static function acfLoadMultiregionMenu($en, $ch)
    {
        return function ($field) use ($en, $ch) {
            if (function_exists('get_current_screen') && get_current_screen()->id == 'toplevel_page_acf-options-global-options') {
                if (ICL_LANGUAGE_CODE == 'en' && $field['name'] == $en) {
                    return $field;
                }
        
                if (ICL_LANGUAGE_CODE == 'zh-hans' && $field['name'] == $ch) {
                    return $field;
                }
        
                return null;
            } else {
                return $field;
            }
        };
    }
}

AcfExtensions::init();
