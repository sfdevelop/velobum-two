@extends('admin.layouts.main')
@section('title')
    {{$page->title}}
@endsection
@section('content')
    <div id="wrapper">
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')
    </div>
    <div class="content-page">
        <div class="content">
            <input type="hidden" id="item_id" value="null">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">{{$page->title}}</h4>
                            <ol class="breadcrumb p-0 m-0">
                                <li>
                                    <a href="{{route('categories/main')}}">
                                        <i class="dripicons-arrow-thin-left"></i> Назад
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('categories/add_page')}}">
                                        <i class="mdi mdi-plus"></i> Добавить
                                    </a>
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-box">
                            @if($page->route_name == 'categories/add_page')
                            <form id="form" action="{{route('category/add')}}" class="form-horizontal" role="form" onclick="return false;">
                                <input type="hidden" name="item_id" value="null">
                            @else
                            <form id="form" action="{{route('category/update')}}" class="form-horizontal" role="form" onclick="return false;">
                                <input type="hidden" name="item_id" value="{{$page->category->id}}">
                            @endif
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><span class="text-danger">*</span> Наименование</label>
                                    <div class="col-md-10">
                                        <input @isset($page->category->name)
                                                value="{{$page->category->name}}"
                                               @endisset
                                               id="name" name="name" type="text" class="form-control" placeholder="Введите наименование">
                                    </div>
                                </div>
                                @if($page->route_name == 'categories/add_page')
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-danger">*</span> Порядок сортировки</label>
                                        <div class="col-md-10">
                                            <input value="0" id="sorting_order" name="sorting_order" class="form-control" placeholder="Введите порядок сортировки">
                                            <span class="help-block">
                                                <small>Чем ближе значение порядка сортировки к 0 тем выше категория в древе категории. Порядок сортировки действует по веткам древа.</small>
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><span class="text-danger">*</span> Порядок сортировки</label>
                                        <div class="col-md-10">
                                            <input value="{{$page->category->sorting_order}}" id="sorting_order" name="sorting_order" class="form-control" placeholder="Введите порядок сортировки">
                                            <span class="help-block">
                                                <small>Чем ближе значение порядка сортировки к 0 тем выше категория в древе категории. Порядок сортировки действует по веткам древа.</small>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><span class="text-danger">*</span> Выберите родительскую категорию</label>
                                    <div class="col-md-10">
                                        <div id="parents_block">
                                            {!! $page->parents !!}
                                        </div>
                                        <span class="help-block">
                                            <small>Не определено - если хотите чтобы это была родительская категория</small>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;" id="group_errors">
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <div class="text-left" id="errors_list">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2"></label>
                                    <div class="col-md-10">
                                        <div class="pull-right">
                                            @if($page->route_name == 'categories/add_page')
                                                <button id="btn_add" class="btn btn-success btn-lg" onclick="category.add()">
                                                    Добавить
                                                </button>
                                                <button style="display: none;" id="btn_update" class="btn btn-success btn-lg" onclick="category.update()">
                                                    Обновить данные
                                                </button>
                                            @else
                                                <button class="btn btn-danger btn-lg" onclick="$('#modal_category_delete').modal('show');">
                                                    Удалить
                                                </button>
                                                <button id="btn_update" class="btn btn-success btn-lg" onclick="category.update()">
                                                    Обновить данные
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($page->route_name == 'categories/update_page')
        @include('admin.categories.modals.delete')
    @endif
    @include('admin.includes.setting')
    @include('admin.includes.contacts')
    @include('admin.includes.about')
@endsection
@section('my_scripts')
    {!! script_ts('/assets/admin/js/project/category.js') !!}
@endsection