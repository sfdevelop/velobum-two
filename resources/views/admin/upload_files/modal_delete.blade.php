<div id="modal_delete_file" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content p-0 b-0">
            <div class="panel panel-color panel-danger">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title">Подтвердите удаление</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade in" role="alert">
                        <i class="mdi mdi-information"></i>
                        Вы действительно хотите удалить <strong id="delete_name"></strong> ?
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="file.delete()"><i class="dripicons-checkmark"></i> Удалить</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="dripicons-cross"></i> Отменить</button>
                </div>
            </div>
        </div>
    </div>
</div>