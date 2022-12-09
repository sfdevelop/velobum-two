<div id="modal_delete_slide" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                        Вы действительно хотите удалить этот слайд?
                    </div>
                </div>
                <div class="panel-footer text-right">
                    @if($page->route_name == 'admin/slides/update')
                    <a href="{{route('admin/slide/delete', ['id' => $page->item_id])}}" class="btn btn-danger waves-effect waves-light"><i class="dripicons-checkmark"></i> Удалить</a>
                    @else
                    <a href="" id="href_delete" type="button" class="btn btn-danger waves-effect waves-light"><i class="dripicons-checkmark"></i> Удалить</a>
                    @endif
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="dripicons-cross"></i> Отмена</button>
                </div>
            </div>
        </div>
    </div>
</div>