;(function ($, App) {

    'use strict';

    var self = App.Common = {
        init: function () {

            $('.navbar-collapse').on('shown.bs.collapse', function () {
                var menuHeight = $(this).height();
                var windowHeight = $(window).height();

                if (windowHeight < menuHeight + 62) {
                    $('body').addClass('mobile-menu');
                }
            }).on('hide.bs.collapse', function () {
                $('body').removeClass('mobile-menu');
            });

            $('.slider__slides').slick({
                arrows: false,
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnFocus: false,
                pauseOnHover: false,
                pauseOnDotsHover: false
            });

            var $nav = $('.nav-hover').parent();

            $nav.on('mouseenter', function () {
                if ($(this).parents('.in').length > 0) {
                    return false;
                }
                $(this).find('.mega-menu').slideDown(100, 'swing');
                $(this).addClass('active');
            }).on('mouseleave', function () {
                $(this).find('.mega-menu').stop(true, true).slideUp(100, 'swing');
                $(this).removeClass('active');
            });

            $(".industires-mega-link").click(function () {
                if ($('body.industries').length == 0) {
                    window.location.href = $(this).data("href");
                    return false;
                }
            });

            $('.main-menu > .dropdown > a').on('click', function () {
                window.location.href = $(this).attr('href');
            });

            this.initParallax();
            $(document).on('scroll', function (e) {
                self.initParallax();
            });

            this.stickyMenu();
            $(document).on('scroll', function (e) {
                self.stickyMenu();
            });

            this.initLogosSlider();

            $('.footer__newsletter__form form').on('submit', this.newsletterForm);
        },
        initParallax: function () {
            var docViewTop = $(window).scrollTop();

            if (docViewTop > 400) {
                $('.parallax-left').css('top', docViewTop/2);
            }

            if (docViewTop > 1400) {
                $('.parallax-right').css('top', 1400 + (docViewTop-1400)/2);
            }

        },
        stickyMenu: function () {
            var docViewTop = $(window).scrollTop();
            var $navBar = $('body');

            if (docViewTop >= 14) {
                $navBar.addClass('sticky-menu');
            } else {
                $navBar.removeClass('sticky-menu');
            }
        },
        initLogosSlider: function () {
            $('.cs__slider__slides').slick({
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
                        breakpoint: 1440,
                        settings: {
                            slidesToShow: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 321,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        },
        newsletterForm: function (e) {
            e.preventDefault();

            var $form = $('.footer__newsletter__form form');
            var $submit = $form.find('button[type="submit"]');
            var submitText = $submit.text();

            $submit.attr('disabled', 'disabled').text("Please wait...");

            $.ajax({
                data: $form.serialize(),
                url: $form.data('action'),
                type: 'POST',
                beforeSend: function () {
                    $form.removeClass('is-submited');
                    $form.find('small').removeClass('active');
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.status == 'OK') {
                        $form[0].reset();
                        $form.find('input[type=text]').focus().blur();
                        $form.addClass('is-submited');
                    } else if (data.status == 'error') {
                        for (var i in data.errors) {
                            $form.find('input[name=' + data.errors[i] + ']').next().addClass('active');
                        }
                    }
                },
                complete: function (dataOrXhr, textStatus, xhrOrError) {
                    $submit.removeAttr('disabled').text(submitText);
                }
            });
        }
    };

})(jQuery, window.App);