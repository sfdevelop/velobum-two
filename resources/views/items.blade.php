@extends('layouts.items')
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
                                            @isset($page->route_name)
                                                @if($page->route_name == 'items/share')
                                                    <h5 style="color: rgb(255, 225, 212); text-align: center"><span>Акційні товари</span></h5>
                                                @endif
                                                    @if($page->route_name == 'items')
                                                        <h5 style="color: rgb(255, 225, 212); text-align: center"><span>Всі товари</span></h5>
                                                    @endif
                                            @endisset
                                            @if(isset($page->category_name))<h1><span>{{$page->category_name}}</span></h1>@endif
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
                                                            @if (count($page->items) > 0)
                                                            @foreach($page->items as $item)
                                                                @if($item->share_price == null)
                                                                    <li class="product type-product status-publish has-post-thumbnail product_cat-military product_tag-black product_tag-casual first instock shipping-taxable purchasable product-type-simple">
                                                                        <div class="edgtf-product-list-image-wrapper">
                                                                            <a href="/item/view/{{$item->id}}" class="woocommerce-LoopProduct-link">
                                                                                <img width="768" height="auto" src="/assets/images/items/{{$item->preview_image_name}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="j" title="{{$item->name}}" sizes="(max-width: 768px) 100vw, 768px" />
                                                                            </a>
                                                                            <a href="/item/view/{{$item->id}}" target="_self"  class="edgtf-btn edgtf-btn-huge-full-width edgtf-btn-solid add_to_cart_button product_type_simple ajax_add_to_cart "  rel="nofollow" data-product_id="2859" data-product_sku="012" data-quantity="1">
                                                                                <span class="edgtf-btn-text">Переглянути</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="edgtf-product-list-title-holder">
                                                                            <h5 class="edgtf-product-list-product-title">
                                                                                <a href="/item/view/{{$item->id}}">{{$item->name}}</a>
                                                                            </h5>
                                                                            <span class="price">
                                                                                <span class="woocommerce-Price-amount amount">{{$item->price}}
                                                                                    <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                                                </span>
                                                                            </span>
                                                                        </div>
                                                                        <div class="edgtf-product-cat">
                                                                            <a href="/items/category/{{$item->category_id}}" rel="tag">{{$item->category_name}}</a><br>
                                                                        </div>
                                                                    </li>
                                                                @else
                                                                    <li class="product type-product status-publish has-post-thumbnail product_cat-army product_tag-ceramic product_tag-family  instock sale shipping-taxable purchasable product-type-simple">
                                                                        <div class="edgtf-product-list-image-wrapper">
                                                                            <a href="/item/view/{{$item->id}}" class="woocommerce-LoopProduct-link">
                                                                                <span class="edgtf-product-badge edgtf-onsale">
                                                                                    <span class="edgtf-product-badge-inner edgtf-onsale-inner">Акція</span>
                                                                                </span>
                                                                                <img width="768" height="auto" src="/assets/images/items/{{$item->preview_image_name}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="j" title="{{$item->name}}" sizes="(max-width: 768px) 100vw, 768px" />
                                                                            </a>
                                                                            <a href="/item/view/{{$item->id}}" target="_self"  class="edgtf-btn edgtf-btn-huge-full-width edgtf-btn-solid add_to_cart_button product_type_simple ajax_add_to_cart "  rel="nofollow" data-product_id="2857" data-product_sku="011" data-quantity="1">
                                                                                <span class="edgtf-btn-text">Переглянути</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="edgtf-product-list-title-holder">
                                                                            <h5 class="edgtf-product-list-product-title">
                                                                                <a href="/item/view/{{$item->id}}">{{$item->name}}</a>
                                                                            </h5>
                                                                            <span class="price">
                                                                                <del>
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        {{$item->price}}
                                                                                        <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                                                    </span>
                                                                                </del>
                                                                                <ins>
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        {{$item->share_price}}
                                                                                        <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                                                    </span>
                                                                                </ins>
                                                                            </span>
                                                                        </div>
                                                                        <div class="edgtf-product-cat">
                                                                            <a href="/items/category/{{$item->category_id}}" rel="tag">{{$item->category_name}}</a><br>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            @else
                                                                <div class="edgtf-message  " style="background-color: #ffffff;border-color:#f2f1f1">
                                                                    <div class="edgtf-message-inner">
                                                                        <a href="javascript:void(0)" class="edgtf-close" style="color: #fc7e08"><i class="edgtf-font-elegant-icon icon_close" style="color: #fc7e08"></i></a>
                                                                        <div class="edgtf-message-text-holder">
                                                                            <div class="edgtf-message-text">
                                                                                <div class="edgtf-message-text-inner">
                                                                                    <h5><span style="color: #fc7e08;">В цій категорії (підкатегорії) товар пока відсутній</span></h5>
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
                            @include('includes.paginate', ['paginator' => $page->items])
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
        </div>
@endsection
