;(function (window, $, App) {
    'use strict';

    var Team = function() {
    };

    Team.prototype.init = function () {
        $('.team__modal').on('show.bs.modal',function (e) {
            var $member = $(e.relatedTarget);
            var $modal = $(this);
            $modal.find('img').attr('src', $member.data('img'));
            $modal.find('.team__modal__name').text($member.data('name'));
            $modal.find('.team__modal__occupation').text($member.data('occupation'));
            $modal.find('.team__modal__header').html($member.data('header'));
            $modal.find('.team__modal__content').html($member.data('description'));
            $modal.find('.team__modal__member').addClass($member.data('class'));

            $modal.data('class', $member.data('class'));

            var phone = $member.data('phone');
            if (phone) {
                $modal.find('.team__modal__phone').removeClass('hidden').find('span').text(phone);
            } else {
                $modal.find('.team__modal__phone').addClass('hidden');
            }
        }).on('hide.bs.modal', function (e) {
            var $modal = $(this);
            $modal.removeClass($modal.data('class'));
        });
    };

    App.Team = new Team();

})(window, jQuery, App);