var service = {
    'delete': function (id) {
        setAttr('service_id', id);
        $('#strong__name__service').text($('#service__name__'+id).text());
        $('#modal__delete__service').modal('show');
    }
};
$(document).ready(function($) {
    $('#yes__del__service').click(function () {
        $.ajax({
            method: 'POST',
            url: '/admin/service/delete',
            data: {'id': $_GET('service_id')},
            dataType: 'JSON',
            success: function (result) {
                if (result.status == 'success') {
                    $('#service__'+$_GET('service_id')).remove();
                    $('#modal__delete__service').modal('hide');
                    callToast.success('Сервис', 'успешно удален');
                    return true;
                }
                callToast.success('Ошибка', 'при удалении сервиса');
            }
        });
    });

    $('#btn__edit__service').click(function () {
        var formData = new FormData();
        if ($('#service__image')[0].files[0] != undefined) {
            formData.append('id', $('#service__id').val());
            formData.append('image', $('#service__image')[0].files[0]);
            formData.append('topic', $('#service__topic').val());
            formData.append('text', textboxio.replace('#service__text').content.get());
        }
        else {
            formData.append('id', $('#service__id').val());
            formData.append('topic', $('#service__topic').val());
            formData.append('text', textboxio.replace('#service__text').content.get());
        }
        formData.append('date', $('#date__service').val());
        $.ajax({
            url: '/admin/service/edit',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.errors != undefined) {
                    insertErrorArray(
                        $('#form__add__service'),
                        result.errors,
                        $('#group__add__service'),
                        $('#add__service__error__list')
                    );
                    return false;
                }
                if (result.status == 'success') {
                    if (result.new_image != undefined) {
                        $('#now__image').attr('src', '/assets/images/services/'+result.new_image);
                    }
                    callToast.success('Сервис', 'успешно изменен');
                    return true;
                }
                callToast.error('Ошибка', 'при выполнении операции');
                return true;
            }
        });
    });

    $("#btn__add__service").click(function () {
        var formData = new FormData();
        if ($('#service__image')[0].files[0] != undefined) {
            formData.append('image', $('#service__image')[0].files[0]);
            formData.append('topic', $('#service__topic').val());
            formData.append('text', textboxio.replace('#service__text').content.get());
        }
        else {
            formData.append('topic', $('#service__topic').val());
            formData.append('text', textboxio.replace('#service__text').content.get());
        }
        formData.append('date', $('#date__service').val());
        $.ajax({
            url: '/admin/service/add',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.errors != undefined) {
                    insertErrorArray(
                        $('#form__add__service'),
                        result.errors,
                        $('#group__add__service'),
                        $('#add__service__error__list')
                    );
                    return false;
                }
                if (result.status == 'success') {
                    $('#service__id').val(result.service_id);
                    $('#now__image').attr('src', '/assets/images/services/'+result.image);
                    $('#date__service').val(result.date);
                    $('#block__now__image').show();
                    $('#btn__add__service').hide();
                    $('#btn__edit__service').show();
                    callToast.success('Сервис', 'успешно создан');
                    return true;
                }
                callToast.error('Ошибка', 'при выполнении операции');
                return true;
            }
        });
    });
});