(function ($) {
    Drupal.behaviors.dieta4u_validator = {
        attach: function (context, settings) {
            var self = this;

            $('.field-name-field-biling-telephone input').mask("+38 (999) 999-99-99", {autoсlear: false});

            $("#commerce-checkout-form-checkout").validate();

            $(".field-name-field-shipping-number input").rules("add", "required");

            $('.field-name-field-shipping-methode').on('change', 'select', function (e) {
                var settings = $('#commerce-checkout-form-checkout').validate().settings;
                var $value = $(this).val();

                if($value == 'Доставка на отделения новой почты'){
                    $.extend(true, settings, {
                        rules: {
                            "customer_profile_shipping[field_shipping_number][und][0][value]": {
                                required: true
                            },
                            "customer_profile_shipping[field_shipping_adress][und][0][value]": {}
                        }
                    });
                }
                if($value == 'Доставка курьером Новой почты'){
                    $.extend(true, settings, {
                        rules: {
                            "customer_profile_shipping[field_shipping_adress][und][0][value]": {
                                required: true
                            },
                            "customer_profile_shipping[field_shipping_number][und][0][value]": {}
                        }
                    });
                }
            });

            jQuery.extend(jQuery.validator.messages, {
                required: "Поле обязательно для заполнения.",
                remote: "Пожалуйста, исправьте это поле.",
                email: "Пожалуйста, введите действительный адрес электронной почты.",
                url: "Пожалуйста, введите корректный URL.",
                date: "Пожалуйста, введите правильную дату.",
                dateISO: "Пожалуйста, введите правильную дату (ISO).",
                number: "Пожалуйста введите правильное число.",
                digits: "Пожалуйста, вводите только цифры.",
                creditcard: "Пожалуйста, введите действительный номер кредитной карты.",
                equalTo: "Пожалуйста, повторите одно и то же значение.",
                accept: "Пожалуйста, введите значение с действующим расширением.",
                maxlength: jQuery.validator.format("Пожалуйста, введите не более, {0} символов."),
                minlength: jQuery.validator.format("Пожалуйста, введите не менне {0} символов."),
                rangelength: jQuery.validator.format("Пожалуйста, введите значение между {0} и {1} символами."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Пожалуйста, введите значение меньшее или равное {0}."),
                min: jQuery.validator.format("ожалуйста, введите значение большее или равное {0}.")
            });
        }
    };

})(jQuery);
