<div id="modal__search" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Поиск по товарам</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="form__search" onclick="return false;">
                        <div class="col-md-12">
                            <label class="col-md-2 control-label">Я ищу:</label>
                            <div class="col-md-10">
                                <div class="form-group" id="group__search__text">
                                    <input type="text" class="form-control" id="search__text" placeholder="Введите текст для поиска">
                                    <div id="errors" style="display: none;">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Искать в</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="search__option">
                                        <option value="0">наименованиях</option>
                                        <option value="1">наименованиях и описанию</option>
                                    </select>
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
                <button id="btn__search" class="btn btn-success">
                    <i class="pe-7s-search"></i> Поиск
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                    <i class="dripicons-cross"></i> Закрыть
                </button>
            </div>
        </div>
    </div>
</div>