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
            <br><br>
            <div class="edgtf-container">
                <div class="edgtf-container-inner clearfix">
                    <div class="edgtf-container-inner clearfix">
                        <div itemscope="" class="edgtf-single-product-wrapper-top product type-product status-publish has-post-thumbnail product_cat-army product_tag-ceramic product_tag-family first instock sale shipping-taxable purchasable product-type-simple">
                            <div class="edgtf-single-product-images">
                                <div class="images">
                                    <a href="/assets/images/items/{{$page->item->image_name}}" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto[product-gallery]">
                                        <img width="auto" height="auto" src="/assets/images/items/{{$page->item->image_name}}" class="attachment-shop_single size-shop_single wp-post-image" alt="{{$page->item->name}}" title="{{$page->item->name}}">
                                    </a>
                                    @if ($page->item->share_price != null)
                                        <span class="edgtf-product-badge edgtf-onsale">
                                        <span class="edgtf-product-badge-inner edgtf-onsale-inner">Акція</span>
                                    </span>
                                    @endif
                                    @if(count($page->images) > 0)
                                        <div class="thumbnails columns-3">
                                            @foreach($page->images as $image)
                                                @if ($page->item->image_name != $image->image_name)
                                                    <a href="/assets/images/items/{{$image->image_name}}" itemprop="image" class="zoom first" data-rel="prettyPhoto[product-gallery]">
                                                        <img width="auto" height="auto" src="/assets/images/items/{{$image->preview_image_name}}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="e">
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="edgtf-single-product-summary">
                                <div class="summary entry-summary">
                                    <h4 itemprop="name" class="edgtf-single-product-title">{{$page->item->name}}</h4>
                                    <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                        <p class="price">
                                            @if ($page->item->share_price != null)
                                                <span class="woocommerce-Price-amount amount">
                                                    Ціна:
                                                    <del style="color: #f94e02">
                                                        {{$page->item->price}} <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                    </del>
                                                </span>
                                                <ins>
                                                <span class="woocommerce-Price-amount amount">
                                                    {{$page->item->share_price}}
                                                    <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                </span>
                                                </ins>
                                            @else
                                                <span class="woocommerce-Price-amount amount">
                                                    Ціна: {{$page->item->price}}
                                                    <span class="woocommerce-Price-currencySymbol"> грн.</span>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="product_meta" style="border-bottom:0px;">
                                        <h6 class="edgtf-product-meta-title">Інформація</h6>
                                        <span class="posted_in">
                                            <span class="edgtf-info-meta-title">Категорія:</span>
                                            <span class="edgtf-info-meta-content">
                                                <a href="/items/category/{{$page->item->category_id}}" rel="tag">{{$page->item->category}}</a>
                                            </span>
                                        </span>
                                    </div>
                                    <div itemprop="description">
                                        {!! $page->item->description !!}
                                    </div>
                                </div>
                                <div class="product_meta" style="border-bottom:0px;">
                                    <a href="{{ url()->previous() }}" style="color: rgb(255, 255, 255); background-color: rgb(254, 79, 0);" class="edgtf-btn edgtf-btn-large edgtf-btn-solid edgtf-btn-custom-hover-bg edgtf-btn-custom-hover-color" data-hover-bg-color="#f9f9f9" data-hover-color="#fe4f00">
                                        <span class="edgtf-btn-text">Назад</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @include('includes.footer')
        </div>
@endsection
