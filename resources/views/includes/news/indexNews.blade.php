@if (count($page->last_news)>0)
<div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
    <div class="clearfix edgtf-full-section-inner">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="edgtf-section-holder edgtf-sh-col-two edgtf-sh-border edgtf-appeared">
                        <div class="edgtf-sh-title-area">
                            <div class="edgtf-sh-title-area-inner" style="padding-left:9%; padding-right:38%">
                                <div class="edgtf-section-title edgtf-section-align-left">
                                    <a class="edgtf-call-to-action-link" href="/news">
                                        Новини <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="edgtf-sh-content-area">
                            @foreach($page->last_news as $news)
                                <div class="edgtf-section-item edgtf-vertical-alignment-middle edgtf-horizontal-alignment-left" style="padding: 9.025% 10.5% 8.875% 10.8%; height: 459px;">
                                    <div class="edgtf-section-item-inner">
                                        <div class="edgtf-section-item-content">
                                            <div class="edgtf-blog-list-holder edgtf-simple edgtf-one-column">
                                                <ul class="edgtf-blog-list">
                                                    <li class="edgtf-blog-list-item clearfix">
                                                        <div class="edgtf-blog-list-item-inner">
                                                            <div class="edgtf-item-text-holder">
                                                                <div class="edgtf-item-info-section">
                                                                    <div class="edgtf-post-info-category">
                                                                        <a href="/news" rel="category tag">
                                                                            Новини</a>
                                                                    </div>
                                                                    <div class="edgtf-post-info-date">
                                                                        {{$news->created_at}}
                                                                    </div>
                                                                </div>
                                                                <h3 class="edgtf-item-title">
                                                                    <a href="/news/view/{{$news->id}}">
									                                    {{strip_tags(str_limit($news->topic, 50))}}
                                                                    </a>
                                                                </h3>
                                                                <p class="edgtf-excerpt">
                                                                    {{strip_tags(str_limit($news->text, 50))}}
                                                                </p>
                                                                <div class="edgtf-item-read-more">
                                                                    <a href="/news/view/{{$news->id}}" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-transparent edgtf-btn-icon">
                                                                        <span class="edgtf-btn-text">Читати</span>
                                                                        <span class="edgtf-btn-icon-holder">
                                                                            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right ">
                                                                            </span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
