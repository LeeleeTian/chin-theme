;(function (window, $, App) {
    'use strict';

    var OurWork = function() {
    };

    OurWork.prototype.init = function () {
        var self = this
        $('.our-work__pagination a').click(function () {
            var $a = $(this);
            var industires = [];
            var services = [];
            $(".pc__nav a.our-work__industry.active").each(function () {
                industires.push(($(this).data('term-id')));
            });
            $(".pc__nav a.our-work__service.active").each(function () {
                services.push(($(this).data('term-id')));
            });
            var params = 'action=our-work_pagination&page=' + $a.attr('href');
            if (industires.length) {
                params += '&industry=' + industires.join(',')
            }
            if (services.length) {
                params += '&service=' + services.join(',')
            }
            $.ajax({
                data: params,
                url: $a.data('href'),
                type: 'POST',
                async: false,
                beforeSend: function () {
                    $a.find('.our-work__pagination__label').addClass('hide');
                    $a.find('.our-work__pagination__loader').removeClass('hide');
                },
                success: function (data, textStatus, jqXHR) {
                    $('.our-work__list').append(data.content);
                    if (data.hide_pagination == 1) {
                        $('.our-work__pagination').remove();
                    } else {
                        $a.attr('href', data.page);
                    }
                },
                complete: function (dataOrXhr, textStatus, xhrOrError) {
                    $a.find('.our-work__pagination__loader').addClass('hide');
                    $a.find('.our-work__pagination__label').removeClass('hide');
                }
            });
            return false;
        });

        $(".pc__nav a.our-work__industry").click(function () {
            $(this).toggleClass('active');
            var href = self.prepareQueryParams()
            window.location.href = href;
            return false;
        });
        $(".pc__nav a.our-work__service").click(function () {
            $(this).toggleClass('active');
            var href = self.prepareQueryParams()
            window.location.href = href;
            return false;
        });
    };

    OurWork.prototype.prepareQueryParams = function () {
        var industires = [];
        var services = [];
        $(".pc__nav a.our-work__industry.active").each(function () {
            industires.push(($(this).data('term-id')));
        });
        $(".pc__nav a.our-work__service.active").each(function () {
            services.push(($(this).data('term-id')));
        });
        var qs = window.location.search;
        var href = window.location.href.replace(qs, '');
        if (qs.indexOf('lang=zh-hans') != -1) {
            href += '?lang=zh-hans';
        }
        if (industires.length > 0) {
            if (href.indexOf('?') == -1) {
                href += '?';
            } else {
                href += '&';
            }
            href += 'industries=' + industires.join(',');
        }
        if (services.length > 0) {
            if (href.indexOf('?') == -1) {
                href += '?';
            } else {
                href += '&';
            }
            href += 'services=' + services.join(',');
        }
        return href;
    }

    OurWork.prototype.query = function () {
    }

    App.OurWork = new OurWork();

})(window, jQuery, App);
