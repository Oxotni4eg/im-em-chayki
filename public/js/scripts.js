$(document).ready(function () {
    $('#contactform').on('submit', function (e) {
        e.preventDefault();
    });
    $.validator.addMethod("InputEmail", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    }, "Email Address is invalid: Please enter a valid email address.");

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Проверьте что вы ввели!"
    );

    var validateForm = $(document).find('#contactform');
        validateForm.validate({
            rules: {
                InputSender: {
                    required: true,
                    minlength: 3,
                },
                InputPhone: {
                    required: true,
                    regex: /^\+375+[0-9]{9}/gi,
                    minlength: 13,
                },
                InputEmail: {
                    required: true,
                    email: true,
                    regex: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i,
                },
                InputMessage: {
                    required: true,
                    minlength: 8,
                }
            },
            messages: {
                InputSender: {
                    required: 'Это поле обязательное для заполнения',
                },
                InputPhone: {
                    required: 'Это поле обязательное для заполнения',
                },
                InputEmail: 'Неверно введён e-mail',
                InputMessage: {
                    required: 'Это поле обязательное для заполнения',
                    minlength: 'Минимальная длина составляет 8 символов',
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    type: 'POST',
                    url: '/sendmail',
                    data: $('#contactform').serialize(),
                    success: function (data) {
                            $('#senderror').hide();
                            $('#sendmessage').show();
                    },
                    error: function () {
                        $('#senderror').show();
                        $('#sendmessage').hide();
                    }
                });

                $('input#InputSender').val("");
                $('input#InputPhone').val("");
                $('input#InputEmail').val("");
                $('textarea#InputMessage').val("");
            }

        });

});
