@extends('admin.layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?> | {{$page->title}}
@endsection
@section('content')
    <div id="wrapper">
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">
                                    {{$page->title}}
                                </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="{{route('admin/partners')}}">
                                        <i class="mdi mdi-arrow-left"></i> Ко всем партнерам
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin/partners/create')}}">
                                        <i class="mdi mdi-plus"></i> Добавить еще
                                        </a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="col-md-12" id="block_active_image"
                                     @if($page->route_name == 'admin/partners/create')
                                        style="display: none;"
                                     @endif >

                                    <h5 class="text-center text-custom">Активное изображение партнера</h5>
                                    <img @if($page->route_name == 'admin/partners/create') src="" @else src="/assets/images/partners/{{$page->partner->preview_image}}" @endif
                                        id="active_image" class="center-block img-responsive">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="form_work_on" class="form-horizontal" action="javascript:void(0)">
                                            @if($page->route_name == 'admin/partners/create')
                                                <input type="hidden" name="item_id" value="null">
                                            @else
                                                <input type="hidden" name="item_id" value="{{$page->item_id}}">
                                            @endif
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><span class="text-danger">*</span> Наименование</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="name"
                                                            @if($page->route_name != 'admin/partners/create')
                                                            value="{{$page->partner->name}}"
                                                            @endif
                                                            placeholder="Введите наименование">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><span class="text-danger">*</span> Ссылка на сайт</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="url"
                                                            @if($page->route_name != 'admin/partners/create')
                                                            value="{{$page->partner->url}}"
                                                            @endif
                                                            placeholder="Введите ссылку на сайт партнера">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3"><span class="text-danger">*</span> Изображение</label>
                                                <div class="col-md-9">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                        <div>
                                                            <button type="button" class="btn btn-default btn-file">
                                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Выбрать изображение</span>
                                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Выбрать другое изображение</span>
                                                                <input id="image" type="file" class="btn-default" />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;" id="group_error">
                                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                    <div class="text-left" id="error_list">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right m-b-0">
                                                @if($page->route_name == 'admin/partners/create')
                                                    <button id="btn_create" class="btn btn-primary btn-lg waves-effect waves-light">
                                                        Добавить
                                                    </button>
                                                    <button id="btn_update" style="display: none;" class="btn btn-primary btn-lg waves-effect waves-light">
                                                        Изменить
                                                    </button>
                                                @else
                                                    <button onclick="$('#modal_delete_partner').modal('show');" class="btn  btn-danger btn-lg waves-effect waves-light">
                                                        Удалить
                                                    </button>
                                                    <button id="btn_update" class="btn btn-primary btn-lg waves-effect waves-light">
                                                        Изменить
                                                    </button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partners.modal_delete')
        @include('admin.includes.setting')
        @include('admin.includes.contacts')
        @include('admin.includes.about')
@endsection
@section('my_scripts')
    {!! script_ts('/assets/admin/plugins/jquery.filer/js/jquery.filer.min.js') !!}
    {!! script_ts('/assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js') !!}
    {!! script_ts('/assets/admin/pages/jquery.fileuploads.init.js') !!}
    {!! script_ts('/assets/admin/js/project/partner.js') !!}
@endsection
