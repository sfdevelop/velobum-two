<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <form id="form_add_file" class="form-horizontal" action="javascript:void(0);">
                <div class="form-group">
                    <label class="col-md-3 control-label">Наименование файла</label>
                    <div class="col-md-9">
                        <input id="add_name" name="add_name" placeholder="Введите наименование файла" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Выберите файл</label>
                    <div class="col-md-9">
                        <input id="file" type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button id="btn_upload_file" class="btn btn-success btn-lg">
                                Загрузить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box">
            <form id="form_search" method="GET" class="form-horizontal" action="{{route('upload_files/search')}}">
                <div class="form-group">
                    <label class="col-md-3 control-label">Наименование файла</label>
                    <div class="col-md-9">
                        <input id="name_search" @isset($page->old_name_search) value="{{$page->old_name_search}}" @endisset name="name_search" placeholder="Введите наименование для поиска" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_start" class="col-md-2 control-label">От</label>
                            <div class="col-md-10">
                                <input @isset($page->old_date_start) value="{{$page->old_date_start}}" @endisset type="date" id="date_start" name="date_start" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_end" class="col-md-2 control-label">До</label>
                            <div class="col-md-10">
                                <input @isset($page->old_date_end) value="{{$page->old_date_end}}" @endisset type="date" id="date_end" name="date_end" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-lg">
                                Поиск
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    @include('admin.includes.alerts.error_ajax')
    @include('admin.includes.alerts.error_alerts')
    @include('admin.includes.alerts.success_alerts')
</div>