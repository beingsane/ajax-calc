$(document).ready(function() {
    $('.site-index .btn-calc-expression').click(function() {
        var expression = $('#expression').val();

        $.get($(this).data('action-url'), {expression: expression})
            .success(function(result) {
                if (typeof(result) == 'object') {
                    if (result.status == 'success') {
                        message = result.value;
                    } else {
                        message = result.message;
                    }
                } else {
                    message = 'Произошла ошибка при получении результата';
                }

                $('#expression-result').html(message);
            })
            .error(function() {
                message = 'Произошла ошибка при передаче данных';
                $('#expression-result').html(message);
            });
    });
});
