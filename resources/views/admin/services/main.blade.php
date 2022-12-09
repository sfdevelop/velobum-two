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
                                    @if ($page->route_name == 'services/search')
                                    <li>
                                        <a href="{{route('admin/services')}}">
                                            <i class="dripicons-arrow-thin-left"></i> Ко всем новостям
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('services/add_page')}}">
                                            <i class="mdi mdi-plus"></i> Добавить
                                        </a>
                                    </li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    @include('admin.services.form_search')
                    @include('admin.includes.alerts.error_alerts')
                    @include('admin.includes.alerts.success_alerts')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <table class="table table-striped m-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Изображение</th>
                                        <th class="text-center">Наименование</th>
                                        <th class="text-center">Превью текста</th>
                                        <th class="text-center">Дата добавления</th>
                                        <th class="text-center">Операции</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($page->services) > 0)
                                        @foreach($page->services as $service)
                                            <tr id="service__{{$service->id}}">
                                                <td>
                                                    @if($service->preview_image != null)
                                                        <img src="/assets/images/services/{{$service->preview_image}}" class="img-responsive thumb-lg">
                                                    @else
                                                        <img class="img-responsive thumb-lg" src="/assets/images/default.png" alt="image">
                                                    @endif
                                                </td>
                                                <td id="service__name__{{$service->id}}" class="text-left">
                                                    {{$service->topic}}
                                                </td>
                                                <td class="text-left">
                                                    {{str_limit(strip_tags($service->text), $limit = 50, $end = '...')}}
                                                </td>
                                                <td class="text-center">
                                                    {{$service->created_at}}
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group m-b-10">
                                                        <a href="/admin/services/edit/{{$service->id}}" class="btn btn-primary waves-effect">
                                                            <i class="mdi mdi-border-color"></i>
                                                        </a>
                                                        <button id="{{$service->id}}" onclick="service.delete(this.id)" class="btn btn-danger waves-effect">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-info alert-dismissible fade in" role="alert">
                                                    По запросу нет новостей.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                                <div class="text-center">
                                    {!! $page->services->appends(request()->input())->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.services.modals.delete')
        @include('admin.includes.setting')
        @include('admin.includes.contacts')
        @include('admin.includes.about')
        @endsection
        @section('my_scripts')
            {!! script_ts('/assets/admin/js/project/service.js') !!}
@endsection
