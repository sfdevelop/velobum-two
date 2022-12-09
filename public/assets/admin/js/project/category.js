var category = {
    'add': function () {
        var form = $('#form');
        $.ajax({
            method: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                if (response.errors != undefined) {
                    insertErrorArray(form, response.errors, $('#group_errors'), $('#errors_list'));
                    return false;
                }
                if (response.status == 'success') {
                    form.attr('action', '/admin/category/update');
                    $('input[name="item_id"]').val(response.item_id);
                    $('#btn_add').hide();
                    $('#btn_update').show();
                    callToast.success('Категория', 'успешно добавлена');
                    return true;
                }
                callToast.error('Ошибка', 'при добавлении категории');
            }
        });
    },
    'update': function () {
        var form = $('#form');
        $.ajax({
            method: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                if (response.error != undefined) {
                    callToast.error('Ошибка', response.error);
                    return false;
                }
                if (response.errors != undefined) {
                    insertErrorArray(form, response.errors, $('#group_errors'), $('#errors_list'));
                    return false;
                }
                if (response.status == 'success') {
                    $('#btn_add').hide();
                    $('#btn_update').show();
                    callToast.success('Категория', 'успешно изменена');
                    return true;
                }
                callToast.error('Ошибка', 'при изменении категории');
            }
        });
    }
};