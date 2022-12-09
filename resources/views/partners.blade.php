@extends('layouts.main')
@section('title')
    <?php echo $_SERVER['SERVER_NAME']; ?> | Партнери
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
                                            <h1><span>Наші партнери</span></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edgtf-full-width">
                        <div class="edgtf-full-width-inner">
                            <div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left edgtf-grid-section" style="">
                                <div class="clearfix edgtf-section-inner">
                                    <div class="edgtf-section-inner-margin clearfix">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="woocommerce columns-4">
                                                        <ul class="products">
                                                            @if (count($partners) > 0)
                                                                @foreach($partners as $item)
                                                                <li class="product type-product status-publish has-post-thumbnail product_cat-army product_tag-ceramic product_tag-family  instock sale shipping-taxable purchasable product-type-simple">
                                                                    <div class="edgtf-product-list-image-wrapper">
                                                                        <a href="{{$item->url}}" target="_blank" class="woocommerce-LoopProduct-link">
                                                                            <img width="768" height="auto" src="/assets/images/partners/{{$item->preview_image}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="j" title="{{$item->name}}" sizes="(max-width: 768px) 100vw, 768px" />
                                                                        </a>
                                                                        <a href="{{$item->url}}" target="_blank"  class="edgtf-btn edgtf-btn-huge-full-width edgtf-btn-solid add_to_cart_button product_type_simple ajax_add_to_cart "  rel="nofollow" data-product_id="2857" data-product_sku="011" data-quantity="1">
                                                                            <span class="edgtf-btn-text">Перейти на сайт {{$item->name}}</span>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            @else
                                                                <div class="edgtf-message" style="background-color: #ffffff;border-color:#f2f1f1; padding-top: 100px;padding-bottom: 75px;">
                                                                    <div class="edgtf-message-inner">
                                                                        <div class="edgtf-message-text-holder">
                                                                            <div class="edgtf-message-text">
                                                                                <div class="edgtf-message-text-inner">
                                                                                    <h5><span style="color: #fc7e08;">На данний момент партнери відсутні</span></h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </ul>
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
