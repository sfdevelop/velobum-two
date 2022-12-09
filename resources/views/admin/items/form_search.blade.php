<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-sub-title text-muted">Параметры поиска</p>
                <p class="panel-sub-title text-muted">Ни один с параметров не являтся обязательным параметром для поиска</p>
            </div>
            <div class="panel-body">
                <form action="{{route('admin/items/search')}}" method="get" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input @isset($page->old_name) value="{{$page->old_name}}" @endisset id="name" name="name" type="text" class="form-control" placeholder="Наименование товара">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="description" id="description" placeholder="Описание товара" rows="3" class="form-control">@isset($page->old_description){{$page->old_description}}@endisset</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-md-6 control-label">Только скрытые товары</label>
                                <div class="col-md-6">
                                    <div class="checkbox checkbox-primary checkbox-single">
                                        <input type="checkbox" id="status" name="status"
                                               @if (isset($page->old_status))
                                               checked
                                               @endif
                                               value="1" aria-label="Только скрытые товары">
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <button type="submit" class="btn btn-lg btn-success">
                                            Поиск
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_start" class="col-md-2 control-label">От</label>
                                            <div class="col-md-10">
                                                <input @isset($page->old_date_start) value="{{$page->old_date_start}}" @endisset type="date" id="date_start" name="date_start" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_end" class="col-md-2 control-label">До</label>
                                            <div class="col-md-10">
                                                <input @isset($page->old_date_end) value="{{$page->old_date_end}}" @endisset type="date" id="date_end" name="date_end" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="help-block">
                                    <small>
                                        Поиск товаров по дате.
                                    </small>
                                </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! $page->tree !!}
                                    <span class="help-block">
                                        <small>
                                            Категории по которым будет применен поиск. Зажмите Ctrl+ЛКМ чтобы отменить несколько категорий.
                                        </small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
