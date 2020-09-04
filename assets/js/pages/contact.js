;(function (window, $, App) {
    'use strict';

    var Contact = function() {
    };

    Contact.prototype.init = function () {
        $('.contact-form select').select2({
            minimumResultsForSearch: Infinity
        });
    };

    App.Contact = new Contact();

})(window, jQuery, App);
