<footer>
    <div class="edgtf-footer-inner clearfix">
        <div class="edgtf-footer-top-holder">
            <div class="edgtf-footer-top edgtf-footer-top-full edgtf-footer-top-aligment-left">
                <div class="edgtf-four-columns clearfix">
                    <div class="edgtf-four-columns-inner">
                        @if($about->value != null)
                        <div class="edgtf-column">
                            <div class="edgtf-column-inner">
                                <div class="widget edgtf-footer-column-1 widget_text">
                                    <div class="textwidget">
                                        <h3 class="edgtf-footer-widget-title" style="text-align: center;">Про нас</h3>
                                        <div class="vc_empty_space" style="height: 12px">
                                            <span class="vc_empty_space_inner"></span>
                                        </div>
                                        <div style="padding-right: 25px">
                                            {{ $about->value }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="edgtf-column">
                            <div class="edgtf-column-inner">
                                <div class="widget edgtf-footer-column-2 widget_nav_menu">
                                    <h3 class="edgtf-footer-widget-title" style="text-align: center;">Навігація</h3>
                                    <div class="menu-footer-custom-menu-container">
                                        <ul id="menu-footer-custom-menu" class="menu">
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/">Головна</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/service">Сервіс</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/bicycle_cosmetics">Велокосметика</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/instruments">Інструменти</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/items">Всі товари</a>
                                            </li>

                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/items/share">Всі акції</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/partners">Партнери</a>
                                            </li>
                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3252">
                                                <a href="/news">Новини</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($contacts->email != null)
                        <div class="edgtf-column">
                            <div class="edgtf-column-inner">
                                <div class="widget edgtf-footer-column-3 widget_edgtf_twitter_widget">
                                    <h3 class="edgtf-footer-widget-title" style="text-align: center;">Контакти</h3>
                                    {{$contacts->addresses}}
                                    <br>
                                    {{$contacts->email}}
                                    <br>
                                    {{$contacts->tel}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
