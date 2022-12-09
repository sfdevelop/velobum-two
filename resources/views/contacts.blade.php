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

            <div class="edgtf-content" style="margin-top: -90px">
                <div class="edgtf-content-inner">
                <div class="edgtf-title edgtf-standard-type edgtf-has-background edgtf-has-parallax-background edgtf-content-left-alignment edgtf-title-medium-text-size edgtf-animation-no edgtf-title-image-not-responsive edgtf-title-in-grid" style="height: 590px; background-image: url(&quot;{{asset('assets/wp-content/uploads/2016/11/contact1-title-image.jpg')}}&quot;); background-position: center 0px;" data-height="590" data-background-width="&quot;1920&quot;">
                    <div class="edgtf-title-image"><img src="{{asset('assets/wp-content/uploads/2016/11/contact1-title-image.jpg')}}" alt="&nbsp;"> </div>
                    <div class="edgtf-title-holder">
                        <div class="edgtf-container clearfix">
                            <div class="edgtf-container-inner">
                                <div class="edgtf-title-subtitle-holder" style="">
                                    <div class="edgtf-title-subtitle-holder-inner">
                                        <span class="edgtf-subtitle"><span>магазин Велобум</span></span>
                                        <h1><span>Контактна інформація</span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="edgtf-full-width">
                    <div class="edgtf-full-width-inner">
                        <div class="vc_row wpb_row vc_row-fluid edgtf-section vc_custom_1477993053091 edgtf-content-aligment-left edgtf-grid-section" style="">
                            <div class="clearfix edgtf-section-inner">
                                    <div class="edgtf-section-inner-margin clearfix">
                                        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-3">
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-6 vc_col-md-6">
                                            @if($errors->any())
                                                @foreach ($errors->all() as $error)
                                                    <div class="edgtf-message" id="success__send">
                                                        <div class="edgtf-message-inner">
                                                            <a href="javascript:void(0)" class="edgtf-close"><i class="edgtf-font-elegant-icon icon_close"></i></a>
                                                            <div class="edgtf-message-text-holder">
                                                                <div class="edgtf-message-text">
                                                                    <div class="edgtf-message-text-inner">
                                                                        <h5>
                                                                        <span style="color: #ffffff;">
                                                                            {{ $error }}
                                                                        </span>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if(session()->has('message'))
                                                <div class="edgtf-message" id="success__send" style="background-color: #14921d;">
                                                    <div class="edgtf-message-inner">
                                                        <a href="javascript:void(0)" class="edgtf-close"><i class="edgtf-font-elegant-icon icon_close"></i></a>
                                                        <div class="edgtf-message-text-holder">
                                                            <div class="edgtf-message-text">
                                                                <div class="edgtf-message-text-inner">
                                                                    <h5>
                                                                        <span style="color: #ffffff;">
                                                                            {{ session()->get('message') }}
                                                                        </span>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <br>
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div role="form" class="wpcf7" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form action="{{route('send_mail')}}" method="post" class="wpcf7-form cf7_custom_style_1" novalidate="novalidate">
                                                            <div class="edgtf-cf7-two-columns clearfix">
                                                                <div class="edgtf-cf7-two-columns-50-50-inner">
                                                                    <div class="edgtf-cf7-column">
                                                                        <div class="edgtf-cf7-column-inner">
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Ваше ім'я">
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="edgtf-cf7-column">
                                                                        <div class="edgtf-cf7-column-inner">
                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                            <input type="text" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Ваш E-mail*">
                                                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                            <span class="wpcf7-form-control-wrap subject">
                                                                <input type="text" name="title" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Заголовок">
                                                            </span>
                                                            </div>
                                                            <div>
                                                            <span class="wpcf7-form-control-wrap your-message">
                                                                <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Повідомлення"></textarea>
                                                            </span>
                                                            </div>
                                                            <div style="padding-bottom: 10px;">
                                                            <span class="wpcf7-form-control-wrap your-messag">
                                                                {!! app('captcha')->display() !!}
                                                            </span>
                                                            </div>
                                                            <div>
                                                                <input type="submit" value="Відправити" class="wpcf7-form-control wpcf7-submit">
                                                                {{csrf_field()}}
                                                            </div>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-3 vc_col-md-3">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        @if ($contacts->email != null)
                            <div class="vc_row wpb_row vc_row-fluid edgtf-section vc_custom_1478774086480 edgtf-content-aligment-left edgtf-grid-section" style="">
                                <div class="clearfix edgtf-section-inner">
                                    <div class="edgtf-section-inner-margin clearfix">
                                        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                            <div class="vc_column-inner vc_custom_1477994814318">
                                                <div class="wpb_wrapper">
                                                    <div class="edgtf-iwt clearfix edgtf-iwt-icon-top edgtf-iwt-flip-enabled-no edgtf-iwt-icon-medium">
                                                        <div class="edgtf-iwt-icon-holder">
                                                        <span class="edgtf-icon-shortcode normal edgtf-icon-medium" data-hover-color="#000000" data-color="#fc7e08">
                                                            <a href="javascript:voi(0);">
                                                                <i class="edgtf-icon-linear-icon fa fa-home edgtf-icon-element" style="color: #fc7e08"></i>
                                                            </a>
                                                        </span>
                                                        </div>
                                                        <div class="edgtf-iwt-content-holder">
                                                            <div class="edgtf-iwt-title-holder">
                                                                <h5>Адреса</h5>
                                                            </div>
                                                            <div class="edgtf-iwt-text-holder">
                                                                {{$contacts->addresses}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space" style="height: 30px">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                            <div class="vc_column-inner vc_custom_1477994814318">
                                                <div class="wpb_wrapper">
                                                    <div class="edgtf-iwt clearfix edgtf-iwt-icon-top edgtf-iwt-flip-enabled-no edgtf-iwt-icon-medium">
                                                        <div class="edgtf-iwt-icon-holder">
                                                            <span class="edgtf-icon-shortcode normal edgtf-icon-medium" data-hover-color="#000000" data-color="#fc7e08">
                                                                <a href="javascript:voi(0);">
                                                                    <i class="edgtf-icon-linear-icon fa fa-envelope edgtf-icon-element" style="color: #fc7e08"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div class="edgtf-iwt-content-holder">
                                                            <div class="edgtf-iwt-title-holder">
                                                                <h5>E-MAIL</h5>
                                                            </div>
                                                            <div class="edgtf-iwt-text-holder">
                                                                {{$contacts->email}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space" style="height: 30px">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
                                            <div class="vc_column-inner vc_custom_1477994814318">
                                                <div class="wpb_wrapper">
                                                    <div class="edgtf-iwt clearfix edgtf-iwt-icon-top edgtf-iwt-flip-enabled-no edgtf-iwt-icon-medium">
                                                        <div class="edgtf-iwt-icon-holder">
                                                            <span class="edgtf-icon-shortcode normal edgtf-icon-medium" data-hover-color="#000000" data-color="#fc7e08">
                                                                <a href="javascript:voi(0);">
                                                                    <i class="edgtf-icon-linear-icon fa fa-phone edgtf-icon-element" style="color: #fc7e08"></i>
                                                                </a>
                                                            </span>
                                                        </div>
                                                        <div class="edgtf-iwt-content-holder">
                                                            <div class="edgtf-iwt-title-holder">
                                                                <h5>Телефон</h5>
                                                            </div>
                                                            <div class="edgtf-iwt-text-holder">
                                                                {{$contacts->tel}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="vc_empty_space" style="height: 30px">
                                                        <span class="vc_empty_space_inner"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-center" style="">
                            <div class="clearfix edgtf-full-section-inner">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="edgtf-google-map-holder">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1297.502697701595!2d32.07664342628416!3d49.42771201292938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d14b9ff4a1b977%3A0xc6e6cd82f5f17099!2z0LLRg9C70LjRhtGPINCf0LDRgNC40LfRjNC60L7RlyDQmtC-0LzRg9C90LgsIDY1LCDQp9C10YDQutCw0YHQuCwg0KfQtdGA0LrQsNGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCAxODAwMA!5e0!3m2!1sru!2sua!4v1492023066778" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
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
    </div>
    @include('includes.footer')
@endsection
