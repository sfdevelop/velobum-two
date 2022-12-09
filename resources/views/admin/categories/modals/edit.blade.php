<div id="modal__edit__category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Изменить категорию</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__edit__category" onclick="return false;">
                        <div class="col-md-12">
                            <div class="form-group" id="group__edit__name__category">
                                <input type="text" class="form-control" id="edit__name__category" placeholder="Введите новое наименование категории">
                                <div id="errors" style="display: none;">

                                </div>
                            </div>
                            <div class="form-group" style="display: none;" id="group__edit__cat">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <div class="text-left" id="edit__cat__error__list">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn__edit__category" class="btn btn-primary">
                    <i class="dripicons-checkmark"></i> Изменить
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>