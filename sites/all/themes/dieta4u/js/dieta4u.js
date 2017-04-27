(function ($) {
    Drupal.behaviors.dieta4u = {
        attach: function (context, settings) {
            var self = this;
            self.mainSlider();
            self.fancybox();
            self.filter();

                $('.form-item-quantity input, .commerce-line-item-views-form .views-field-edit-quantity input').spinner({
                    min: 1,
                    max: 9999,
                    increment: 'fast'
                });
        },

        mainSlider: function () {
            if (typeof carousel === 'function')
            $('.view-id-top_products_slider .views-row').carousel({
                interval: 6000
            })
        },


        fancybox: function () {
            if (typeof fancybox === 'function')
            $("[data-fancybox]").fancybox({
                image : {
                    protect: true
                }
            });
        },


        filter: function () {
            $('#views-exposed-form-catalog-page select').change(function () {
                $('#views-exposed-form-catalog-page .form-submit').click();
            });

            $('select').niceSelect();
        }

    };

})(jQuery);
