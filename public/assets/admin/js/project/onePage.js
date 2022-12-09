$(document).ready(function() {
    $('#form_update_one_page').submit(function() {
        var id = $('input[name=id]').val();
        var value = textboxio.replace('#value').content.get();
        $.ajax({
            method: "POST",
            url: '/admin/page/update',
            data: {'id': id, 'value': value},
            dataType: 'JSON',
            success: function (response) {
                if (response.errors != undefined) {
                    insertErrorArray($(this), response.errors, $('#group_error'), $('#error_list'))
                    return false;
                }
                if (response.status == 'success') {
                    callToast.success('Данные', 'успешно изменены');
                    return true;
                }
                callToast.error('Ошибка', 'при изменении данных');
            }
        });
    });
});