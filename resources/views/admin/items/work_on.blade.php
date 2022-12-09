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
                            @if($page->route_name == 'item/add_page')
                                <h4 class="page-title">
                                    Добавить товар
                                </h4>
                            @elseif($page->route_name == 'item/edit_page')
                                <h4 class="page-title">
                                    Изменить данные о <strong class="text-custom">{{$page->item->name}}</strong>
                                </h4>
                            @endif
                                <ol class="breadcrumb p-0 m-0">
                                    @if($page->route_name == 'item/add_page')
                                        <li>
                                            <a href="{{route('admin/items')}}"><i class="mdi mdi-arrow-left"></i> Вернуться назад</a>
                                        </li>
                                        <li>
                                            <a href="{{route('item/add_page')}}"><i class="mdi mdi-plus"></i> Добавить еще</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{url()->previous()}}"><i class="mdi mdi-arrow-left"></i> Вернуться назад</a>
                                        </li>
                                    @endif
                                </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-box">
                        <form id="form" action="javascript:void(0);">
                            <input type="hidden"
                                   @if($page->route_name == 'item/edit_page')
                                        value="{{$page->item->id}}"
                                   @else
                                        value="null"
                                   @endif
                                   name="item_id">
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="item__name"><span class="text-danger">*</span> Наименование</label>
                                            <input @if($page->route_name == 'item/edit_page')
                                                    value="{{$page->item->name}}"
                                                   @endif
                                                   type="text"
                                                   class="form-control"
                                                   name="name"
                                                   placeholder="Введите наименование">
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Цена</label>
                                            <input @if($page->route_name == 'item/edit_page')
                                                   value="{{$page->item->price}}"
                                                   @endif
                                                   type="text"
                                                   class="form-control"
                                                   name="price"
                                                   placeholder="Введите цену">
                                        </div>
                                        <div class="form-group">
                                            <label for="item__share__price">Акционная цена</label>
                                            <input @if($page->route_name == 'item/edit_page')
                                                   value="{{$page->item->share_price}}"
                                                   @endif
                                                   type="text"
                                                   class="form-control"
                                                   name="share_price"
                                                   placeholder="Введите акционную цену">
                                            <span class="help-block">
                                                <small>
                                                    Оставте это поле пустым если это не акционный товар.
                                                    Если поле не пустое и вы удалите значение в нем сохранив изменения - товар перестанет быть акционным.
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="parent_id"><span class="text-danger">*</span> Категория</label>
                                            {!! $page->tree !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="sorting_order"><span class="text-danger">*</span> Порядок сортировки</label>
                                                <input @if(isset($page->item->sorting_order))
                                                            value="{{$page->item->sorting_order}}"
                                                       @else
                                                            value="0"
                                                       @endif
                                                       type="text"
                                                       class="form-control"
                                                       name="sorting_order"
                                                       placeholder="Введите порядок сортировки">
                                            <span class="help-block">
                                                <small>
                                                    Чем ближе это значение к нулю тем выше товар находится в списке товаров
                                                </small>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="status"><span class="text-danger">*</span> Отображать на сайте?</label>
                                            @if($page->route_name == 'item/edit_page')
                                                <select id="status" name="status" class="form-control">
                                                    <option value="1" @if ($page->item->status) selected @endif>Да</option>
                                                    <option value="0" @if (!$page->item->status) selected @endif>Нет</option>
                                                </select>
                                            @else
                                                <select id="status" name="status" class="form-control">
                                                    <option value="1" selected>Да</option>
                                                    <option value="0">Нет</option>
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5 class="text-center"><span class="text-danger">*</span> Описание товара</h5>
                                        <div class="editor" id="item_description">@if($page->route_name == 'item/edit_page'){!! $page->item->description !!}@endif</div>
                                    </div>
                                    <div class="form-group" style="display: none;" id="group_errors">
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <div class="text-left" id="errors_list">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="pull-right">
                                            @if($page->route_name == 'item/edit_page')
                                                <button id="btn_edit" onclick="item.edit()" type="button" class="btn btn-lg btn-primary btn-bordered waves-effect w-md waves-light">
                                                    Обновить данные
                                                </button>

                                            @else
                                                <button id="btn_add" onclick="item.add();" type="button" class="btn btn-lg btn-primary btn-bordered waves-effect w-md waves-light">
                                                    Создать
                                                </button>
                                                <button id="btn_edit" onclick="item.edit()" type="button" style="display: none;" class="btn btn-lg btn-primary btn-bordered waves-effect w-md waves-light">
                                                    Обновить данные
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b>Загрузить новые изображения</b></h4>
                        <span class="help-block">
                            <small>
                                Для того чтобы добавить изображение к товару нужно: заполнить форму добавления товара; Нажать кномку "Создать" после можно добавлять изображения к товару.
                            </small>
                        </span>
                        <hr>
                        <div class="row m-t-20">
                            <form method="post" class="dropzone" id="addImagesToItem" action="{{route('images_item/add')}}">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-box" id="block__images" @if($page->route_name == 'item/add_page') tyle="display: none;" @endif>
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="m-t-0 header-title"><b>Список изображений товара</b></h4><hr>
                            <div class="row" id="body__item__images">
                                @if($page->route_name == 'item/edit_page')
                                    @foreach($page->all_item_images as $image)
                                        <div class="col-md-4" id="image__{{$image->id}}">
                                            @if($image->status_main == true)
                                                <h4 class="text-center" id="now__main__image">Главное изображение</h4>
                                            @endif
                                            <div class="thumbnail">
                                                <img src="/assets/images/items/{{$image->preview_image_name}}" class="img-responsive">
                                                <div class="caption">
                                                    <p>
                                                        <a id="{{$image->id}}" onclick="item.main(this.id);" href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" role="button">Сделать главным</a>
                                                        <a id="{{$image->id}}" onclick="item.remove(this.id);" href="javascript:void(0);" class="btn btn-danger waves-effect m-l-5" role="button">Удалить</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
    {!! script_ts('/assets/admin/js/project/dropzone.js') !!}
    {!! script_ts('/assets/admin/plugins/jquery.stepy/jquery.stepy.min.js') !!}
    {!! script_ts('/assets/admin/js/project/work_on_item.js') !!}
@endsection