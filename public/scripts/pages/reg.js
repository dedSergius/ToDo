$('input.date-of-birth').datepicker({
    format: "dd.mm.yyyy",
    language: "<?= \App\Core\Lang::getLanguage() ?>"
});
$('.input-file').each(function () {
    var $input = $(this),
        $label = $input.next('.js-labelFile'),
        labelVal = $label.html();

    $input.on('change', function (element) {
        var fileName = '';
        if ((element.target.files[0].type == 'image/png') || (element.target.files[0].type == 'image/jpeg') || element.target.files[0].type == 'image/gif') {
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').removeClass('error').find('.js-fileName').html(fileName) : $label.removeClass('has-file').removeClass('error').html(labelVal);
        } else {
            $label.addClass('error').find('.js-fileName').html("<?=LANG_INVALID_FORMAT?>");
            element.target.value = null;
        }

    });
});