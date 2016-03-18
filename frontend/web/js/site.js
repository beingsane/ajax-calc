
function showResult(result)
{
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
}


$(document).ready(function() {
    $('.site-index .btn-calc-expression').click(function() {
        var expression = $('#expression').val();

        var taskVariant = $('#task-variant').val();

        var ajaxSettings;
        if (taskVariant == 'simple') {
            ajaxSettings = {
                url: $(this).data('action-url'),
                data: {expression: expression}
            }
        } else {
            ajaxSettings = {
                url: $(this).data('api-action-url'),
                data: {expression: expression},
                jsonp: 'callback',
                dataType: 'jsonp'
            }
        }


        $.ajax(ajaxSettings)
            .success(function(result) {
                showResult(result);
            })
            .error(function(e, a, b) {
                message = 'Произошла ошибка при передаче данных';
                $('#expression-result').html(message);
            });
    });
});
