@extends('admin.layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?>
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
                                    @if($page->route_name == 'services/add_page')
                                        Добавить новость
                                    @else
                                        Редактировать новость <strong class="text-custom">{{$page->service->topic}}</strong>
                                    @endif
                                </h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li>
                                        <a href="{{route('admin/services')}}"><i class="mdi mdi-arrow-left"></i> Ко всем новостям</a>
                                    </li>
                                    <li>
                                        <a href="{{route('services/add_page')}}"><i class="mdi mdi-plus"></i> Добавить еще</a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="col-md-12" id="block__now__image"
                                     @if($page->route_name == 'services/add_page')
                                     style="display: none;"
                                     @endif>

                                    <h5 class="text-center text-custom">Нынешнее изображение услуги</h5>
                                    <img @if($page->route_name == 'services/add_page') src="" @else src="/assets/images/services/{{$page->service->preview_image}}" @endif
                                        id="now__image" class="center-block img-responsive">
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                            <form id="form__add__service" class="form-horizontal" action="javascript:void(0)">
                                                @if($page->route_name == 'services/add_page')
                                                    <input type="hidden" id="service__id" value="null">
                                                @else
                                                    <input type="hidden" id="service__id" value="{{$page->service->id}}">
                                                @endif
                                                <div class="form-group">
                                                    <label class="control-label col-md-3"><span class="text-danger">*</span> Наименование</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="service__topic"
                                                               @if($page->route_name != 'services/add_page')
                                                               value="{{$page->service->topic}}"
                                                               @endif
                                                               placeholder="Введите наименование">
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
                                                                    <input id="service__image" type="file" class="btn-default" />
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Дата добавления</label>
                                                    <div class="col-md-9">
                                                        <input id="date__service" type="date" @isset($page->service->created_at) value="{{$page->service->created_at->toDateString()}}" @endisset class="form-control">
                                                        @if($page->route_name == 'services/add_page')
                                                            <span class="help-block"><small>Если оставить это поле не заполненым "Дата добавления" будет соотвествовать текущей дате</small></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5 class="text-center"><span class="text-danger">*</span> Введите описание</h5>
                                                    <div class="col-md-12">
                                                        <div class="editor" id="service__text">@if($page->route_name != 'services/add_page') {!! $page->service->text !!} @endif</div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="display: none;" id="group__add__service">
                                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                       <div class="text-left" id="add__service__error__list">

                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-right m-b-0">
                                                    @if($page->route_name == 'services/add_page')
                                                    <button id="btn__add__service" class="btn btn-primary btn-lg waves-effect waves-light">
                                                        Создать
                                                    </button>
                                                    <button id="btn__edit__service" style="display: none;" class="btn btn-primary btn-lg waves-effect waves-light">
                                                        Изменить
                                                    </button>
                                                    @else
                                                        <button id="btn__edit__service" class="btn btn-primary btn-lg waves-effect waves-light">
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
        @include('admin.includes.setting')
        @include('admin.includes.contacts')
        @include('admin.includes.about')
@endsection
@section('my_scripts')
    {!! script_ts('/assets/admin/plugins/jquery.filer/js/jquery.filer.min.js') !!}
    {!! script_ts('/assets/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.js') !!}
    {!! script_ts('/assets/admin/pages/jquery.fileuploads.init.js') !!}
    {!! script_ts('/assets/admin/js/project/service.js') !!}
@endsection
