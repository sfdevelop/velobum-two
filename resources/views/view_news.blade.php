@extends('layouts.main')
@section('title')
    {{$page->title}}
@endsection
@section('content')
    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            @include('includes.header')
            <a id="edgtf-back-to-top" href="#" class="off">
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  "></span>
                </span>
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  "></span>
            </span>
            </a>
            <br><br>
            <div class="edgtf-container">
                <div class="edgtf-container-inner">
                    <div class="edgtf-two-columns-75-25 clearfix">
                        <div class="edgtf-column1 edgtf-content-left-from-sidebar">
                            <div class="edgtf-column-inner">
                                <div class="edgtf-blog-holder edgtf-blog-single">
                                    <article id="post-1146" class="post-1146 post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle tag-design tag-fashion tag-furniture">
                                        <div class="edgtf-post-content">
                                            @if($page->news->image != null)
                                                <div class="edgtf-post-image">
                                                    <img width="1000" heigh="auto" src="../../assets/images/services/{{$page->news->image}}" class="attachment-full size-full wp-post-image" alt="x" sizes="(max-width: 1000px) 100vw, 1000px">
                                                </div>
                                            @endif
                                            <div class="edgtf-post-text">
                                                <div class="edgtf-post-text-inner clearfix">
                                                    <h3 class="edgtf-post-title">
                                                        {{$page->news->topic}}
                                                    </h3>
                                                    <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
                                                        <div class="clearfix edgtf-full-section-inner">
                                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                                <div class="vc_column-inner ">
                                                                    <div class="wpb_wrapper">
                                                                        <div class="wpb_text_column wpb_content_element ">
                                                                            <div class="wpb_wrapper">
                                                                                <p>
                                                                                    {!!$page->news->text!!}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="edgtf-item-info-section">
                                                        <div class="edgtf-post-info-category">
                                                            <a href="/news" rel="category tag">
                                                                Новини
                                                            </a>
                                                            / {{$page->news->created_at}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="edgtf-column2">
                            <div class="edgtf-column-inner">
                                <aside class="edgtf-sidebar">
                                    <div class="widget edgtf-latest-posts-widget"><h5 class="edgtf-widget-title">Останні новини</h5>
                                        <div class="edgtf-blog-list-holder edgtf-image-in-box ">
                                            @foreach($page->last_news as $news)
                                                <ul class="edgtf-blog-list">
                                                    <li class="edgtf-blog-list-item clearfix">
                                                        <div class="edgtf-blog-list-item-inner">
                                                            @if($news->preview_image != null)
                                                                <div class="edgtf-item-image clearfix">
                                                                    <a href="/news/view/{{$news->id}}">
                                                                        <img width="550" height="auto" src="../../assets/images/services/{{$news->preview_image}}" class="attachment-freestyle_edge_square size-freestyle_edge_square wp-post-image" alt="f">
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="edgtf-item-image clearfix">
                                                                </div>
                                                            @endif
                                                            <div class="edgtf-item-text-holder">
                                                                <h6 class="edgtf-item-title ">
                                                                    <a href="/news/view/{{$news->id}}">
                                                                        {{$news->topic}}
                                                                    </a>
                                                                </h6>
                                                                <div class="edgtf-item-info-section">
                                                                    <div class="edgtf-post-info-date">
                                                                        {{$news->created_at}}
                                                                    </div>
                                                                    <div class="edgtf-post-info-category">
                                                                        <a href="/news" rel="category tag">Новини</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
