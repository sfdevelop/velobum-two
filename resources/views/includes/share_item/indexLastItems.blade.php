@if (count($page->last_share_items) > 0)
<div class="vc_row wpb_row vc_row-fluid edgtf-section edgtf-content-aligment-left" style="">
    <div class="clearfix edgtf-full-section-inner">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="edgtf-section-holder edgtf-sh-col-one edgtf-appeared">
                        <div class="edgtf-sh-title-area">
                            <div class="edgtf-sh-title-area-inner" style="padding-left:9%; padding-right:20%">
                                <div class="edgtf-section-title edgtf-section-align-left">
                                    <a class="edgtf-call-to-action-link" href="/items/share">
                                        Акційні товари магазину <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right " style=""></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="edgtf-sh-content-area">
                            <div class="edgtf-section-item edgtf-vertical-alignment-middle edgtf-horizontal-alignment-left" style="height: 300px;">
                                <div class="edgtf-section-item-inner">
                                    <div class="edgtf-section-item-content">
                                        <div class="edgtf-shop-gallery edgtf-shop-gallery-cols-two">
                                            <div class="products edgtf-shop-list-gallery">
                                                <?php
                                                    if (count($page->last_share_items)>2) {
                                                        $count = 2;
                                                    }
                                                    else {
                                                        $count = count($page->last_share_items);
                                                    }
                                                ?>
                                                @for ($i=0; $i<$count;$i++)
                                                        <div class="edgtf-shop-product product_cat-80 " style="text-align:center;">
                                                            <a href="/item/view/{{$page->last_share_items[$i]->id}}" class="woocommerce-LoopProduct-link">
                                                                <div class="edgtf-gallery-product-image-holder">
                                                                    <img height="300" width="300" src="/assets/images/items/{{$page->last_share_items[$i]->preview_image_name}}" class="attachment-full size-full wp-post-image" alt="g" title="{{$page->last_share_items[$i]->name}}" sizes="(max-width: 800px) 100vw, 800px">
                                                                </div>
                                                            </a>
                                                            <div class="edgtf-gallery-product-meta-wrapper">
                                                                <div class="edgtf-gallery-product-overlay-outer">
                                                                    <div class="edgtf-gallery-product-overlay-inner">
                                                                        <div class="edgtf-gallery-product-info">
                                                                            <a href="/item/view/{{$page->last_share_items[$i]->id}}">
                                                                                <h4 class="edgtf-product-list-product-title">{{$page->last_share_items[$i]->name}}</h4>
                                                                            </a>
                                                                            <span class="price"><span class="woocommerce-Price-amount amount">{{$page->last_share_items[$i]->share_price}}<span class="woocommerce-Price-currencySymbol"> грн.</span></span></span>
                                                                            <div class="edgtf-gallery-product-btn">
                                                                                <a href="/item/view/{{$page->last_share_items[$i]->id}}" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-transparent edgtf-btn-icon" rel="nofollow">
                                                                                    <span class="edgtf-btn-text">Переглянуты</span>
                                                                                    <span class="edgtf-btn-icon-holder">
                                                                                        <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right "></span>
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="edgtf-section-item edgtf-vertical-alignment-middle edgtf-horizontal-alignment-left" style="height: 300px;">
                                <div class="edgtf-section-item-inner">
                                    <div class="edgtf-section-item-content">
                                        <div class="edgtf-shop-gallery edgtf-shop-gallery-cols-two">
                                            <div class="products edgtf-shop-list-gallery">
                                                <?php
                                                if (count($page->last_share_items)>2) {
                                                    $start = 2;
                                                }
                                                ?>
                                                @if (isset($start))
                                                        @for ($i=$start; $i<count($page->last_share_items);$i++)
                                                            <div class="edgtf-shop-product product_cat-80 " style="text-align:center;">
                                                                <a href="/item/view/$page->last_share_items[$i]->id}}" class="woocommerce-LoopProduct-link">
                                                                    <div class="edgtf-gallery-product-image-holder">
                                                                        <img height="300" width="300" src="/assets/images/items/{{$page->last_share_items[$i]->preview_image_name}}" class="attachment-full size-full wp-post-image" alt="g" title="{{$page->last_share_items[$i]->name}}" sizes="(max-width: 800px) 100vw, 800px">
                                                                    </div>
                                                                </a>
                                                                <div class="edgtf-gallery-product-meta-wrapper">
                                                                    <div class="edgtf-gallery-product-overlay-outer">
                                                                        <div class="edgtf-gallery-product-overlay-inner">
                                                                            <div class="edgtf-gallery-product-info">
                                                                                <a href="/item/view/{{$page->last_share_items[$i]->id}}">
                                                                                    <h4 class="edgtf-product-list-product-title">{{$page->last_share_items[$i]->name}}</h4>
                                                                                </a>
                                                                                <span class="price"><span class="woocommerce-Price-amount amount">{{$page->last_share_items[$i]->share_price}}<span class="woocommerce-Price-currencySymbol"> грн.</span></span></span>
                                                                                <div class="edgtf-gallery-product-btn">
                                                                                    <a href="/item/view/{{$page->last_share_items[$i]->id}}" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-transparent edgtf-btn-icon" rel="nofollow">
                                                                                        <span class="edgtf-btn-text">Продивитися</span>
                                                                                        <span class="edgtf-btn-icon-holder">
                                                                                        <span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right "></span>
                                                                                    </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endfor
                                                @endif
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
@endif