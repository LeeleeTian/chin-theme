;(function (window, $, App) {
    'use strict';

    var MenuOrder = function() {
    };

    MenuOrder.prototype.init = function () {
        var $a = $('.pc__sidebar a.our-work__industry[href=42]');
        $a.remove();
        $('.pc__sidebar a.our-work__industry').last().after($a);
    };

    App.MenuOrder = new MenuOrder();

})(window, jQuery, App);