<?php

class TrueTheme
{
    public static $mega = [];

    /**
     * Keep this clean, limited to calling functions
     * or adding hooks/filters instead
     * @return [type] [description]
     */
    public static function init()
    {
        self::addACFOptions();
        self::addImageSizes();

        /**
         * Custom global hooks & filters
         */
        // Custom class to body
        add_filter('body_class', array(__CLASS__, 'addBodyClass'), 999);
        // Additional item on nav generation, usually used to add dropdown menu
        add_filter('roots_wp_nav_menu_item', array(__CLASS__, 'addDropdownMenu'), 999, 3);
        // Modifying class on each nav item. Useful for correcting active class on nav item
        add_filter('nav_menu_css_class', array(__CLASS__, 'assignNavActiveClass'), 10, 2);

        // add_filter('acf/fields/post_object/query/name=cs_service', [__CLASS__, 'filterServicePages'], 10, 3);

        add_filter('nav_menu_link_attributes', [__CLASS__, 'addMenuAttribute'], 999, 3);
        add_filter('wpcf7_load_js', [__CLASS__, 'disableCF7Js'], 999, 3);
        add_filter('wpcf7_load_css', [__CLASS__, 'disableCF7Css'], 999, 3);
        add_action('init', [__CLASS__, 'addRewriteRule'], 10, 0);
        add_action('init', array(__CLASS__, 'disable_emojis'));
    }

    public static function disableCF7Css($allowed)
    {
        if (is_front_page()) {
            return false;
        }
        return true;
    }

    public static function disableCF7Js($allowed)
    {
        if (is_front_page()) {
            return false;
        }
        return true;
    }

    public static function addRewriteRule()
    {
        add_rewrite_tag('%industries%', '([^&]+)');
        add_rewrite_tag('%services%', '([^&]+)');
        add_rewrite_rule('^home/our-work/industry/([0-9]+)', 'index.php?page_id=40&industries=$matches[1]', 'top');
        add_rewrite_rule('^home/our-work/service/([0-9]+)', 'index.php?page_id=40&services=$matches[1]', 'top');
    }

    public static function addMenuAttribute($atts, $item, $args)
    {
        if (count(self::$mega) <= 0) {
            self::buildMega();
        }
        $mega = self::$mega;

        if (isset($mega['triggers'][intval($item->ID)])) {
            $atts['class'] = 'nav-hover nav-hover-'.$item->ID;
        }

        return $atts;
    }

    public static function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', array(__CLASS__, 'disable_emojis_tinymce'));
    }

    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param    array  $plugins
     * @return   array             Difference betwen the two arrays
     */
    public static function disable_emojis_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array( 'wpemoji' ));
        } else {
            return array();
        }
    }

    /**
     * Add options page to ACF
     * @see http://www.advancedcustomfields.com/resources/upgrading-v4-v5/
     */
    public static function addACFOptions()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Global Options',
                'icon_url'    => TrueLib::getImageURL('true-agency-logo.png'),
            ));

            // Additional options pages goes here
        }
    }

    /**
     * Register additional image sizes here
     */
    public static function addImageSizes()
    {
        add_image_size('full-width', 1920, 999999);
        add_image_size('half-width', 960, 9999);
    }

    /**
     * Add our own body classes if needed
     *
     * @param array $classes
     */
    public static function addBodyClass($classes)
    {
        return $classes;
    }

    /**
     * Correcting current active class, hook into 'nav_menu_css_class'
     * @param  array
     * @param  Object
     * @return [type]
     */
    public static function assignNavActiveClass($classes, $item)
    {
        // Remove active class when on search page
        if (is_search()) {
            $classes = str_replace(array('active'), '', $classes);
        }

        return $classes;
    }

    /**
     * Hook into roots_nav filters, useful for adding mega menu dropdown
     *
     * @param [type] $html    HTML string of the menut
     * @param [type] $item    WP Nav object
     * @param [type] $post_id The ID of the page/post that the nav links to
     */
    public static function addDropdownMenu($html, $item, $post_id)
    {
        if (count(self::$mega) <= 0) {
            self::buildMega();
        }
        $mega = self::$mega;

        if (isset($mega['triggers'][intval($item->ID)])) {
            $html .= View::make('mega/'.$mega['triggers'][intval($item->ID)], compact('mega'));
        }

        return $html;
    }

    public static function addMenuClasses($classes, $item)
    {
        if (count(self::$mega) <= 0) {
            self::buildMega();
        }
        $mega = self::$mega;

        if (isset($mega['triggers'][intval($item->ID)])) {
            $classes[] = 'has-mega-dropdown';
        }

        return $classes;
    }

    public static function buildMega()
    {
        $result = [
            // The mega dropdown content
            // from options
            'dropdowns' => [],

            // Show dropdown on these nav items
            'triggers' => [
                get_field('language_service_nav_trigger', 'options') => 'language_service_nav_trigger',
                get_field('language_service_nav_trigger_ch', 'options') => 'language_service_nav_trigger',

                get_field('marketing_service_nav_trigger', 'options') => 'marketing_service_nav_trigger',
                get_field('marketing_service_nav_trigger_ch', 'options') => 'marketing_service_nav_trigger',

                get_field('industries_nav_trigger', 'options') => 'industries_nav_trigger',
                get_field('industries_nav_trigger_ch', 'options') => 'industries_nav_trigger',
            ]
        ];

        while (have_rows('dropdowns', 'options')): the_row();
        $navContent = [];
        $navContent['icon'] = get_sub_field('icon');
        $navContent['thumb'] = TrueLib::getImageURL([
                'name' => 'thumbnail',
                'subfield' => true,
                'size' => 'mega-thumb'
            ]);
        $navContent['topCat'] = get_sub_field('top_level_category');
        $navContent['topCatName'] = get_sub_field('short_cat_name');
        // If not set in options
        if (!$navContent['topCatName']) {
            $navContent['topCatName'] = $navContent['topCat']->name;
        }
        $navContent['subCats'] = get_sub_field('sub_categories');
        $navContent['sublinks'] = get_sub_field('sub_links');
        $result['dropdowns'][] = $navContent;
        endwhile;

        #TrueLib::printVar($result);die;

        self::$mega = $result;
    }

    /**
     * Filter available pages for selection on 'case study' pages,
     * such that only Service child pages are available for selection
     *
     * @see https://www.advancedcustomfields.com/resources/acf-fields-post_object-query/
     *
     * @param array  $args
     * @param array $fields
     * @param WP_Post $post
     * @return array
     */
    public static function filterServicePages($args, $fields, $post)
    {
        // only show children of the current post being edited
        if ($ourServices = getenv('PAGE_OUR_SERVICES')) {
            $args['post_parent'] = $ourServices;
        }
        return $args;
    }
}

TrueTheme::init();
