;(function (window, $, App) {
    'use strict';

    var Services = function() {
    };

    Services.prototype.init = function () {
        $('.services__slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            infinite: true,
            slidesToScroll: 1,
            slidesToShow: 6,
            arrows: true,
            prevArrow: '<span class="slick-prev"></span>',
            nextArrow: '<span class="slick-next"></span>',
            pauseOnHover: false,
            pauseOnFocus: false,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    };


    App.Services = new Services();

})(window, jQuery, App);