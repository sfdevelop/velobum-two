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
                                <h4 class="page-title">{{$page->title}}</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    @if($page->route_name == 'admin/upload_files/search')
                                        <li>
                                            <a href="{{route('admin/upload_files')}}">
                                                <i class="dripicons-arrow-thin-left"></i> Ко всем файлам
                                            </a>
                                        </li>
                                    @endif
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @include('admin.upload_files.form_add_search')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <table class="table table-striped m-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-left">Наименование</th>
                                        <th class="text-center">Ссылка на файл</th>
                                        <th class="text-center">Дата добавления</th>
                                        <th class="text-center">Операции</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($page->files) > 0)
                                        @foreach($page->files as $file)
                                            <tr id="item_{{$file->id}}">
                                                <td class="text-center">
                                                    <?php $url = 'assets/images/file_icons/'.$file->exp.'.svg'; ?>
                                                    @if(\Illuminate\Support\Facades\File::exists($url))
                                                        <img class="thumb-sm" src="{{asset($url)}}" title="flash_on.svg">
                                                    @else
                                                        <img class="thumb-sm" src="{{asset('assets/images/icons/file.svg')}}" title="file.svg">
                                                    @endif
                                                </td>
                                                <td class="text-center" id="name_{{$file->id}}">
                                                    {{$file->name}}
                                                </td>
                                                <td class="text-left">
                                                    <?php $url = 'assets/uploads/'.$file->name_file; ?>
                                                    <strong id="url_{{$file->id}}">{{url()->to($url)}}</strong>
                                                </td>
                                                <td class="text-center">
                                                    {{$file->created_at}}
                                                </td>
                                                <td class="text-center">
                                                    <button id="brn_copy"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Скопировать ссылку"
                                                            class="btn_copy btn btn-primary" data-clipboard-target="#url_{{$file->id}}">
                                                        <i class="mdi mdi-content-copy"></i>
                                                    </button>
                                                    <button data-toggle="tooltip" data-placement="top"
                                                            title="Удалить файл"
                                                            class="btn btn-danger" onclick="file.modal({{$file->id}})">
                                                        <i class=" dripicons-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr id="item_alert">
                                            <td colspan="5">
                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                    По запросу нет файлов.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    {!! $page->files->appends(request()->input())->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.upload_files.modal_delete')
    @include('admin.includes.setting')
    @include('admin.includes.contacts')
    @include('admin.includes.about')
@endsection
@section('my_scripts')
    {!! script_ts('/assets/admin/js/project/fileUpload.js') !!}
    {!! script_ts('/assets/admin/js/clipboard.min.js') !!}
@endsection
