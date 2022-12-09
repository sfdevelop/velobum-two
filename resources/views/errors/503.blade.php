@extends('layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?> | 503
@endsection
@section('content')
    <a id='edgtf-back-to-top'  href='#'>
        <span class="edgtf-icon-stack">
            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>
        </span>
        <span class="edgtf-icon-stack">
            <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  " ></span>
        </span>
    </a>
    <div class="edgtf-content">
        <div class="edgtf-content-inner">
            <div class="edgtf-title edgtf-standard-type edgtf-content-left-alignment edgtf-title-medium-text-size edgtf-animation-no edgtf-title-in-grid" style="height:180px;" data-height="180">
                <div class="edgtf-title-image"></div>
                <div class="edgtf-title-holder" style="height:180px;">
                    <div class="edgtf-container clearfix">
                        <div class="edgtf-container-inner">
                            <div class="edgtf-title-subtitle-holder" style="">
                                <div class="edgtf-title-subtitle-holder-inner">
                                    <h1><span>503</span></h1>
                                    <h3><span>Технічні проблеми</span></h3>
                                    <div class="edgtf-breadcrumbs-holder">
                                        <div class="edgtf-breadcrumbs">
                                            <div class="edgtf-breadcrumbs-inner">
                                                <a href="/">На головну</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection