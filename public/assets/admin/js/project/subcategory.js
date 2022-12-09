var subcategory = {
    'add': function () {
        $('#form__add__subcategory')[0].reset();
        $('#modal__add__subcategory').modal('show');
    },
    'remove': function (id) {
        setAttr('subcategory_id', id);
        $('#strong__name__subcategory').text($('#item__subcategory__name__'+id).text());
        $('#modal__delete__subcategory').modal('show');
    },
    'edit': function (id) {
        setAttr('subcategory_id', id);
        $('#edit__name__subcategory').val($('#item__subcategory__name__'+id).text().replace(/(^\s*)|(\s*)$/g, ''));
        $("#edit__category__subcategory option[value='null']").attr("selected", "selected");
        $('#modal__edit__subcategory').modal('show');
    },
    'edit_all': function (id) {
        setAttr('subcategory_id', id);
        setAttr('edit', 'all');
        $('#edit__name__subcategory').val($('#item__subcategory__name__'+id).text().replace(/(^\s*)|(\s*)$/g, ''));
        $("#edit__category__subcategory option[value='null']").attr("selected", "selected");
        $('#modal__edit__subcategory').modal('show');
    }
};
$(document).ready(function($) {
    $('#btn__add__subcategory').click(function () {
        var routName = $('#route__name').val();
        $.ajax({
            method: 'POST',
            url: '/admin/subcategory/add',
            data: {'name': $('#add__name__subcategory').val(), 'category': $("#add__category__subcategory :selected").val()},
            dataType: 'JSON',
            success: function (result) {
                if (result.errors != undefined) {
                    insertErrorArray(
                        $('#form__add__subcategory'),
                        result.errors,
                        $('#group__add__subcat'),
                        $('#add__subcat__error__list')
                    );
                    return false;
                }
                if (result.status == 'true') {
                    if ($('#alert__empty') != undefined) {
                        $('#alert__empty').remove();
                    }
                    if (routName == 'subcategory/main') {
                        $('tbody').prepend(
                            '<tr id="item__'+result.subcategory.id_subcategory+'">'+
                            '<th id="item__subcategory__name__'+result.subcategory.id_subcategory+'">'
                            +result.subcategory.subcategory_name+
                            '</th>'+
                            '<td class="text-center" id="item__category__name__'+result.subcategory.id_subcategory+'">'
                            +result.category_name+
                            '</td>'+
                            '<td class="text-center">'+
                            '<a href="/admin/items/'+result.subcategory.category_id+'/'+result.subcategory.id_subcategory+'" class="btn btn-primary btn-bordered waves-effect w-md waves-light">'+
                            '<i class="mdi mdi-cart-outline"></i>'+
                            '</a>'+
                            '</td>'+
                            '<td class="text-center">' +
                            '<button id="'+result.subcategory.id_subcategory+'" onclick="subcategory.edit_all(this.id)" class="btn btn-purple btn-bordered waves-effect w-md waves-light">'+
                            '<i class="mdi mdi-border-color"></i>'+
                            '</button>'+
                            '</td>'+
                            '<td class="text-center">'+
                            '<button id="'+result.subcategory.id_subcategory+'" onclick="subcategory.remove(this.id)" href="#" class="btn btn-danger btn-bordered waves-effect w-md waves-light">'+
                            '<i class="fa fa-trash-o"></i>'+
                            '</button>'+
                            '</td>'+
                            '</tr>');
                        callToast.success('Подкатегория', 'Успешно создана и добавлена в текущий список');
                        $('#form__add__subcategory')[0].reset();
                        return true;
                    }
                    if (routName == 'category/category_subcategories') {
                        if ($('#category__name').val() == result.category_name) {
                            $('tbody').prepend(
                                '<tr id="item__'+result.subcategory.id+'">'+
                                '<th id="item__subcategory__name__'+result.subcategory.id_subcategory+'">'
                                +result.subcategory.subcategory_name+
                                '</th>'+
                                '<td class="text-center" id="item__category__name__'+result.subcategory.id_subcategory+'">'
                                +result.category_name+
                                '</td>'+
                                '<td class="text-center">'+
                                '<a href="/admin/items/'+result.subcategory.category_id+'/'+result.subcategory.id_subcategory+'" class="btn btn-primary btn-bordered waves-effect w-md waves-light">'+
                                '<i class="mdi mdi-cart-outline"></i>'+
                                '</a>'+
                                '</td>'+
                                '<td class="text-center">' +
                                '<button id="'+result.subcategory.id_subcategory+'" onclick="subcategory.edit(this.id)" class="btn btn-purple btn-bordered waves-effect w-md waves-light">'+
                                '<i class="mdi mdi-border-color"></i>'+
                                '</button>'+
                                '</td>'+
                                '<td class="text-center">'+
                                '<button id="'+result.subcategory.id_subcategory+'" onclick="subcategory.remove(this.id)" href="#" class="btn btn-danger btn-bordered waves-effect w-md waves-light">'+
                                '<i class="fa fa-trash-o"></i>'+
                                '</button>'+
                                '</td>'+
                                '</tr>');
                            callToast.success('Подкатегория', 'Успешно создана и добавлена в текущий список');
                            $('#form__add__subcategory')[0].reset();
                            return true;
                        }
                    }
                }
                else {
                    callToast.error('Ошибка', 'При добавлении подкатегории');
                    return false;
                }
            }
        });
    });
    $('#btn__edit__subcategory').click(function () {
        var name = $('#edit__name__subcategory').val();
        var edit_status = $_GET('edit');
        var id = $_GET('subcategory_id');
        var category_id = $("#edit__category__subcategory :selected").val();
        var category_name = $("#edit__category__subcategory :selected").text();
        if (category_id == 'null') {
            var dataForm = {'id': id, 'name': name};
        }
        else {
            var dataForm = {'id': id, 'name': name, 'category': category_id};
        }
        $.ajax({
            method: 'POST',
            url: '/admin/subcategory/edit',
            data: dataForm,
            dataType: 'JSON',
            success: function (result) {
                if (result.errors != undefined) {
                    insertErrorArray(
                        $('#form__edit__subcategory'),
                        result.errors,
                        $('#group__edit__subcat'),
                        $('#edit__subcat__error__list')
                    );
                    return false;
                }
                if (result.status == 'true') {
                    if (category_name != $('#item__category__name__'+id).text().replace(/(^\s*)|(\s*)$/g, '')
                        && category_id != 'null') {
                        if (edit_status != undefined && edit_status == 'all') {
                            $('#item__category__name__'+id).text(category_name)
                        }
                        else {
                            $('#item__'+id).remove();
                        }
                    }
                    else {
                        $('#item__subcategory__name__'+id).text(name);
                    }
                    $('#modal__edit__subcategory').modal('hide');
                    callToast.success('Подкатегория', 'Успешно изменена');
                    return true;
                }
                else {
                    callToast.error('Ошибка', 'при изменении подкатегории');
                    return false;
                }
            }
        });
    });
    $('#yes__del__subcategory').click(function () {
        var id = $_GET('subcategory_id');
        $.ajax({
            method: 'POST',
            url: '/admin/subcategory/delete',
            data: {'id': id},
            dataType: 'JSON',
            success: function (result) {
                if (result.status == 'true') {
                    $('#item__'+id).remove();
                    $('#modal__delete__subcategory').modal('hide');
                    callToast.info('Подкатегория', 'Успешно удалена');
                    return true;
                }
                else {
                    callToast.error('Ошибка', 'при удалении подкатегории');
                    return false;
                }
            }
        });
    });
});