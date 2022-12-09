<div id="modal__add__category" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Добавити категорію</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__add__category" onclick="return false;">
                        <div class="col-md-12">
                            <div class="form-group" id="group__name__category">
                                <input type="text" class="form-control" id="name__category" placeholder="Введите назву категории">
                                <div id="errors" style="display: none;">

                                </div>
                            </div>
                            <div class="form-group" style="display: none;" id="group__add__cat">
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <div class="text-left" id="add__cat__error__list">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn__add__category" class="btn btn-success">
                    <i class="fi-plus"></i> Добавить
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>