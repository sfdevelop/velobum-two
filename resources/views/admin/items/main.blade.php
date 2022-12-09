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
                                    @if($page->route_name == 'admin/items/search')
                                        <li>
                                            <a href="{{route('admin/items')}}">
                                                <i class="dripicons-arrow-thin-left"></i> Ко всем товарам
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{route('item/add_page')}}">
                                            <i class="mdi mdi-plus"></i> Добавить
                                        </a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @include('admin.items.form_search')
                    @include('admin.includes.alerts.error_alerts')
                    @include('admin.includes.alerts.success_alerts')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <table class="table table-striped m-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-left">Наименование</th>
                                        <th class="text-center">Цена</th>
                                        <th class="text-center">Категория</th>
                                        <th class="text-center">Порядок сорт.</th>
                                        <th class="text-center">Отобр. на сайте</th>
                                        <th class="text-center">Дата добавления</th>
                                        <th class="text-center">Операции</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($page->items) > 0)
                                        @foreach($page->items as $item)
                                            <tr id="item__{{$item->id}}">
                                                <td>
                                                    @if($item->preview_image_name != null)
                                                        <img src="/assets/images/items/{{$item->preview_image_name}}" class="img-responsive thumb-lg">
                                                    @else
                                                        <img class="img-responsive" src="/assets/images/img-default.png" alt="image">
                                                    @endif
                                                </td>
                                                <td id="item__name__{{$item->id}}" class="text-left">
                                                    {{$item->name}}
                                                </td>
                                                <td class="text-center">
                                                    @if(isset($item->price) && isset($item->share_price))
                                                        <del class="text-danger">{{$item->price}}</del>
                                                        {{$item->share_price}}
                                                    @endif
                                                    @if(isset($item->price) && !isset($item->share_price))
                                                        {{$item->price}}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{$item->category}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->sorting_order}}
                                                </td>
                                                <td class="text-center">
                                                    @if($item->status)
                                                        Да
                                                    @else
                                                        Нет
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{$item->created_at}}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group m-b-10">
                                                        <a href="{{route('item/edit_page', ['id' => $item->id])}}" class="btn btn-primary waves-effect">
                                                            <i class="mdi mdi-border-color"></i>
                                                        </a>
                                                        <button id="{{$item->id}}" onclick="item.delete(this.id)" class="btn btn-danger waves-effect">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">
                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                    По запросу нет товаров.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    {!! $page->items->appends(request()->input())->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.items.modals.delete')
        @include('admin.includes.setting')
        @include('admin.includes.contacts')
        @include('admin.includes.about')
@endsection
@section('my_scripts')
    {!! script_ts('/assets/admin/js/project/item.js') !!}
@endsection
