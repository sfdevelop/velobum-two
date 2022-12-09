var partner = {
    'delete': function(id) {
        $('#href_delete').attr('href', '/admin/partner/delete/'+id);
        $('#modal_delete_partner').modal('show');
    }
};
$(document).ready(function() {
    var form = $('#form_work_on');
    var group = $('#group_error');
    var errorList = $('#error_list');

    $('#btn_create').click(function() {
        var itemId = $('input[name=item_id]');

        var formData = new FormData();
        formData.append('image', $('#image')[0].files[0]);
        formData.append('url', $('#url').val());
        formData.append('name', $('#name').val());

        $.ajax({
            url: '/admin/partner/create',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.errors != undefined) {
                    insertErrorArray(form, response.errors, group, errorList);
                    callToast.error('Ошибка', 'при добавлении партнера');
                    return false;
                }
                if (response.status == 'success') {
                    $('#image').val(null);

                    $('#active_image').attr('src', '/assets/images/partners/'+response.image);
                    $('#block_active_image').show();

                    itemId.attr('value', response.item_id);
                    $('#btn_create').hide();
                    $('#btn_update').show();
                    callToast.success('Партнер', 'успешно добавлен');
                }
            }
        });
    });

    $('#btn_update').click(function() {
        var formData = new FormData();
        console.log($('#image')[0].files[0]);
        if ($('#image')[0].files[0] !== undefined) {
            console.log('if 1');
            formData.append('image', $('#image')[0].files[0]);
            formData.append('name', $('#name').val());
            formData.append('url', $('#url').val());
            formData.append('id', $('input[name=item_id]').val());
        }
        else {
            console.log('if 2');            
            formData.append('name', $('#name').val());
            formData.append('url', $('#url').val());
            formData.append('id', $('input[name=item_id]').val());
        }
        $.ajax({
            url: '/admin/partner/update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);

                if (response.errors != undefined) {
                    insertErrorArray(form, response.errors, group, errorList);
                    callToast.error('Ошибка', 'при обновлении данных о партнера');
                    return false;
                }
                if (response.status == 'success') {
                    if (response.image != undefined) {
                        $('#active_image').attr('src', '/assets/images/partners/'+response.image);
                    }
                    callToast.success('Данные', 'успешно изменены');
                    return false;
                }
                callToast.error('Ошибка', 'при обновлении данных о партнера');
            }
        });
    });
});