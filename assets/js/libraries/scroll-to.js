/*
 * ScrollTo plugin
 *
 * Data attributes:
 * - data-control="scroll-to" - enables the plugin on an element
 *
 * JavaScript API:
 * $('input#someElement').scrollTo()
 *
 * Dependencies:
 * - ....
 */

+function ($) { "use strict";

    // ScrollTo CLASS DEFINITION
    // ============================

    var ScrollTo = function(element, options) {
        var self       = this
        this.options   = options
        this.$el       = $(element)
        this.$target   = $(options.target)
        this.offsetTop = options.offsetTop

        if (!this.$target.length) {
            this.$target = $(this.$el.attr('href'))
        }

        this.init()
    }

    ScrollTo.DEFAULTS = {
        offsetTop: 0,
        target: null
    }

    ScrollTo.prototype.init = function() {

        this.$el.on('click.scroll-to', $.proxy(this.onClick, this))

    }

    ScrollTo.prototype.onClick = function(ev) {

        if (!this.$target.length) return;

        ev.preventDefault();

        var scrollTop = this.$target.offset().top;

        scrollTop -= this.offsetTop;

        $('html, body').animate({scrollTop: scrollTop + 'px'});
    }

    // ScrollTo PLUGIN DEFINITION
    // ============================

    var old = $.fn.scrollTo

    $.fn.scrollTo = function (option) {
        var args = Array.prototype.slice.call(arguments, 1)
        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.scroll-to')
            var options = $.extend({}, ScrollTo.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.scroll-to', (data = new ScrollTo(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.scrollTo.Constructor = ScrollTo

    // ScrollTo NO CONFLICT
    // =================

    $.fn.scrollTo.noConflict = function () {
        $.fn.scrollTo = old
        return this
    }

    // ScrollTo DATA-API
    // ===============

    $(document).on('ready', function () {
       $('[data-control="scroll-to"]').scrollTo()
    })

}(window.jQuery);
