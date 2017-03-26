(function ($) {
    Drupal.behaviors.dieta4u = {
        attach: function (context, settings) {
            var self = this;
            self.mainSlider();
        },

        mainSlider: function () {
            $('.view-id-top_products_slider .views-row').carousel({
                interval: 6000
            })
        }

    };

})(jQuery);
