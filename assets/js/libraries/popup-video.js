/*
 * Popup Video Plugin
 *
 * Magnific-powered video player with data api
 *
 * Example:
 * <a href="http://video.com/xxx"
 *     data-video-popup
 * >
 *     Click me!
 * </a>
 * or
 * <button type="button"
 *     data-video-popup
 *     data-video-url="http://video.com/xxx"
 * >
 *     Click me!
 * </button>
 *
 * Data API:
 * - data-video-popup : Activates plugin
 * - data-video-url   : Streamable video url, if not available will use href attribute
 *
 * JavaScript API:
 * $('a#videoTrigger').popupVideo()
 *
 */

+function ($) { "use strict";

    // VideoPopup CLASS DEFINITION
    // ============================

    var VideoPopup = function(element, options) {
        var self        = this;
        this.options    = options;
        this.$el        = $(element);
        this.url        = (this.options.videoUrl) || this.$el.attr('href');
        this.isPlaying  = false
        this.$inlineTarget = options.videoInline ? $(options.videoInline) : null
        if (!this.url) {
            return;
        }

        this.init()
    }

    VideoPopup.DEFAULTS = {
        videoUrl: null,
        videoInline: false
    }

    VideoPopup.prototype.init = function() {

        if (this.$inlineTarget && this.$inlineTarget.length) {

            this.$el.on('click', $.proxy(this.onClickInline, this))

        } else {
            this.$el
                .magnificPopup({
                    type: 'iframe',
                    items: {
                        src: this.url
                    }
                })
                .on('mfpBeforeOpen', $.proxy(this.onBeforeOpen, this))
                .on('mfpAfterClose', $.proxy(this.onAfterClose, this))
            ;
        }
    }

    VideoPopup.prototype.onClickInline = function() {

        if (this.isPlaying) { return; }

        var $video = $('<iframe class="" src="'+this.url+'?autoplay=1" frameborder="0" allowfullscreen=""></iframe>'),
            self = this;

        this.$inlineTarget
            .append($video);
        this.$inlineTarget
            .parent()
            .addClass('is-video-playing');
        this.$inlineTarget
            .closest('.has-inline-video')
            .addClass('is-video-playing');
        this.isPlaying = true;

        this.$inlineTarget.append('<button class="close-inline-video"><span class="icon-cross"></span></button>');
        this.$inlineTarget.one('click', '.close-inline-video', $.proxy(this.onCloseInline, this));

        $(document).on('keyup.close-popup-video', function (e) {
            if (e.keyCode === 27) {
                self.onCloseInline()
            }
        })
    }

    VideoPopup.prototype.onCloseInline = function(e) {
        this.$inlineTarget
            .parent()
            .removeClass('is-video-playing')
        this.$inlineTarget
            .closest('.has-inline-video')
            .removeClass('is-video-playing');

        if (typeof e != 'undefined') {
            e.stopPropagation();
        }
        this.$inlineTarget.empty();
        this.isPlaying = false;
        $(document).off('keyup.close-popup-video');
    }

    VideoPopup.prototype.onBeforeOpen = function() {
        this.$el.addClass('is-playing-video')
        this.isPlaying = true;
    }

    VideoPopup.prototype.onAfterClose = function() {
        var $el = this.$el;
        this.isPlaying = false;

        window.setTimeout(function () {
            $el.removeClass('is-playing-video')
        }, 200)
    }

    // VideoPopup PLUGIN DEFINITION
    // ============================

    var old = $.fn.videoPopup

    $.fn.videoPopup = function (option) {
        var args = Array.prototype.slice.call(arguments, 1)
        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.video-popup')
            var options = $.extend({}, VideoPopup.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.video-popup', (data = new VideoPopup(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.videoPopup.Constructor = VideoPopup

    // VideoPopup NO CONFLICT
    // =================

    $.fn.videoPopup.noConflict = function () {
        $.fn.videoPopup = old
        return this
    }

    // VideoPopup DATA-API
    // ===============
    $(document).ready(function () {
        $('[data-video-popup]').videoPopup();
    });

}(window.jQuery);
