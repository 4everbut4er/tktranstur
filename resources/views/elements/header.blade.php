<header id='header'>
    <div class='container'>
        <nav class='navbar navbar-collapsed-sm navbar-default' id='nav' role='navigation'>
            <div class='navbar-header'>
                <button class='navbar-toggle' data-target='.navbar-header-collapse' data-toggle='collapse' type='button'>
                    <span class='sr-only'>Переключатель навигации</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand' href='{{ route('main') }}'>
                    <img alt="Transtur" width="155" height="39" src="/static/images/logo-transtur-2.png" />
                </a>
            </div>
            <div class='collapse navbar-collapse navbar-header-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <li {{ Request::is('', '/') ? 'class=active' : ''}}>
                        <a href='{{ route('main') }}'><span>Главная</span></a>
                    </li>
                    <li class='dropdown {{ Request::is('services', 'services/*') ? 'active' : ''}}'>
                        <a class='dropdown-toggle' data-delay='50' data-hover='dropdown' data-toggle='dropdown' href='{{ route('services') }}'><span>Услуги<i class='fa fa-angle-down'></i></span></a>
                        <ul class='dropdown-menu' role='menu'>
                            @foreach($service_menu as $el)
                                <li class='dropdown-submenu'>
                                    <a href='#'>{{ $el['text'] }}<i class='fa fa-angle-right'></i></a>
                                    @if(isset($el['items']))
                                        <ul class='dropdown-menu' role='menu'>
                                        @foreach($el['items'] as $sub_el)
                                            <li class=''>
                                                <a href='{{ route('services.detail', isset($sub_el['model_id']) ? $sub_el['model_id'] : 0) }}'>{{ $sub_el['text'] }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li {{ Request::is('catalog/bus', 'catalog/bus/*') ? 'class=active' : ''}}>
                        <a href='{{ route('catalog.bus') }}'><span>Автобусы</span></a>
                    </li>
                    <li {{ Request::is('catalog/tech', 'catalog/tech/*') ? 'class=active' : ''}}>
                        <a href='{{ route('catalog.truck') }}'><span>Спецтехника</span></a>
                    </li>
                    <li>
                        <a href='{{ route('contact') }}#feedback'><span>Онлайн-заказ</span></a>
                    </li>
                    <li {{ Request::is('news', 'news/*') ? 'class=active' : ''}}>
                        <a href='{{ route('news') }}'><span>Новости</span></a>
                    </li>
                    <li {{ Request::is('contact', 'contact/*') ? 'class=active' : ''}}>
                        <a href='{{ route('contact') }}'><span>Контакты</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>