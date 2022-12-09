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
                                    <li>
                                        <a href="{{route('admin/partners/create')}}">
                                            <i class="mdi mdi-plus"></i> Добавить
                                        </a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
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
                                        <th class="text-center">Адрес</th>
                                        <th class="text-center">Операции</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($page->partners) > 0)
                                        @foreach($page->partners as $item)
                                            <tr id="item_{{$item->id}}">
                                                <td class="text-center">
                                                    <img src="/assets/images/partners/{{$item->preview_image}}" class="img-responsive thumb-lg">
                                                </td>
                                                <td class="text-center">
                                                    {{$item->name}}
                                                </td>
                                                <td class="text-center">
                                                    {{$item->url}}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group m-b-10">
                                                        <a href="{{route('admin/partners/update', ['id' => $item->id])}}" class="btn btn-primary waves-effect">
                                                            <i class="mdi mdi-border-color"></i>
                                                        </a>
                                                        <button id="{{$item->id}}" onclick="partner.delete(this.id)" class="btn btn-danger waves-effect">
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
                                                    По запросу нет партнеров.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    {!! $page->partners->appends(request()->input())->render() !!}
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
    {!! script_ts('/assets/admin/js/project/partner.js') !!}
@endsection
