
function showResult(result)
{
    alert(typeof(result));

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

        var url = $(this).data('action-url');
        $.ajax({
            url: url,
            jsonp: 'callback',
            dataType: 'jsonp',
            data: {expression: expression}
        })
        .success(function(result) {
            showResult(result);
        })
        .error(function(e, a, b) {
            message = 'Произошла ошибка при передаче данных';
            $('#expression-result').html(message);
        });
    });
});
