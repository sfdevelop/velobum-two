<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <div id="sidebar-menu">
            <ul class="metisMenu nav" id="side-menu">
                <li class="menu-title">Управление</li>
                <li>
                    <a href="{{route('admin/items')}}">
                        <i class="dripicons-cart"></i> <span> Товарами </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('categories/main')}}">
                        <i class="fi-folder"></i> <span> Категориями </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin/services')}}">
                        <i class="mdi mdi-newspaper"></i> <span> Новости </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin/partners')}}">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Партнерами </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin/slides')}}">
                        <i class=" mdi mdi-image-multiple"></i>
                        <span> Слайдами </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="true">
                        <i class="mdi mdi-note-text"></i><span> Текст. страницами </span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav" aria-expanded="true">
                        <li><a href="{{route('admin/page/get', ['id' => 1])}}">О нас</a></li>
                        <li><a href="{{route('admin/page/get', ['id' => 2])}}">Сервис</a></li>
                        <li><a href="{{route('admin/page/get', ['id' => 3])}}">Велокосметика</a></li>
                        <li><a href="{{route('admin/page/get', ['id' => 4])}}">Инструменты</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin/upload_files')}}">
                        <i class="mdi mdi-file"></i> <span> Файлами </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" id="btn__modal__contacts">
                        <i class="mdi mdi-contact-mail"></i> <span> Контактами </span>
                    </a>
                </li>
                <li>
                    <a id="btn__modal__about" href="javascript:void(0);">
                        <i class="mdi mdi-information-outline"></i> <span> О нас (футер)</span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="clearfix"></div>
    </div>
</div>