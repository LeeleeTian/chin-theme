+function ($) { "use strict";

    var SearchExpander = function(element, options) {
        var self       = this;
        this.options   = options;
        this.$el       = $(element);
        this.formClass  = options.formClass;

        // Flag to determine if currently expanded
        this.isExpaned = false;

        this.init();
    };

    SearchExpander.DEFAULTS = {
    };

    SearchExpander.prototype.init = function() {
        $(this.options.expandToggle).on("click", $.proxy(this.onClick, this));
    };

    SearchExpander.prototype.onClick = function(e) {
        if (this.isExpaned) {
            $(e.currentTarget).removeClass('is-expanded');
            this.collapse();
        } else {
            $(e.currentTarget).addClass('is-expanded');
            this.expand();
        }
    };

    SearchExpander.prototype.expand = function() {
        this.$el.fadeIn();
        this.isExpaned = true;
        $(".main-menu").addClass("hide-menu");
    };

    SearchExpander.prototype.collapse = function() {
        this.$el.fadeOut();
        this.isExpaned = false;
        $(".main-menu").removeClass("hide-menu");
    };


    var old = $.fn.navFixer;

    $.fn.searchExpander = function (option) {
        var args = Array.prototype.slice.call(arguments, 1);
        return this.each(function () {
            var $this   = $(this);
            var data    = $this.data('trueper.search-expander');
            var options = $.extend({}, SearchExpander.DEFAULTS, $this.data(), typeof option == 'object' && option);
            if (!data) $this.data('trueper.search-expander', (data = new SearchExpander(this, options)));
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    };

    $.fn.searchExpander.Constructor = SearchExpander;

    $.fn.searchExpander.noConflict = function () {
        $.fn.navFixer = old;
        return this
    };

    $(document).on('ready', function () {
        $('[data-control="search-expander"]').searchExpander();
    })

}(window.jQuery);
