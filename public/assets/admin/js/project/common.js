var csrf_token = $('input[name="_token"]').val();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
});
//получаем get параметр
function $_GET(key) {
    var s = window.location.search;
    s = s.match(new RegExp(key + '=([^&=]+)'));
    return s ? s[1] : false;
}
//добавляет get параметр в адресную строку
function setAttr(prmName,val){
    var res = '';
    var d = location.href.split("#")[0].split("?");
    var base = d[0];
    var query = d[1];
    if(query) {
        var params = query.split("&");
        for(var i = 0; i < params.length; i++) {
            var keyval = params[i].split("=");
            if(keyval[0] != prmName) {
                res += params[i] + '&';
            }
        }
    }
    res += prmName + '=' + val;
    window.history.pushState(null, null, base + '?' + res);
    return false;
}
//очищаем все параметры get
function cleanGetParam() {
    var query = window.location.search.substring(1)
    if(query.length) {
        if(window.history != undefined && window.history.pushState != undefined) {
            window.history.pushState({}, document.title, window.location.pathname);
        }
    }
}

function openSetting() {
    $('#modal__setting').modal('show');
}
function insertErrorArray(form, errorData, blockView, insertInto) {
    blockView.show();
    var keys = Object.keys(errorData);
    for (var i in keys) {
        for (var j in errorData[keys[i]]) {
            insertInto.append(
                '<p>'+
                errorData[keys[i]][j]+
                '</p>'
            );
        }
    }
    form.click(function () {
        blockView.hide();
        insertInto.html(null);
    })
}
function insertError(text_error, form, selector, insertInto) {
    insertInto.text(text_error);
    selector.show();
    form.click(function () {
        selector.hide();
        insertInto.text(null);
    });
    return false;
}

