var item = {
    'delete': function (id) {
        setAttr('item_id', id);
        $('#modal__item__name').text($('#item__name__'+id).text());
        $('#modal__delete__item').modal('show');
    }
};
$(document).ready(function($) {
    $('#btn__search').click(function () {
        var text = $('#search__text').val();
        var option = $('#search__option').val();
        window.location.href = '/admin/items/search/'+option+'/'+text;
    });
    $('#yes__del__item').click(function () {
        $.ajax({
            method: 'POST',
            url: '/admin/item/delete',
            data: {'id':$_GET('item_id')},
            dataType: 'JSON',
            success: function (result) {
                if (result.status == 'success') {
                    $('#item__'+$_GET('item_id')).remove();
                    cleanGetParam();
                    $('#modal__delete__item').modal('hide');
                    callToast.success('Товар', 'успешно удален');
                    return true;
                }
                callToast.error('При удалении товара', 'возникла ошибка');
            }
        });
    });
});