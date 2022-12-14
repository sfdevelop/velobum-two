<?php
$domain = $_SERVER['SERVER_NAME'];
?>
<div class="topbar">
    <div class="topbar-left">
        <a href="/admin" class="logo">
            <span class="text-info">
                {{$domain}}
            </span>
            <i class="text-info">
                {{$domain}}
            </i>
        </a>
    </div>

    <div class="navbar navbar-default" role="navigation">
        <ul class="nav navbar-nav navbar-left nav-menu-left">
            <li>
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user-box">
                <a href="#" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/images/user_default.jpg')}}" alt="user-img" class="img-circle user-img">
                </a>
                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                    <li>
                        <a href="javascript:;" onclick="openSetting();"><span> Настройки </span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/exit"><span> Выйти </span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>