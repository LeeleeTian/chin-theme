;(function (window, $, App) {
    'use strict';

    var Resources = function() {
    };

    Resources.prototype.init = function () {
        $('.resources__pagination a').click(function () {
            var $a = $(this);

            $.ajax({
                data: 'action=resources_pagination&page=' + $a.attr('href') + '&' + $('form.resources__searcher').serialize(),
                url: $a.data('href'),
                type: 'POST',
                async: false,
                beforeSend: function () {
                    $a.find('.resources__pagination__label').addClass('hide');
                    $a.find('.resources__pagination__loader').removeClass('hide');
                },
                success: function (data, textStatus, jqXHR) {
                    $('.resources__list').append(data.content);
                    if (data.hide_pagination == 1) {
                        $('.resources__pagination').remove();
                    } else {
                        $a.attr('href', data.page);
                    }
                },
                complete: function (dataOrXhr, textStatus, xhrOrError) {
                    $a.find('.resources__pagination__loader').addClass('hide');
                    $a.find('.resources__pagination__label').removeClass('hide');
                }
            });

            return false;
        });

        $('select[name=resources_filter]').select2({
            minimumResultsForSearch: Infinity
        });
    };

    App.Resources = new Resources();

})(window, jQuery, App);