function insertErrorOnValid(textError, insertInto, input) {
    insertInto.html(null);
    insertInto.html(
        '<ul class="parsley-errors-list filled">'+
        '<li>' +
        textError +
        '</li>'+
        '</ul>'
    );
    insertInto.show();
    input.click(function () {
        insertInto.hide();
        insertInto.html(null);
    });
}
function validateData(input, min, max, group, option) {
    var value = $('#'+input).val();
    var insertInto = $('#'+group+' > #errors');
    if (value.length > max || value.length < min) {
        insertErrorOnValid('Должно быть не больше '+max+' и не меньше '+min+' символов', insertInto, $('#'+input));
        return false;
    }
    if (option === 1) {
        var exp = /[0-9a-zA-Z]/g;
        if (!exp.test(value.toString())) {
            insertErrorOnValid('Имеет недопустимые символы', insertInto, $('#'+input));
            return false;
        }
    }
    return true;
}
var callToast = {
    'error': function (textHead, textError) {
        $.toast({
            heading: textHead,
            text:textError,
            position:"top-right",
            loaderBg:"#bf441d",
            icon:"error",
            hideAfter:3e3,stack:1
        });
    },
    'success': function (textHead, textSuccess) {
        $.toast({
            heading:textHead,
            text:textSuccess,
            position:"top-right",
            loaderBg:"#5ba035",
            icon:"success",
            hideAfter:3e3,stack:1
        });
    },
    'info': function (textHead, textSuccess) {
        $.toast({
            heading:textHead,
            text:textSuccess,
            position:"top-right",
            loaderBg:"#3767a0",
            icon:"info",
            hideAfter:3e3,stack:1
        });
    }
};
(function ($) {
    $(document).ready(function() {
        $('*.editor').css('height', '350');
        var config = {
            autosubmit: false,
            images : {
                editing : {
                    enabled : false
                },
                upload : {
                    handler: function (data, success, failure) {
                        var formData = new FormData();
                        formData.append('image', data.blob());
                        $.ajax({
                            method: "POST",
                            url: '/admin/image/upload',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                success(response);
                            }
                        });
                    }
                }
            },
            codeview: {
                enabled : false
            },
            basePath : '/assets/admin/js/textboxio/'
        };
        var editor = textboxio.replaceAll('.editor', config);

        $('#btn__edit__pass').click(function () {
            if (validateData('now__pass', 5, 32, 'group__now__pass', 1) &&
                validateData('new__pass1', 8, 32, 'group__new__pass1', 1) &&
                validateData('new__pass2', 8, 32, 'group__new__pass2', 1)
            ) {
                var newPass1 = $('#new__pass1').val();
                var newPass2 = $('#new__pass2').val();
                if (newPass1 !== newPass2) {
                    var form = $('#form__edit__pass');
                    var group = $('#group__errors__edit__pass');
                    var insert = $('#error__list');
                    insert.html(null);
                    insert.text('Новый пароль не совпадает в полях ввода. Введите данные по новой.');
                    group.show();
                    form.click(function () {
                        group.hide();
                        insert.html(null);
                    });
                    return false;
                }
                $.ajax({
                    method: 'POST',
                    url: '/admin/setting/edit_pass',
                    data: {
                        _token: csrf_token,
                        'now_pass': $('#now__pass').val(),
                        'new_pass1': newPass1,
                        'new_pass2': newPass2
                    },
                    dataType: 'JSON',
                    success: function (result) {
                        var form = $('#form__edit__pass');
                        var selector = $('#group__errors__edit__pass');
                        var insertInto = $('#setting__error__list');

                        if (result.errors) {
                            insertErrorArray(
                                form,
                                result.errors,
                                selector,
                                insertInto
                            );
                            return false;
                        }
                        if (result.error !== undefined) {
                            insertError(
                                result.error,
                                form, selector, insertInto
                            );
                        }
                        if (result.status === 'true') {
                            callToast.success('Пароль', 'успешно изменен');
                            return true;
                        }
                    }
                })
            }
        });

        $('#btn__modal__contacts').click(function () {
            $.ajax({
                method: 'POST',
                url: '/admin/contacts/get',
                dataType: 'JSON',
                success: function (result) {
                    $('#contacts__email').val(result.email);
                    $('#contacts__tel').val(result.tel);
                    $('#contacts__addresses').val(result.addresses);
                    $('#modal__contacts').modal('show');
                }
            });
        });

        $('#btn__update__contacts').click(function () {
            $.ajax({
                method: 'POST',
                url: '/admin/contacts/update',
                data: {
                    'email': $('#contacts__email').val(),
                    'tel': $('#contacts__tel').val(),
                    'addresses': $('#contacts__addresses').val()
                },
                dataType: 'JSON',
                success: function (result) {
                    if (result.errors != undefined) {
                        insertErrorArray(
                            $('#form__contacts'),
                            result.errors,
                            $('#group__errors__contacts'),
                            $('#contacts__error__list')
                        );
                        return false;
                        return false;
                    }
                    if (result.status == 'success') {
                        callToast.success('Контакты', 'успешно изменены');
                        return true;
                    }
                    callToast.error('Ошибка', 'при изменении контактов');
                    return false;
                }
            });
        });

        $('#btn__modal__about').click(function () {
            $.ajax({
                method: 'POST',
                url: '/admin/text_page/get',
                data: {'category': 1},
                dataType: 'JSON',
                success: function (result) {
                    $('#about__value').val(result.value);
                    $('#modal__about').modal('show');
                }
            });
        });

        $('#btn__update__about').click(function () {
            $.ajax({
                method: 'POST',
                url: '/admin/text_page/update',
                data: {
                    'category': 1,
                    'value': $('#about__value').val()
                },
                dataType: 'JSON',
                success: function (result) {
                    if (result.errors != undefined) {
                        insertErrorArray(
                            $('#form__about'),
                            result.errors,
                            $('#group__errors__about'),
                            $('#about__error__list')
                        );
                        return false;
                        return false;
                    }
                    if (result.status == 'success') {
                        callToast.success('Данные', 'успешно изменены');
                        return true;
                    }
                    callToast.error('Ошибка', 'при изменении данных');
                    return false;
                }
            });
        });
    });
})(jQuery);
