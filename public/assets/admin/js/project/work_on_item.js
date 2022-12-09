var item = {
    'add': function () {
        var form = $('#form');
        var data = form.serializeArray();
        data.push({name: 'description', value: textboxio.replace('#item_description').content.get()});

        $.ajax({
            method: 'post',
            url: '/admin/item/add',
            data: data,
            dataType: 'JSON',
            timeout: 10000,
            success: function (result) {
                console.log(result);
                if (result.error != undefined) {
                    callToast.error('Ошибка', result.error);
                    return false;
                }
                if (result.errors != undefined) {
                    insertErrorArray(
                        form,
                        result.errors,
                        $('#group_errors'), $('#errors_list')
                    );
                    return false;
                }
                if (result.status == 'success') {
                    $('#btn_add').hide();
                    $('#btn_edit').show();
                    $('input[name="item_id"]').val(result.item_id);
                    callToast.success('Товар', 'успешно создан. Вы можете приступить к загрузке изображений');
                    return true;
                }
                else {
                    callToast.success('Ошибка', 'при добавлении товара');
                    return false;
                }
            }
        });
    },
    'edit': function () {
        var form = $('#form');
        var data = form.serializeArray();
        data.push({name: 'description', value: textboxio.replace('#item_description').content.get()});

        $.ajax({
            method: 'post',
            url: '/admin/item/edit',
            data: data,
            dataType: 'JSON',
            timeout: 10000,
            success: function (result) {
                if (result.error != undefined) {
                    callToast.error('Ошибка', result.error);
                    return false;
                }
                if (result.errors != undefined) {
                    insertErrorArray(
                        form,
                        result.errors,
                        $('#group_errors'), $('#errors_list')
                    );
                    return false;
                }
                if (result.status == 'success') {
                    callToast.success('Данные', 'о товаре успешно изменены');
                    return true;
                }
                else {
                    callToast.success('Ошибка', 'при изменении данных');
                    return false;
                }
            }
        });
    },
    'remove': function (id) {
        $.ajax({
            method: 'POST',
            url: '/admin/image_item/delete',
            data: {'id': id},
            dataType: 'JSON',
            success: function (result) {
                if (result.error != undefined) {
                    callToast.error('Ошибка', result.error);
                    return false;
                }
                if (result.status == 'success') {
                    $('#image__'+id).remove();
                    callToast.success('Изображение', 'успешно удалено');
                    return true;
                }
                callToast.error('Ошибка', 'При удалении изображения');
                return false;
            }
        });
    },
    'main': function (id) {
        $.ajax({
            method: 'POST',
            url: '/admin/item/edit_main_image',
            data: {'item': $('input[name="item_id"]').val(), 'image': id},
            dataType: 'JSON',
            success: function (result) {
                if (result.error != undefined) {
                    callToast.error('Ошибка', result.error);
                    return false;
                }
                if (result.status == 'success') {
                    $('#now__main__image').remove();
                    $('#image__'+id).prepend('<h4 class="text-center" id="now__main__image">Главное изображение</h4>');
                    callToast.success('Главное изображение', 'успешно изменено');
                    return true;
                }
                callToast.error('Ошибка', 'При изменении главного изображения');
                return false;
            }
        });
    }
};
$(document).ready(function($) {
    Dropzone.options.addImagesToItem = {
        maxFilesize: 2,
        acceptedFiles: "image/*",
        sending: function(file, xhr, formData){
            formData.append('item_id', $('input[name="item_id"').val());
        },
        success: function (file, response) {
            console.log(response);
            if (response.errors != undefined) {
                insertErrorArray(
                    $('#form'),
                    response.errors,
                    $('#group_errors'), $('#errors_list')
                );
            }
            if (response.status == 'success') {
                $('#block__images').show();
                $('#body__item__images').prepend(
                    '<div class="col-md-4" id="image__'+response.image.id+'">'+
                        '<div class="thumbnail">'+
                            '<img src="/assets/images/items/'+response.image.preview_image_name+'" class="img-responsive">'+
                            '<div class="caption">'+
                                '<p>'+
                                    '<a id="'+response.image.id+'" onclick="item.main(this.id);" href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" role="button">Сделать главным</a>'+
                                    '<a id="'+response.image.id+'" onclick="item.remove(this.id);" href="javascript:void(0);" class="btn btn-danger waves-effect m-l-5" role="button">Удалить</a>'+
                                '</p>'+
                            '</div>'+
                        '</div>'+
                    '</div>');
            }
        }
    };
});
