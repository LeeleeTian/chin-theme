;(function (window, $, App) {
    'use strict';

    var Industries = function() {
    };

    Industries.prototype.init = function () {
        $(".industries__categories a").click(function () {
            $(".industries__categories a").removeClass('active');
            $(this).addClass('active');
        });

        var hash = window.location.hash.replace('#i-', '#industry-');
        var $el = $('.industries__categories a[data-target=' + hash + ']');

        if ($el.length > 0) {
            var scrollTop = $(hash).offset().top;
            scrollTop -= $el.data('offset-top');
            $('html, body').animate({scrollTop: scrollTop + 'px'});
        }
    };

    App.Industries = new Industries();

})(window, jQuery, App);