<div id="modal__contacts" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Управление контактами</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__contacts" onclick="return false;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" id="contacts__email" class="form-control" placeholder="Введите E-mail">
                                        <span class="help-block">
                                        <small>
                                            На этот E-mail будут приходить письма которые посетители отправили с сайта.
                                        </small>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" id="contacts__tel" class="form-control" placeholder="Введите контактный телефон">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea id="contacts__addresses" placeholder="Введите адресс" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="display: none;" id="group__errors__contacts">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <div class="text-left" id="contacts__error__list">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn__update__contacts">
                    <i class="dripicons-checkmark"></i> Изменить
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>