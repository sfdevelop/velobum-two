@extends('admin.layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?>
@endsection
@section('content')
    <div id="wrapper">
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')
    </div>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Древо категорий</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="{{route('categories/add_page')}}">
                                        <i class="mdi mdi-plus"></i> Добавить
                                    </a>
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-sub-title text-muted">
                                Кликните на элемент древа категорий, чтобы приступить к его изменению/удалению
                            </p>
                        </div>
                        <div class="panel-body">
                            @include('admin.includes.alerts.success_alerts')
                            @include('admin.includes.alerts.error_alerts')
                            {!! $categories !!}
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
    {!! script_ts('/assets/admin/js/project/category.js') !!}
@endsection