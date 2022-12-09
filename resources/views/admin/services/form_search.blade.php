<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="panel-sub-title text-muted">Параметры поиска</p>
                <p class="panel-sub-title text-muted">Ни один с параметров не являтся обязательным параметром для поиска</p>
            </div>
            <div class="panel-body">
                <form action="{{route('services/search')}}" method="get" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input @isset($page->old_topic) value="{{$page->old_topic}}" @endisset id="topic" name="topic" type="text" class="form-control" placeholder="Введите наименование новости">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="text" id="text" placeholder="Текст новости" rows="3" class="form-control">@isset($page->old_text){{$page->old_text}}@endisset</textarea>
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
                                        Поиск новостей по дате.
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
