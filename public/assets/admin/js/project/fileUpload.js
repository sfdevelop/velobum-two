var file = {
    'modal': function (id) {
        setAttr('id', id);
        $('#delete_name').html($('#name_'+id).text());
        $('#modal_delete_file').modal('show');
    },
    'delete': function () {
        var id = $_GET('id');
        $.ajax({
            method: "POST",
            url: '/admin/upload_file/delete',
            data: {'id': id},
            dataType: 'JSON',
            success: function (response) {
                console.log(response);
                if (response.errors != undefined) {
                    callToast.error('Ошибка', 'при удалении файда');
                    $('#modal_delete_file').modal('hide');
                    insertErrorArray($('#form_add_file'), response.errors, $('#group_errors'), $('#errors_list'));
                    return false;
                }
                if (response.status == 'success') {
                    $('#item_'+id).remove();
                    $('#modal_delete_file').modal('hide');
                    callToast.success('Файл', 'успешно удален');
                    return false;
                }
                callToast.error('Ошибка', 'при удалении файда');
            }
        });
    }
};
$(document).ready(function () {
    var clipboard = new Clipboard('.btn_copy');
    clipboard.on('success', function(e) {
        callToast.success('Ссылка', 'успешно скопирована в буфер');
        e.clearSelection();
    });

    $('#btn_upload_file').click(function () {
        var formData = new FormData();
        var name = $('#add_name').val();
        var file = $('#file')[0].files[0];
        if (name !== undefined) {
            formData.append('name', name);
        }
        if (file !== undefined) {
            formData.append('file', file);
        }

        var btn = $('#btn_upload_file');
        btn.html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>');
        var form = $('#form_add_file');

        $.ajax({
            method: "POST",
            url: '/admin/upload_file/add',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                btn.html(null);
                btn.text('Загрузить');
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
                    $('#item_alert').remove();
                    form[0].reset();
                    $('tbody').prepend(
                        '<tr id="item_'+response.item.id+'">'+
                        '<td class="text-center">'+
                            '<img class="thumb-sm" src="/assets/images/file_icons/'+response.item.exp+'.svg">'+
                        '</td>'+
                        '<td class="text-center" id="name_'+response.item.id+'">'+
                            response.item.name+
                        '</td>'+
                        '<td class="text-left">'+
                            '<strong id="url_'+response.item.id+'">http://skpp.com.ua/assets/uploads/'+response.item.name_file+'</strong>'+
                        '</td>'+
                        '<td class="text-center">'+
                            response.item.created_at+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button id="brn_copy"'+
                                    'data-toggle="tooltip" data-placement="top"'+
                                    'title="Скопировать ссылку"'+
                                    'class="btn_copy btn btn-primary" data-clipboard-target="#url_'+response.item.id+'">'+
                                '<i class="mdi mdi-content-copy"></i>'+
                            '</button>'+
                            '<button data-toggle="tooltip" data-placement="top"'+
                                    'title="Удалить файл"'+
                                    'class="btn btn-danger" onclick="file.modal('+response.item.id+')">'+
                                '<i class=" dripicons-trash"></i>'+
                            '</button>'+
                       ' </td>'+
                    '</tr>'
                    );
                }
            }
        });
    });
});