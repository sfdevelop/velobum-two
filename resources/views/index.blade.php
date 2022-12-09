@extends('layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?> | Головна сторінка
@endsection
@section('content')
    <div class="edgtf-wrapper">
        <div class="edgtf-wrapper-inner">
            @include('includes.header')
            @foreach($page->slides as $slide)
                <!-- MAIN IMAGE -->
                <img src="assets/images/slides/{{$slide->image}}"  alt="g" title="main-home-slide-1"  width="1920" height="1100" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
            @endforeach

{{--                <div class="edgtf-slider">--}}
{{--                    <div class="edgtf-slider-inner">--}}
{{--                        <link href="http://fonts.googleapis.com/css?family=Montserrat%3A700" rel="stylesheet" property="stylesheet" type="text/css" media="all"><link>--}}
{{--                        <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-source="gallery" style="background-color:transparent;padding:0px;">--}}
{{--                            <!-- START REVOLUTION SLIDER 5.3.1 fullscreen mode -->--}}
{{--                            <div id="rev_slider_1_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.1">--}}
{{--                                <ul>--}}
{{--                                    @foreach($page->slides as $slide)--}}
{{--                                        <li data-index="rs-{{$slide->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="http://freestyle.edge-themes.com/wp-content/uploads/2016/12/main-home-slide-1-100x50.jpg"  data-delay="5000"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">--}}
{{--                                            <!-- MAIN IMAGE -->--}}
{{--                                            <img src="assets/images/slides/{{$slide->image}}"  alt="g" title="main-home-slide-1"  width="1920" height="1100" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina>--}}
{{--                                            <!-- LAYERS -->--}}

{{--                                            <!-- LAYER NR. 1 -->--}}
{{--                                            <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme"--}}
{{--                                                 id="slide-{{$slide->id}}-layer-2"--}}
{{--                                                 data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"--}}
{{--                                                 data-y="['middle','middle','middle','top']" data-voffset="['0','0','0','-113']"--}}
{{--                                                 data-width="['632','616','616','250']"--}}
{{--                                                 data-height="1100"--}}
{{--                                                 data-whitespace="nowrap"--}}

{{--                                                 data-type="shape"--}}
{{--                                                 data-basealign="slide"--}}
{{--                                                 data-responsive_offset="on"--}}

{{--                                                 data-frames='[{"delay":500,"speed":300,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power1.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'--}}
{{--                                                 data-textAlign="['inherit','inherit','inherit','inherit']"--}}
{{--                                                 data-paddingtop="[0,0,0,0]"--}}
{{--                                                 data-paddingright="[0,0,0,0]"--}}
{{--                                                 data-paddingbottom="[0,0,0,0]"--}}
{{--                                                 data-paddingleft="[0,0,0,0]"--}}

{{--                                                 style="z-index: 5;font-family:Open Sans;background-color:rgba(48, 48, 48, 0.90);border-color:rgba(48, 48, 48, 0.90);">--}}

{{--                                            </div>--}}

{{--                                            <!-- LAYER NR. 2 -->--}}
{{--                                            <div class="tp-caption   tp-resizeme"--}}
{{--                                                 id="slide-{{$slide->id}}-layer-3"--}}
{{--                                                 data-x="['left','left','left','left']" data-hoffset="['35','35','35','35']"--}}
{{--                                                 data-y="['middle','middle','middle','middle']" data-voffset="['-108','-108','-99','-97']"--}}
{{--                                                 data-width="none"--}}
{{--                                                 data-height="none"--}}
{{--                                                 data-whitespace="nowrap"--}}

{{--                                                 data-type="image"--}}
{{--                                                 data-basealign="slide"--}}
{{--                                                 data-responsive_offset="on"--}}

{{--                                                 data-frames='[{"delay":700,"speed":400,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power1.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'--}}
{{--                                                 data-textAlign="['inherit','inherit','inherit','inherit']"--}}
{{--                                                 data-paddingtop="[0,0,0,0]"--}}
{{--                                                 data-paddingright="[0,0,0,0]"--}}
{{--                                                 data-paddingbottom="[0,0,0,0]"--}}
{{--                                                 data-paddingleft="[0,0,0,0]"--}}

{{--                                                 style="z-index: 6;">--}}
{{--                                                <img src="{{asset('assets/wp-content/uploads/2016/11/main-home-slider-graphic.jpg')}}" alt="" data-ww="['45px','45px','45px','45px']" data-hh="['45px','45px','45px','45px']" width="45" height="45" data-no-retina>--}}
{{--                                            </div>--}}

{{--                                            <!-- LAYER NR. 3 -->--}}
{{--                                            <div class="tp-caption   tp-resizeme"--}}
{{--                                                 id="slide-{{$slide->id}}-layer-4"--}}
{{--                                                 data-x="['left','left','left','left']" data-hoffset="['35','35','35','35']"--}}
{{--                                                 data-y="['middle','middle','middle','middle']" data-voffset="['-55','-55','-52','-52']"--}}
{{--                                                 data-width="none"--}}
{{--                                                 data-height="none"--}}
{{--                                                 data-whitespace="nowrap"--}}

{{--                                                 data-type="text"--}}
{{--                                                 data-basealign="slide"--}}
{{--                                                 data-responsive_offset="on"--}}

{{--                                                 data-frames='[{"delay":900,"speed":400,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power1.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'--}}
{{--                                                 data-textAlign="['inherit','inherit','inherit','inherit']"--}}
{{--                                                 data-paddingtop="[0,0,0,0]"--}}
{{--                                                 data-paddingright="[0,0,0,0]"--}}
{{--                                                 data-paddingbottom="[0,0,0,0]"--}}
{{--                                                 data-paddingleft="[0,0,0,0]"--}}

{{--                                                 style="z-index: 7; white-space: nowrap; font-size: 14px; line-height: 15px; font-weight: 700; color: rgba(255, 255, 255, 1.00);letter-spacing:1.2px;">--}}
{{--                                                магазин Велобум--}}
{{--                                            </div>--}}

{{--                                            <!-- LAYER NR. 4 -->--}}
{{--                                            <div class="tp-caption   tp-resizeme"--}}
{{--                                                 id="slide-{{$slide->id}}-layer-5"--}}
{{--                                                 data-x="['left','left','left','left']" data-hoffset="['30','30','30','30']"--}}
{{--                                                 data-y="['middle','middle','middle','middle']" data-voffset="['13','13','13','-1']"--}}
{{--                                                 data-fontsize="['80','80','80','50']"--}}
{{--                                                 data-width="none"--}}
{{--                                                 data-height="none"--}}
{{--                                                 data-whitespace="nowrap"--}}

{{--                                                 data-type="text"--}}
{{--                                                 data-basealign="slide"--}}
{{--                                                 data-responsive_offset="on"--}}

{{--                                                 data-frames='[{"delay":1100,"speed":400,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power1.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'--}}
{{--                                                 data-textAlign="['inherit','inherit','inherit','inherit']"--}}
{{--                                                 data-paddingtop="[0,0,0,0]"--}}
{{--                                                 data-paddingright="[0,0,0,0]"--}}
{{--                                                 data-paddingbottom="[0,0,0,0]"--}}
{{--                                                 data-paddingleft="[0,0,0,0]"--}}

{{--                                                 style="z-index: 8; white-space: nowrap; font-size: 80px; line-height: 80px; font-weight: 400; color: rgba(255, 255, 255, 1.00);letter-spacing:-2.8px;">--}}
{{--                                                {{$slide->name}}--}}
{{--                                            </div>--}}

{{--                                            <!-- LAYER NR. 6 -->--}}
{{--                                            <a class="tp-caption   tp-resizeme"--}}
{{--                                               target="_blank"--}}
{{--                                               href="{{$slide->url}}" id="slide-{{$slide->id}}-layer-7"--}}
{{--                                               data-x="['left','left','right','right']" data-hoffset="['535','540','311','110']"--}}
{{--                                               data-y="['middle','middle','middle','middle']" data-voffset="['88','94','93','50']"--}}
{{--                                               data-width="none"--}}
{{--                                               data-height="none"--}}
{{--                                               data-whitespace="nowrap"--}}

{{--                                               data-type="image"--}}
{{--                                               data-actions=''--}}
{{--                                               data-basealign="slide"--}}
{{--                                               data-responsive_offset="on"--}}

{{--                                               data-frames='[{"delay":1500,"speed":400,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power1.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'--}}
{{--                                               data-textAlign="['inherit','inherit','inherit','inherit']"--}}
{{--                                               data-paddingtop="[0,0,0,0]"--}}
{{--                                               data-paddingright="[0,0,0,0]"--}}
{{--                                               data-paddingbottom="[0,0,0,0]"--}}
{{--                                               data-paddingleft="[0,0,0,0]"--}}

{{--                                               style="z-index: 10;text-decoration: none;">--}}
{{--                                                <img src="{{asset('assets/wp-content/uploads/2016/11/HOME-5-SLIDE-1-IMAGE-1.png')}}" alt="s" data-ww="['38px','38px','38px','38px']" data-hh="['23px','23px','23px','23px']" width="38" height="23" data-no-retina> </a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                                <script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";--}}
{{--                                    if(htmlDiv) {--}}
{{--                                        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;--}}
{{--                                    }else{--}}
{{--                                        var htmlDiv = document.createElement("div");--}}
{{--                                        htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";--}}
{{--                                        document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);--}}
{{--                                    }--}}
{{--                                </script>--}}
{{--                                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>--}}
{{--                            <script>var htmlDiv = document.getElementById("rs-plugin-settings-inline-css"); var htmlDivCss="";--}}
{{--                                if(htmlDiv) {--}}
{{--                                    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;--}}
{{--                                }else{--}}
{{--                                    var htmlDiv = document.createElement("div");--}}
{{--                                    htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";--}}
{{--                                    document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);--}}
{{--                                }--}}
{{--                            </script>--}}
{{--                            <script type="text/javascript">--}}
{{--                                /******************************************--}}
{{--                                 -	PREPARE PLACEHOLDER FOR SLIDER	---}}
{{--                                 ******************************************/--}}

{{--                                var setREVStartSize=function(){--}}
{{--                                    try{var e=new Object,i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;--}}
{{--                                        e.c = jQuery('#rev_slider_1_1');--}}
{{--                                        e.responsiveLevels = [1920,1440,778,480];--}}
{{--                                        e.gridwidth = [1300,1100,778,480];--}}
{{--                                        e.gridheight = [868,768,960,720];--}}

{{--                                        e.sliderLayout = "fullscreen";--}}
{{--                                        e.fullScreenAutoWidth='on';--}}
{{--                                        e.fullScreenAlignForce='off';--}}
{{--                                        e.fullScreenOffsetContainer= '.touch .edgtf-mobile-header';--}}
{{--                                        e.fullScreenOffset='';--}}
{{--                                        if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})--}}

{{--                                    }catch(d){console.log("Failure at Presize of Slider:"+d)}--}}
{{--                                };--}}

{{--                                setREVStartSize();--}}

{{--                                var tpj=jQuery;--}}

{{--                                var revapi1;--}}
{{--                                tpj(document).ready(function() {--}}
{{--                                    if(tpj("#rev_slider_1_1").revolution == undefined){--}}
{{--                                        revslider_showDoubleJqueryError("#rev_slider_1_1");--}}
{{--                                    }else{--}}
{{--                                        revapi1 = tpj("#rev_slider_1_1").show().revolution({--}}
{{--                                            sliderType:"standard",--}}
{{--                                            jsFileLocation:"//freestyle.edge-themes.com/wp-content/plugins/revslider/public/assets/js/",--}}
{{--                                            sliderLayout:"fullscreen",--}}
{{--                                            dottedOverlay:"none",--}}
{{--                                            delay:5000,--}}
{{--                                            navigation: {--}}
{{--                                                keyboardNavigation:"off",--}}
{{--                                                keyboard_direction: "horizontal",--}}
{{--                                                mouseScrollNavigation:"off",--}}
{{--                                                mouseScrollReverse:"default",--}}
{{--                                                onHoverStop:"on",--}}
{{--                                                bullets: {--}}
{{--                                                    enable:true,--}}
{{--                                                    hide_onmobile:false,--}}
{{--                                                    style:"freestyle-nav",--}}
{{--                                                    hide_onleave:false,--}}
{{--                                                    direction:"horizontal",--}}
{{--                                                    h_align:"center",--}}
{{--                                                    v_align:"bottom",--}}
{{--                                                    h_offset:0,--}}
{{--                                                    v_offset:30,--}}
{{--                                                    space:10,--}}
{{--                                                    tmp:''--}}
{{--                                                }--}}
{{--                                            },--}}
{{--                                            responsiveLevels:[1920,1440,778,480],--}}
{{--                                            visibilityLevels:[1920,1440,778,480],--}}
{{--                                            gridwidth:[1300,1100,778,480],--}}
{{--                                            gridheight:[868,768,960,720],--}}
{{--                                            lazyType:"none",--}}
{{--                                            parallax: {--}}
{{--                                                type:"mouse",--}}
{{--                                                origo:"enterpoint",--}}
{{--                                                speed:6000,--}}
{{--                                                levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],--}}
{{--                                            },--}}
{{--                                            shadow:0,--}}
{{--                                            spinner:"spinner1",--}}
{{--                                            stopLoop:"off",--}}
{{--                                            stopAfterLoops:-1,--}}
{{--                                            stopAtSlide:-1,--}}
{{--                                            shuffle:"off",--}}
{{--                                            autoHeight:"off",--}}
{{--                                            fullScreenAutoWidth:"on",--}}
{{--                                            fullScreenAlignForce:"off",--}}
{{--                                            fullScreenOffsetContainer: ".touch .edgtf-mobile-header",--}}
{{--                                            fullScreenOffset: "",--}}
{{--                                            disableProgressBar:"on",--}}
{{--                                            hideThumbsOnMobile:"off",--}}
{{--                                            hideSliderAtLimit:0,--}}
{{--                                            hideCaptionAtLimit:0,--}}
{{--                                            hideAllCaptionAtLilmit:0,--}}
{{--                                            debugMode:false,--}}
{{--                                            fallbacks: {--}}
{{--                                                simplifyAll:"off",--}}
{{--                                                nextSlideOnWindowFocus:"off",--}}
{{--                                                disableFocusListener:false,--}}
{{--                                            }--}}
{{--                                        });--}}
{{--                                    }--}}
{{--                                });	/*ready*/--}}
{{--                            </script>--}}
{{--                            <script>--}}
{{--                                var htmlDivCss = ' #rev_slider_1_1_wrapper .tp-loader.spinner1{ background-color: #fe4f00 !important; } ';--}}
{{--                                var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');--}}
{{--                                if(htmlDiv) {--}}
{{--                                    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;--}}
{{--                                }--}}
{{--                                else{--}}
{{--                                    var htmlDiv = document.createElement('div');--}}
{{--                                    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';--}}
{{--                                    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);--}}
{{--                                }--}}
{{--                            </script>--}}
{{--                            <script>--}}
{{--                                var htmlDivCss = unescape("%23rev_slider_1_1%20.freestyle-nav.tp-bullets%3Abefore%20%7B%0A%09content%3A%22%20%22%3B%0A%09position%3Aabsolute%3B%0A%09width%3A100%25%3B%0A%09height%3A100%25%3B%0A%09background%3Atransparent%3B%0A%09padding%3A10px%3B%0A%09margin-left%3A-10px%3Bmargin-top%3A-10px%3B%0A%09box-sizing%3Acontent-box%3B%0A%20%20%20border-radius%3A8px%3B%0A%20%20%0A%7D%0A%23rev_slider_1_1%20.freestyle-nav%20.tp-bullet%20%7B%0A%09width%3A12px%3B%0A%09height%3A13px%3B%0A%09position%3Aabsolute%3B%0A%09background%3A%20rgba%28242%2C241%2C241%2C.8%29%3B%0A%09border-radius%3A50%25%3B%0A%09cursor%3A%20pointer%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A%23rev_slider_1_1%20.freestyle-nav%20.tp-bullet%3Ahover%2C%0A%23rev_slider_1_1%20.freestyle-nav%20.tp-bullet.selected%20%7B%0A%09background%3A%20rgb%28254%2C%2079%2C%200%29%3B%0A%7D%0A%0A");--}}
{{--                                var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');--}}
{{--                                if(htmlDiv) {--}}
{{--                                    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;--}}
{{--                                }--}}
{{--                                else{--}}
{{--                                    var htmlDiv = document.createElement('div');--}}
{{--                                    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';--}}
{{--                                    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);--}}
{{--                                }--}}
{{--                            </script>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            <a id="edgtf-back-to-top" href="#" class="off">
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  "></span>
                </span>
                <span class="edgtf-icon-stack">
                     <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_up  "></span>
            </span>
            </a>

            <div class="edgtf-content" style="">
                <div class="edgtf-full-width">
                    <div class="edgtf-full-width-inner">
                        <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
                            <div class="clearfix edgtf-full-section-inner">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="edgtf-linked-boxes edgtf-linked-boxes-col-3" data-items-no=3>
                                                <div class="edgtf-linked-item">
                                                    <div class="edgtf-linked-item-image-holder">
                                                        <img width="800" height="625" src="{{ asset('assets/wp-content/uploads/2016/09/001.jpg')}}" class="attachment-full size-full" alt="i" />
                                                    </div>
                                                    <div class="edgtf-linked-item-text">
                                                        <span class="edgtf-section-subtitle " style="text-align:left">
                                                            магазин "Велобум"
                                                        </span>
                                                        <div class="edgtf-section-title edgtf-section-align-left" >
                                                            Сервіс	<span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style="" ></span>
                                                        </div>
                                                    </div>
                                                    <a class="edgtf-linked-item-link" href="/service" target="_self"></a>
                                                </div>

                                                <div class="edgtf-linked-item">
                                                    <div class="edgtf-linked-item-image-holder">
                                                        <img width="800" height="625" src="{{ asset('assets/wp-content/uploads/2016/09/002.jpg')}}" class="attachment-full size-full" alt="i" />
                                                    </div>
                                                    <div class="edgtf-linked-item-text">
                                                        <span class="edgtf-section-subtitle " style="text-align:left">
                                                            магазин "Велобум"
                                                        </span>
                                                        <div class="edgtf-section-title edgtf-section-align-left" >
                                                            Велокосметика	<span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style="" ></span>
                                                        </div>
                                                    </div>
                                                    <a class="edgtf-linked-item-link" href="/bicycle_cosmetics" target="_self"></a>
                                                </div>

                                                <div class="edgtf-linked-item">
                                                    <div class="edgtf-linked-item-image-holder">
                                                        <img width="800" height="625" src="{{ asset('assets/wp-content/uploads/2016/09/003.jpg')}}" class="attachment-full size-full" alt="i" />
                                                    </div>
                                                    <div class="edgtf-linked-item-text">
                                                        <span class="edgtf-section-subtitle " style="text-align:left">
                                                            магазин "Велобум"
                                                        </span>
                                                        <div class="edgtf-section-title edgtf-section-align-left" >
                                                            Інструменти	<span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style="" ></span>
                                                        </div>
                                                    </div>
                                                    <a class="edgtf-linked-item-link" href="/instruments" target="_self"></a>
                                                </div>
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
                                            <div class="edgtf-call-to-action edgtf-cta-simple" style="background-color: #fe4f00;padding: 7% 0% 7% 0%;">
                                                <a class="edgtf-call-to-action-link" href="/about"></a>
                                                <div class="edgtf-call-to-action-table">
                                                    <span class="edgtf-call-to-action-text edgtf-call-to-action-cell">
                                                        Про нас
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
                        @include('includes.share_item.indexLastItems')
                        <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
                            <div class="clearfix edgtf-full-section-inner">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="edgtf-call-to-action edgtf-cta-simple" style="background-color: #fe4f00;padding: 7% 0px 7% 0px;">
                                                <a class="edgtf-call-to-action-link" href="/partners"></a>
                                                <div class="edgtf-call-to-action-table">
                                                    <span class="edgtf-call-to-action-text edgtf-call-to-action-cell">
                                                        Партнери
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
                        @include('includes.news.indexNews')
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
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
