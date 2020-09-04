;(function (window, $, App) {
    'use strict';

    var Home = function() {
    };

    Home.prototype.init = function () {
        var $carousel = $('.reviews__slides');
        this.initSlick($carousel, $(window).width());

        var self = this;
        $(window).resize(function () {
            $carousel.slick('unslick');
            self.initSlick($carousel, $(window).width());
        });
    };

    Home.prototype.initSlick = function ($carousel, window_width) {
        var options = {
            infinite: true,
            slidesToScroll: 1,
            prevArrow: '<span class="btn btn--square btn--left"></span>',
            nextArrow: '<span class="btn btn--square"></span>'
        };

        if (window_width <= 768) {
            options.slidesToShow = 1;
            options.adaptiveHeight = true;
        } else {
            options.slidesToShow = 2;
        }

        $carousel.slick(options);
    };

    App.Home = new Home();

})(window, jQuery, App);