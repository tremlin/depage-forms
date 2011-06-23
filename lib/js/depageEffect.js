$.tools.validator.addEffect('depageEffect', function(errors, event) {
        // "show" function
        $.each(errors, function(index, error) {

            // erroneous input paragraph
            var errorParagraph = $(error.input).parents('p');

            // if there's no error message
            if (errorParagraph.find('.errorMessage').length == 0) {
                // add error notices
                errorParagraph.append('<span class="errorMessage">' +errorParagraph.attr('data-errorMessage')+ '</span>');
                errorParagraph.addClass('error');
            }
        });

        // the effect does nothing when all inputs are valid
        }, function(inputs) {
            $.each(inputs, function(index, input) {
                var inputParagraph = $(input).parents('p');
                inputParagraph.removeClass('error');
                inputParagraph.find('.errorMessage').remove();
            });
        });

$(document).ready(function () {
    var form = $('.depage-form');
    var check = form.attr('data-jsValidation');

    if ((check == 'blur') || (check == 'change')) {
        form.validator({
            effect: 'depageEffect',
            inputEvent: check,
            errorInputEvent: check,
        });
    } else if (check == 'submit') {
        form.validator({
            effect: 'depageEffect',
            // do not validate inputs when they are edited
            errorInputEvent: null,
        });
    }
});