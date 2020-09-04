;(function (window, $, App) {

    'use strict';

    /**
     * Register the pair of selector and class to instantiate scripts
     * e.g. {
     *     // Will execute App.Home.init() if 'body.home' is found on page
     *     'body.home' : App.Home
     * }
     */

    var self = App.Routes = {
        // Fired in all pages
        'init': App.Common,

        // Page-level scripts
        'body.page-template-page-home': App.Home,
        'body.page-template-page-contact': App.Contact,
        'body.page-template-page-team': App.Team,
        'body.page-template-page-resources': App.Resources,
        'body.page-template-page-our-services': App.Services,
        'body.page-template-page-our-work': App.OurWork,
        'body.page-template-page-industries': App.Industries,
        'body.page-id-699': App.MenuOrder

        // Component levels
    };

})(window, jQuery, App);