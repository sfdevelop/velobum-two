<div id="modal__about" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Изменить данные "О нас"</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__about" onclick="return false;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea id="about__value" placeholder="Введите данные" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="display: none;" id="group__errors__about">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <div class="text-left" id="about__error__list">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn__update__about">
                    <i class="dripicons-checkmark"></i> Изменить
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>