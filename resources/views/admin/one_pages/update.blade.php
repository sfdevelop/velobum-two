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
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="form_update_one_page" class="form-horizontal" action="javascript:void(0)">
                                            <input type="hidden" name="id" id="id" value="{{$page->id}}">
                                            <div class="form-group">
                                                <h5 class="text-center">Радактировать данные страницы</h5>
                                                <div class="col-md-12">
                                                    <div class="editor" id="value">{!!$page->value!!}</div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;" id="group_error">
                                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                    <div class="text-left" id="error_list">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right m-b-0">
                                                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">
                                                    Изменить
                                                </button>
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
    {!! script_ts('/assets/admin/js/project/onePage.js') !!}
@endsection
