<div id="modal__setting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ностройки профиля</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__edit__pass" onclick="return false;">
                        <div class="col-md-12">
                            <h4>Изменить пароль</h4>
                            <p class="text-muted font-14 m-b-20">
                                Только символы латинского алфавита и цифры.
                            </p>
                            <div class="form-group" id="group__now__pass">
                                <input type="password" class="form-control" id="now__pass" placeholder="Введите нынешний пароль">
                                <div id="errors" style="display: none;">

                                </div>
                            </div>
                            <div class="form-group" id="group__new__pass1">
                                <input type="password" class="form-control" id="new__pass1" placeholder="Введите новый пароль">
                                <div id="errors" style="display: none;">

                                </div>
                            </div>
                            <div class="form-group" id="group__new__pass2">
                                <input type="password" class="form-control" id="new__pass2" placeholder="Повторите ввод нового пароля">
                                <div id="errors" style="display: none;">

                                </div>
                            </div>
                            <div class="form-group" style="display: none;" id="group__errors__edit__pass">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <div class="text-left" id="setting__error__list">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn__edit__pass">
                    <i class="dripicons-checkmark"></i> Изменить
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>