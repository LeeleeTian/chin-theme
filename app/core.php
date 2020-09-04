<?php

/**
 * As the name implies, load all required files for this project.
 *
 * @author TrueAgency <developers@trueagency.com.au>
 */
class CoreLoader {

	public static function init() {

		$themeRoot = self::themeRoot();

		/**
		 * ----------------------------------------------
		 * 				Load required files
		 * ----------------------------------------------
		 */
		/**
		 * Helper Files
		 * - Array helpers
		 * - String helpers
		 *
		 * Dependency : illuminate/support
		 */
		require_once $themeRoot . 'lib/helpers.php';

		/**
		 * Constant and configuration for current project
		 */
		require_once $themeRoot . 'true/config.php';

		/**
		 * General libraries for useful WP functions
		 */
		require_once $themeRoot . 'true/trueLib.php';

		/**
		 * Extending our TrueSocialIcons class
		 * Dependency: trueagency-options/modules/socialicons/socialicons.php
		 * @usage TrueShare::render()
		 */
		require_once $themeRoot . 'true/trueShare.php';

		/**
		 * General Styling hooks and customisation
		 * for WP Admin area
		 */
		require_once $themeRoot . 'true/AdminStyles.php';

		/**
		 * Theme configuration and stuff. Very specific to WP
		 * - Colection of WP hooks
		 */
		require_once $themeRoot . 'theme.php';

		require_once $themeRoot . 'AcfExtensions.php';
		require_once $themeRoot . 'HideCategories.php';
		require_once $themeRoot . 'Ajax.php';

		/*
		|--------------------------------------------------------------------------
		| All of the library true/* below require composer update
		|--------------------------------------------------------------------------
		*/

		/**
		 * Rendering template (mainly by calling ::make or ::render)
		 * Allows you pass variables the same way as Laravel
		 * e.g. View::make('member/dashboard', compact('member'))
		 */
		require_once $themeRoot . 'true/View.php';

		require_once $themeRoot . 'lib/Newsletter.php';
		require_once $themeRoot . 'lib/Twitter.php';
		require_once $themeRoot . 'lib/Lingo.php';

		/**
		 * Wrapper around Laravel's Request
		 * @see  \Illuminate\Http\Request
		 */
		// require_once $themeRoot . 'true/Request.php';

		/**
		 * Wrapper around URL Manipulation and
		 * generate URL
		 */
		// require_once $themeRoot . 'true/Url.php';

		/**
		 * Wrapper around wp_redirect for easier redirection
		 * Note that Redirect has to be called very early on
		 * to take effects
		 */
		// require_once $themeRoot . 'true/Redirect.php';

		/**
		 * Detect and decide which controllers to be called
		 * for current url. Simple.
		 * At the bottom of this file, Route::init() is called
		 * @dependency URL
		 */
		// require_once $themeRoot . 'true/Route.php';

		/*
		|--------------------------------------------------------------------------
		| 				Load custom post-types, widgets and stuff
		|--------------------------------------------------------------------------
		*/

        self::loadPostType('case-study');
        self::loadPostType('faq');
        self::loadPostType('resource');
        self::loadPostType('identity');

		/**
		 * ----------------------------------------------
		 * 				Load Additional Modules
		 * ----------------------------------------------
		 * These are mostly Prime related modules
		 * for more powerful Wordpress
		 */

		/**
		 * [Models module]
		 * ---------------------------------
		 *
		 * These models are eloquent based models
		 * illuminate/database must be in truetheme/composer.json and installed first
		 *
		 * Remove when Eloquent models are not used.
		 *
		 */
        // require_once $themeRoot . 'models/base.php';
        // require_once $themeRoot . 'models/CapsuleHelper.php';

        // Register your models below
        // require_once $themeRoot . 'models/User.php';
        
        /**
         * Controllers (Wow, controllers)
         * ---------------------------------
         *
         * These are executed by registering its class to Route
         * Only handles logic/operation. View render is still handled
         * by wordpress template selection
         * @dependency Route
         *
         */
        // require_once $themeRoot . 'controllers/SampleController.php';
        
        /**
		 * Laravel Validator for Eloquent
         * ---------------------------------
		 *
		 * Used in conjunction with Eloquent Models
		 */
		// require_once $themeRoot . 'lib/Validator.php';

	}

	public static function themeRoot() {
		return get_template_directory() . '/app/';
	}

	public static function themeRootURL() {
		return get_template_directory_uri() . '/app/';
	}

	public static function loadWidget($widget)
    {
        require_once self::themeRoot() . 'widgets/' . $widget . '.php';
    }

    public static function loadPostType($postType)
    {
        require_once self::themeRoot() . 'post-types/' . $postType . '.php';
    }
}

CoreLoader::init();