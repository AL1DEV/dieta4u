(function ($) {
    $(document).ready(function() {
        setTimeout(function(){
            var  $spinner = $('.form-item-quantity input, .commerce-line-item-views-form .views-field-edit-quantity input');
            $spinner.spinner({
                min: 1,
                max: 9999,
                increment: 'fast',
                stop:function(event,ui){
                    $(this).change();
                }
            });
        }, 1000);
    });

    Drupal.behaviors.dieta4u = {
        attach: function (context, settings) {
            var self = this;
            self.mainSlider();
            self.fancybox();
            self.filter();
            self.ajaxCart();
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
        },


        ajaxCart: function () {
            $('#dc-cart-ajax-form-wrapper .views-field-edit-quantity input').change(function () {
                var $button = $('.commerce-line-item-actions .form-submit.ajax-processed');
                var $value = $(this).val();

                if($value && $value > 1) $button.mousedown();
            })
        }

    };

})(jQuery);
