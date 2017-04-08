(function ($) {
    Drupal.behaviors.dieta4u = {
        attach: function (context, settings) {
            var self = this;
            self.mainSlider();
            $('.form-item-quantity input').spinner({
                min: 1,
                max: 9999,
                increment: 'fast'
            });
        },

        mainSlider: function () {
            $('.view-id-top_products_slider .views-row').carousel({
                interval: 6000
            })
        }

    };

})(jQuery);
