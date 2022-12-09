@extends('layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?> | {{$page->title}}
@endsection
@section('content')
    @include('includes.header')
    <a id='edgtf-back-to-top'  href='#'>
        <span class="edgtf-icon-stack">
            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>
        </span>
        <span class="edgtf-icon-stack">
            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>
        </span>
    </a>
    <div class="edgtf-content" style="margin-top: -90px">
        <div class="edgtf-content-inner">
            <div class="edgtf-title edgtf-standard-type edgtf-has-background edgtf-has-parallax-background edgtf-content-left-alignment edgtf-title-medium-text-size edgtf-animation-no edgtf-title-image-not-responsive edgtf-title-full-width" style="height: 590px; background-image: url(&quot;{{asset('assets/wp-content/uploads/2016/10/about-us-2-title-image-new.jpg')}}&quot;); background-position: center 0px;" data-height="590" data-background-width="&quot;1920&quot;">
                <div class="edgtf-title-image"><img src="{{asset('assets/wp-content/uploads/2016/10/about-us-2-title-image-new.jpg')}}" alt="&nbsp;">
                </div>
                <div class="edgtf-title-holder">
                    <div class="edgtf-container clearfix">
                        <div class="edgtf-container-inner">
                            <div class="edgtf-title-subtitle-holder" style="">
                                <div class="edgtf-title-subtitle-holder-inner">
                                    <h1><span>{{$page->title}}</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edgtf-full-width">
                <div class="edgtf-full-width-inner">
                    <div class="vc_row wpb_row vc_row-fluid edgtf-section vc_custom_1478771657031 edgtf-content-aligment-left edgtf-grid-section" style="">
                        <div class="clearfix edgtf-section-inner">
                            <div class="edgtf-section-inner-margin clearfix">
                                <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-2 vc_col-md-2">
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-8 vc_col-md-8">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            @if ($page->about == null)
                                                @include('includes.empty_page')
                                            @else
                                                <div class="vc_empty_space" style="height: 30px">
                                                    <span class="vc_empty_space_inner"></span>
                                                </div>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p class="text-center">
                                                            {!! $page->about !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="vc_empty_space" style="height: 40px">
                                                    <span class="vc_empty_space_inner"></span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-2 vc_col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
                <div class="clearfix edgtf-full-section-inner">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="edgtf-call-to-action edgtf-cta-simple" style="background-color: #fe4f00;padding: 7% 0px 7% 0px;">
                                    <a class="edgtf-call-to-action-link" href="/contacts"></a>
                                    <div class="edgtf-call-to-action-table">
                                        <span class="edgtf-call-to-action-text edgtf-call-to-action-cell">
                                            Наші контакти
                                        </span>
                                        <span class="edgtf-call-to-action-icon edgtf-call-to-action-cell">
                                            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style=""></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection