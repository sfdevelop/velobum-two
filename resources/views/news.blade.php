@extends('layouts.main')
@section('title')
    {{$page->title}}
@endsection
@section('content')
    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            @include('includes.header')
            <a id='edgtf-back-to-top'  href='#'>
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>                </span>
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>                </span>
            </a>

            <div class="edgtf-content" >
                <div class="edgtf-content-inner">
                    <div class="edgtf-title edgtf-standard-type edgtf-content-left-alignment edgtf-title-medium-text-size edgtf-animation-no edgtf-title-in-grid" style="background-color: #fe4f00; height:180px;" data-height="180" >
                    <div class="edgtf-title-image"></div>
                    <div class="edgtf-title-holder" style="height:180px;">
                        <div class="edgtf-container clearfix">
                            <div class="edgtf-container-inner">
                                <div class="edgtf-title-subtitle-holder" style="">
                                    <div class="edgtf-title-subtitle-holder-inner">
                                        <h1><span>Новини</span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <br><br>
                    <div class="edgtf-container">
                    <div class="edgtf-container-inner">
                        @if (count($page->news) == 0)
                            @include('includes.empty_page')
                        @endif
                        <div class="edgtf-blog-holder edgtf-blog-type-masonry edgtf-masonry-pagination-load-more edgtf-appeared" style="position: relative; height: 4305px;">
                            <div class="edgtf-blog-masonry-grid-sizer"></div>
                            <div class="edgtf-blog-masonry-grid-gutter"></div>
                            @foreach($page->news as $news)
                                <article id="news-{{$news->id}}" class="news-{{$news->id}} post type-post status-publish format-standard has-post-thumbnail hentry category-lifestyle tag-design tag-fashion tag-furniture" style="position: absolute; left: 0px; top: 0px;">
                                    <div class="edgtf-post-content">
                                        @if($news->image != null)
                                            <div class="edgtf-post-image">
                                                <a href="/news/view/{{$news->id}}" title="{{$news->topic}}">
                                                    <img width="1000" heigh="auto" src="assets/images/services/{{$news->preview_image}}" class="attachment-full size-full wp-post-image" alt="x" sizes="(max-width: 1000px) 100vw, 1000px">
                                                </a>
                                            </div>
                                        @endif
                                        <div class="edgtf-post-text">
                                            <div class="edgtf-post-text-inner">
                                                <h3 class="edgtf-post-title">
                                                    <a href="/news/view/{{$news->id}}" title="{{$news->topic}}">{{$news->topic}}</a>
                                                </h3>
                                                <p class="edgtf-post-excerpt">{!! strip_tags(str_limit($news->text, 250)) !!}</p>
                                                <div class="edgtf-post-info-bottom">
                                                    <div class="edgtf-post-info-bottom-left">
                                                        <div class="edgtf-post-info-date">
                                                            {{$news->created_at}}
                                                        </div>
                                                    </div>
                                                    <div class="edgtf-post-info-bottom-right">
                                                        <a href="/news/view/{{$news->id}}" target="_self" class="edgtf-btn edgtf-btn-large edgtf-btn-transparent edgtf-blog-btn-read-more">
                                                            <span class="edgtf-btn-text">Читати</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    @include('includes.paginate', ['paginator' => $page->news])
                    <br>
                </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
