<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AllMarket') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdown-menu.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>

        .uk-select:not([multiple]):not([size]) {
            display: none;
        }

        .display-after-cart {


            display: none;

        }

        .do_not_display {
            z-index: 1000;
            width: 200px;
            margin-left: 990px;
            height: 10%;
            position: absolute;
            display: flex;
            background-color: white;
            opacity: 0;
        }

        .loading-cart {
            display: none;
            position: fixed;
            top: 0; right: 0;
            bottom: 0; left: 70%;
            z-index: 100000;
        }

        .loading {
            display: none;
            position: fixed;
            top: 0; right: 0;
            bottom: 0; left: 0;
            z-index: 100000;
        }
        .loader {
            display: none;
            left: 50%;
            margin-left: -4em;
            font-size: 10px;
            border: .8em solid rgba(218, 219, 223, 1);
            border-left: .8em solid rgba(58, 166, 165, 1);
            animation: spin 1.1s infinite linear;
        }
        .loader, .loader:after {
            border-radius: 50%;
            width: 8em;
            height: 8em;
            display: block;
            position: absolute;
            top: 50%;
            margin-top: -4.05em;
        }

        @keyframes spin {
            0% {
                transform: rotate(360deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

    </style>

</head>
<div>
<div id="app">

    <div class="display-after-cart">

    </div>
    @if ($message = Session::get('username'))
        <input type="hidden" id="loginUsername" value="{{Session::get('username')}}">
    @else
        <input type="hidden" id="loginUsername" value="not">
    @endif

    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/images/logo.png" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            @if ($selectedCity = Session::get('city'))
                                {{$selectedCity['title']}}
                            @else
                            Выбрать город
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-city">
                            @foreach($cities as $city)
                                <a class="dropdown-item select_city" href="{{route('selectCity', ['id'=>$city->id, 'title'=>$city->title])}}">{{$city->title}}</a>
                            @endforeach
                            {{--<a class="dropdown-item select_city">Нур-Султан</a>--}}
                            {{--<a class="dropdown-item select_city">Караганда</a>--}}
                            {{--<a class="dropdown-item select_city">Петропавлоск</a>--}}
                            {{--<a class="dropdown-item select_city">Усть-Каменогорск</a>--}}
                            {{--<a class="dropdown-item select_city">Атырау</a>--}}
                            {{--<a class="dropdown-item select_city">Актау</a>--}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        @if ($message = Session::get('username'))
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                               style=" font-family: Montserrat;color: #0EFEC3 !important;">
                                {{$message}}
                            </a>
                            <div class="dropdown-menu profile-menu">
                                <a class="dropdown-item profile-list" href="{{route('accountFavorite')}}">Избранные
                                    товары</a>
                                <a class="dropdown-item profile-list" href="{{route('accountOrders')}}">История заказов</a>
                                <a class="dropdown-item profile-list" href="{{route('accountProfile')}}">Мои данные</a>
                                <a class="dropdown-item profile-list" href="{{route('logout')}}">Выход</a>
                            </div>
                        @else

                            <a class="nav-link" href="#auth" uk-toggle>
                                Войти
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sale')}}">Скидки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('shares')}}">Акции</a>
                    </li>
                    <li class="nav-item">
                        <div style="margin-top: -4px">
                            <div style="display: flex;align-items: center;justify-content: space-between">
                                <a class="nav-link" href="tel:+ 77476574712" style="text-decoration-line: underline;">+
                                    7 747 657 47 12</a>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between">
                                <div class="tel-title">единный справочный номер</div>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item phone">
                        <a class="nav-link" href="tel:+ 77476574712">
                            <img src="/images/phone.png" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <nav class="mobile-nav">
        <div class="d-flex flex-row">
            <div class="mobile-logo">
                <a href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="" style="max-width: 95%">
                </a>
            </div>
            <div class="mobile-phone">
                <div style="display: flex;justify-content: space-around;">
                    <a href="tel:+ 77476574712">
                        <img class="nav-link" src="/images/mobile-phone.png" alt="">
                    </a>
                </div>

            </div>
            <div class="mobile-cart" id="mobile_cart" onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1');$('body').addClass('nooverflow');$('.mobile-nav').addClass('mobile-nav-after-cart');
$('#mobile_close').show(); $('#mobile_cart').hide()">
                <div style="display: flex;justify-content: space-around;">
                    <a class="" href="#">
                        <img class="nav-link " src="/images/mobile-cart.png" alt="">
                    </a>
                </div>


            </div>
            <div class="mobile-cart" id='mobile_close' onclick="$('#cart-cont').removeClass('open');$('body').removeClass('nooverflow1');$('body').removeClass('nooverflow');$('.mobile-nav').removeClass('mobile-nav-after-cart')
$('#mobile_cart').show(); $('#mobile_close').hide();"
                 style="display: none">
                <a href="#">
                    <img class="nav-link" src="/images/mobile-close-cart.png" alt="">
                </a>
            </div>
            <div class="mobile-expand">
                <div style="display: flex;justify-content: space-around;" class="collapsible ">
                    <img class="nav-link" src="/images/mobile-menu-list.png" alt="">
                </div>

                <div class="content-mobile-menu flex-column">
                    <div><a class="menu-links" href="{{route('sections')}}">Категории</a></div>
                    <hr>
                    <div>
                        <div class="uk-margin">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: #7791A4">
                                        @if ($selectedCity = Session::get('city'))
                                            {{$selectedCity['title']}}
                                        @else
                                            Выбрать город
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-city">
                                        @foreach($cities as $city)
                                            <a class="dropdown-item select_city" href="{{route('selectCity', ['id'=>$city->id, 'title'=>$city->title])}}" style="color:#7791A4">{{$city->title}}</a>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>

                    @if ($message = Session::get('username'))
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">

                        <a class="menu-links dropdown-toggle" href="#" id="navbardrop-1" data-toggle="dropdown"
                           style=" font-family: Montserrat;color: #0EFEC3 !important;">
                            {{$message}}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/account#account-favorite">Избранные товары</a>
                            <a class="dropdown-item" href="/account#account-order">История заказов</a>
                            <a class="dropdown-item" href="/account#account-profile">Мои данные</a>
                            <a class="dropdown-item" href="{{route('logout')}}">Выход</a>
                        </div>
                            </li></ul>
                    @else

                        <div href="#auth" uk-toggle>Вход</div>
                        <div href="#auth" uk-toggle>Регистрация</div>
                    @endif
                    <div><a class="menu-links" href="{{route('sale')}}">Скидки</a></div>
                    <div><a class="menu-links" href="{{route('shares')}}">Акции</a></div>
                    <div><a class="menu-links" href="{{route('faq')}}">F.A.Q</a></div>
                    <div><a class="menu-links" href="{{route('about')}}">О нас</a></div>
                    <hr>
                    <div class="d-flex flex-row" style="justify-content: center;">
                        <div class="social-mobile">
                            <a href="https://apps.apple.com/kz/app/allmarket-%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD-%D1%81%D1%83%D0%BF%D0%B5%D1%80%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82/id1438100445"><img class="social-img" src="/images/apple.svg" alt="" width="48px" height="49px"></a>
                        </div>
                        <div class="social-mobile">
                            <a href="https://play.google.com/store/apps/details?id=com.batman.almas.altyn_alma&hl=ru"><img class="social-img" src="/images/play.svg" alt="" width="48px" height="49px"></a>
                        </div>
                        <div class="social-mobile">
                            <a href=""><img class="social-img" src="/images/fb.svg" alt="" width="48px" height="49px"></a>
                        </div>
                        <div class="social-mobile">
                            <a href="https://instagram.com/allmarket.kz?igshid=1kn0k00hbuy31"><img class="social-img" src="/images/inst.svg" alt="" width="48px" height="49px"></a>
                        </div>
                        <div class="social-mobile">
                            <a href="https://wa.me/77712101512"><img class="social-img" src="/images/wpp.svg" alt="" width="48px" height="49px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="navbar-second">
        <div class="container">
            <div class="d-flex flex-row mb-3">
                <div class="p-2 category-web hover-category">
                    <div class="d-flex flex-row ">
                        <div>
                            <a href=><img src="/images/категории.png" alt=""></a>
                        </div>
                        <div style="margin-top: -4px">
                            <div style="display: flex;align-items: center;justify-content: space-between">
                                <a href="{{route('sections')}}">
                                    <div class="category ">Категории</div>
                                </a>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between">
                                <div class="category-title">все товары по разделам</div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="showCategory" style="display: none; position: absolute; z-index: 100">
                    <nav id="menuVertical">
                        <ul style="padding: 0; margin: 0">
                            @foreach($sections as $section)
                                <li style="display: flex; justify-content: space-between; margin-top: 10px"
                                    class="showSub">
                                    <a href="{{route('sectionById', $section->id)}}" class="showCategoryLink"
                                       style="margin-left: 20px;">
                                        <img src="/images/category/icons/{{$section->system_key}}.png" alt=""
                                             style="margin-right: 10px"
                                             height="25px" width="25px">
                                        {{$section->title}}
                                    </a>
                                    <img src="/images/Arrow.png" alt=""
                                         style="height: 15px; margin-top: 7px; margin-left: -63px">
                                    @if($loop->index == 0)
                                        <div class="showSubCategory" style="z-index: -1;">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [$section->id, 5])}}">Крупы и
                                                        хлопья</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 12])}}">Конфеты
                                                        и кондитерские изделия</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 13])}}">Лапша и
                                                        макаронные изделия</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 14])}}">Молочная
                                                        продукция</a></li>
                                                <li>
                                                    <a href="{{route('category_products', [$section->id, 15])}}">Масло</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('category_products', [$section->id, 16])}}">Колбаса, сыр</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('sectionById', 1)}}" style="color: #1f6fb2">Все категории</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 1)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [$section->id, 1])}}">Кофе, какао</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 2])}}">Чай</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 23])}}">Сокии морсы</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 24])}}">Напитки</a></li>
                                                <li><a href="{{route('category_products', [$section->id, 25])}}">Вода</a></li>
                                                {{--<li><a href="{{route('category_products', [$section->id, 57])}}">Алкоголь</a></li>--}}
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 2)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [3, 26])}}">Уход за
                                                        волосами</a></li>
                                                <li><a href="{{route('category_products', [3, 27])}}">Уход за телом</a></li>
                                                <li><a href="{{route('category_products', [3, 28])}}">Уход за полостью рта</a></li>
                                                <li><a href="{{route('category_products', [3, 29])}}">Средства для бритья</a></li>
                                                <li><a href="{{route('category_products', [3, 30])}}">Косметика</a></li>
                                                <li><a href="{{route('category_products', [3, 31])}}">Личная гигиена</a></li>
                                                <li>
                                                    <a href="{{route('sectionById', 3)}}" style="color: #1f6fb2">Все категории</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 3)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [4, 32])}}">Средства для стирки</a></li>
                                                <li><a href="{{route('category_products', [4, 33])}}">Средства для ухода за домом</a></li>
                                                <li><a href="{{route('category_products', [4, 47])}}"> Посудомоечные средства</a></li>
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 4)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [5, 34])}}">Подгузники</a></li>
                                                <li><a href="{{route('category_products', [5, 35])}}">Детское питание</a></li>
                                                <li><a href="{{route('category_products', [5, 36])}}">Детская косметика</a></li>
                                                <li><a href="{{route('category_products', [5, 37])}}">Игрушки и аксессуары</a></li>
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 5)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [6, 10])}}">Корма для собак</a></li>
                                                <li><a href="{{route('category_products', [6, 11])}}">Корма для кошек</a></li>
                                                <li><a href="{{route('category_products', [6, 38])}}">Аксессуары для животных</a></li>
                                            </ul>
                                        </div>
                                    @elseif($loop->index == 6)
                                        <div class="showSubCategory" style="z-index: -1">
                                            <ul class="submenu">
                                                <li><a href="{{route('category_products', [7, 39])}}">Бумага</a></li>
                                                <li><a href="{{route('category_products', [7, 41])}}">Пакеты</a></li>
                                                <li><a href="{{route('category_products', [7, 42])}}">Перчатки</a></li>
                                                <li><a href="{{route('category_products', [7, 39])}}">Инсектициды</a></li>
                                                <li><a href="{{route('category_products', [7, 39])}}">Осведители воздуха и ароматизаторы</a></li>
                                                <li><a href="{{route('category_products', [7, 39])}}">Хозяйственные принадлежности</a></li>
                                                <li>
                                                    <a href="{{route('sectionById', 7)}}" style="color: #1f6fb2">Все категории</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="p-2 search-div">
                    <form action="{{route('search')}}" method="GET">
                        <input id="search" type="text" class="search" name="title" placeholder="Что то искали?"
                               style="outline:none;" required>
                        <button type="submit" class="btn-search" style="outline:none;">
                            <img src="/images/search.svg" alt="">
                        </button>
                    </form>

                    <div class="searchRes" style="display: none">
                        <div>
                            <h4 class="search-res-title" style="margin-left: 30px">Товары</h4>
                            <ul style="list-style: none; margin-top: -15px">
                                <li class="searchItems">
                                    <img src="/images/search.png" alt="">
                                    <a class="searchLink" href="https://dev.allmarket.kz/search?title='лук'">Лук</a>
                                </li>
                                <li class="searchItems">
                                    <img src="/images/search.png" alt="">
                                    <a class="searchLink" href="https://dev.allmarket.kz/search?title='лук'">Лук
                                        репчатый</a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div>
                            <h4 class="search-res-title" style="margin-left: 30px">Категории</h4>
                            <ul style="list-style: none; margin-top: -15px">
                                <li class="searchItems">
                                    <a class="searchLink" href="">Овощи / Фрукты</a>
                                </li>
                                <li class="searchItems">
                                    <a class="searchLink" href="">Детские товары</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="p-2 cart-div">
                    <div class="d-flex" id="cart">
                        <button class="btn-cart" style="outline:none;"
                                onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1 cart-active-bg minus-z-index');$('body').addClass('nooverflow'); $('.carzina-sign').html('X'); $('.display-after-cart').addClass('do_not_display')">
                            <img class="carzina-sign" src="/images/corzina.svg" alt="">
                        </button>
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between">
                                <div class="cart-p">Товары:</div>
                                <div class="cart-p" style="margin-left: 50px">
                                    <span class="cart-product-count"> {{$count}} </span> шт
                                </div>
                            </div>
                            <div
                                style="display: flex;align-items: center;justify-content: space-between; margin-top: -15px">
                                <div class="cart-p">Сумма:</div>
                                <div class="cart-p" style="margin-left: 15px" id="cart-sum"><span
                                        class="cart-product-price">{{$prices}} </span> тг
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="munu_line_devider">
        <hr class="menu-blackline">
        <hr class="menu-line">
    </div>

    <input type="hidden" name="hidden_session_phone" value="{{Session::get('phone')}}">

    <div class="container">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @elseif  ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

    </div>


    <div class="container additional-menu" style="margin-top: -15px">
        <div class="d-flex flex-row-reverse">
            <p class="p-2" style="margin-top: 0px !important;">
                <a href="{{route('about')}}" class="under-line-menu">О нас</a>
            </p>
            <p class="p-2" style="margin-top: 0px !important;">
                <a href="{{route('faq')}}" class="under-line-menu">F.A.Q</a>
            </p>
        </div>
    </div>

    <div class="loading">
        <div class="loader"></div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer id="main-footer">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <div class="d-flex flex-column">
                        <img src="/images/footer-logo.png" alt="" width="278px" height="39">
                        <p class="footer-title">Сервис по доставке продуктов</p>
                        <div class="d-flex flex-row">
                            <div class="social">
                                <a href="https://apps.apple.com/kz/app/allmarket-%D0%BE%D0%BD%D0%BB%D0%B0%D0%B9%D0%BD-%D1%81%D1%83%D0%BF%D0%B5%D1%80%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82/id1438100445">
                                    <img class="social-img" src="/images/apple.svg" alt="" width="48px" height="49px">
                                </a>
                            </div>
                            <div class="social">
                                <a href="https://play.google.com/store/apps/details?id=com.batman.almas.altyn_alma&hl=ru">
                                    <img class="social-img" src="/images/play.svg" alt="" width="48px"
                                         height="49px" style="margin-left: 4px">
                                </a>
                            </div>
                            <div class="social">
                                <a href="">
                                    <img class="social-img" src="/images/fb.svg" alt="" width="48px"
                                         height="49px">
                                </a>
                            </div>
                            <div class="social">
                                <a href="https://instagram.com/allmarket.kz?igshid=1kn0k00hbuy31">
                                    <img class="social-img" src="/images/inst.svg" alt="" width="48px" height="49px">
                                </a>
                            </div>
                            <div class="social">
                                <a href="https://wa.me/77712101512">
                                    <img class="social-img" src="/images/wpp.svg" alt="" width="48px"
                                         height="49px">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <ul class="list-unstyled">
                        @if ($message = Session::get('username'))
                            <li>
                                <a class="footer-link" href="{{route('account')}}" id="navbardrop"
                                   style=" font-family: Montserrat;color: #0EFEC3 !important;">
                                    {{$message}}
                                </a>
                            </li>
                        @else

                            <li>
                                <a href="#auth" uk-toggle class="footer-link">вход/ регистрация</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('sale')}}" class="footer-link">скидки</a>
                        </li>
                            <li>
                                <a href="{{route('shares')}}" class="footer-link">акции</a>
                            </li>
                        <li>
                            <a href="{{route('about')}}" class="footer-link">о нас</a>
                        </li>
                        <li>
                            <a href="{{route('faq')}}" class="footer-link">доставка и оплата</a>
                        </li>
                        <li>
                            <a href="{{route('faq')}}" class="footer-link">помощь покупателю </a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('home')}}#popular" class="footer-link">популярные товары</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}#sale" class="footer-link">товары со скидкой</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}#recomended" class="footer-link">Рекомендованные товары</a>
                        </li>
                        <li>
                            <a href="http://onelink.to/rs5shb" class="footer-link">наше приложение</a>
                        </li>
                        <li>
                            <a href="{{route('home')}}#partners" class="footer-link">наши партнеры</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->
</div>

<div id="auth" uk-modal>
    <div class="uk-modal-dialog" style="background: none">
        <button class="uk-modal-close-default" type="button" uk-close style="color:white"></button>
        <div class="uk-modal-body">
            <div class="forms">
                <ul class="tab-group" style="display: flex">
                    <li class="tab active signIn">
                        <div class="authBtnText"><a href="#login" class="login-btn-text">Войти</a></div>
                        <div class="login-subtext">Покупали раньше?</div>
                    </li>
                    <li class="tab signUp">
                        <div class="authBtnText"><a href="#signup" class="signUp-btn-text">Регистрация</a></div>
                        <div class="signUp-subtext">Пройди регистрацию за 1 минуту</div>
                    </li>
                </ul>
                <form id="login" class="login-form">
                    <h1 class="login-title">Ведите свои данные</h1>
                    <div class="tab input-field d-flex flex-column">
                        <input type="text" id="tel" class="input-text-login" name="phone" placeholder="Номер телефона"
                               value="" required>
                        <a href="#signin-next" class="login-title-btn btn-submit" style="padding-top: 12.5px;"
                           id="loginBtn">Авторизоваться</a>
                    </div>
                </form>
                <form id="signup" class="signUp-form" style="text-align: center">
                    @csrf
                    <h1 class="reg-title">Введите свои данные</h1>
                    <div class="tab input-field d-flex flex-column">
                        <input type="text" class="input-text" placeholder="Ваше имя" name="register-name" required>
                        <input type="text" id="tel-reg" class="input-text" name="register-phone"
                               placeholder="Номер телефона" value="" required>
                        <div class="input-select">
                            <select id="" class="input-select-option" name="city_id">
                                @foreach($cities as $city)
                                    <option class="input-select-option-inside"
                                            value="{{$city->id}}">{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="#signup-finish" class="btn-submit" id="RegisterBtn">Зарегистрироваться</a>


                    </div>
                    <div style="justify-content: center">
                        <p class="aggrement">Нажимая «зарегистрироваться», вы соглашаетесь
                            с <a href="{{ config('app.url') }}/files/politika.pdf" target="_blank">«Политика
                                конфиденциальности»</a></p>
                    </div>
                </form>
                <form action="{{route('sendSms')}}" method="POST" id="signin-next" class="signIn-form"
                      style="text-align: center; display: none">
                    @csrf
                    <div class="d-flex flex-column">
                        <h1 class="login-title">введите код подтверждения</h1>
                        <div class="flex-row">
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="one"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="two"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="three"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="four"/>
                        </div>
                        <input type="submit" class="login-title-btn" value="Авторизоваться">
                    </div>
                </form>

                <form action="{{route('sendSms')}}" method="POST" id="signup-finish" class="signUp-form">
                    @csrf
                    <div class="d-flex flex-column" style="display: flex; justify-content: center; align-items: center">
                        <h1 class="signup-title">введите код подтверждения</h1>
                        <div class="flex-row">
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="one"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="two"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="three"/>
                            <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9"
                                   pattern="[0-9]{1}" name="four"/>
                        </div>
                        <input type="submit" class="btn-submit" id="RegisterBtn" value="Завершить регистрацию">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="cart-cont">
    <div class="loading-cart">
        <div class="loader"></div>
    </div>
    <div>
        <button id="close-cart" onclick="$('#cart-cont').removeClass('open');$('body').removeClass('nooverflow1 cart-active-bg minus-z-index');
                    $('body').removeClass('nooverflow');"></button>
        <div id="close-mask" class="empty_cart_block empty-cart"></div>
        <div id="cart-cart" class="empty_cart_block empty-cart">
            <div class="newcart" id="for_the_scroll">
                <div id="newcart">
                    <div class="cart-content">
                        <div class="empty_cart" id="empty_cart">
                            <div class="d-flex flex-row justify-content-between cart-header"
                                 style="align-items: center !important;">
                                <div class="top-cart-cart">Корзина</div>
                                <div><a href="#" class="clear-cart" onclick="clearCart()">очистить все</a></div>
                            </div>
                            @if(session('cart'))
                                <div class="non-empty-cart" id="cart-after">
                                    <h2 class="cart-top-title">Товары:</h2>
                                    <hr>
                                    <div class="cart-empty"
                                         style="display:none;align-items:center !important;justify-content:center;padding: 66px">
                                        <h2 class="empty-title">Ваша корзина пуста</h2>
                                    </div>
                                    {{--                                    <div class="empty-cart-after-delete"></div>--}}
                                    <div id="cart-data-table">
                                        <?php $CartTotal = 0 ?>

                                        @foreach(session('cart') as $id => $details)
                                            @if(!array_key_exists('type', $details))
                                            <?php $CartTotal += $details['price'] * $details['quantity'] ?>
                                            <div class="cart-product" id="cart-product-{{$id}}" style="padding: 20px;">
                                                <div class="row">
                                                    <div class="col-md-4 cart-img">
                                                        <div class="div-cart-image"
                                                             style="height: 80px; display: flex; justify-content: center">
                                                            <img class="cart-image" src="{{$details['image']}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 cart-title-style" style="width: 170px">
                                                        <div class="cart-title">
                                                            {{ Str::of($details['title'])->limit(15) }}
                                                        </div>
                                                        <div class="cart-category">{{$details['category']}}</div>
                                                        <div class="cart-price" id="cart-price-{{$id}}"
                                                             style="margin-top: 10px">{{$details['price'] * $details['quantity']}} тг
                                                        </div>
                                                        <input type="hidden" value="{{$details['price']}}"
                                                               id="current-price-{{$id}}">
                                                        <div
                                                            style="margin-top: 29px; position: absolute; left: 79px; bottom: 0">
                                                            <div class="cart-qty">
                                                                <span id="cart-minus"
                                                                      class="cart-minus-{{$id}}">-</span>
                                                                <input type="number" class="cart-count" name="qty"
                                                                       value="{{$details['quantity']}}"
                                                                       id="cart-count-{{$id}}">
                                                                <span id="cart-plus" class="cart-plus-{{$id}}">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="width: 50px">
                                                        <div><span class="remove-from-cart" onclick="remove_cart({{$id}})">
                                                            <img src="/images/exit.png" alt="">
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container product-container" id="product-container-{{$id}}">
                                                <hr class="cart-product-devider">
                                            </div>
                                            @endif
                                        @endforeach
                                    <h2 class="cart-top-title">Предложения:</h2>
                                    <div class="newcart">
                                            <div id="cartSales" style="margin-bottom: 200px">
                                                @foreach(session('cart') as $id => $details)
                                                    @if(array_key_exists('type', $details))
                                                        <?php $CartTotal += $details['price'] * $details['quantity'] ?>
                                                        <div class="cart-product" id="cart-product-{{$id}}" style="padding: 20px;">
                                                            <div class="row">
                                                                <div class="col-md-4 cart-img">
                                                                    <div class="div-cart-image"
                                                                         style="height: 80px; display: flex; justify-content: center">
                                                                        <img class="cart-image" src="{{$details['image']}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 cart-title-style" style="width: 170px">
                                                                    <div class="cart-title">
                                                                        {{ Str::of($details['title'])->limit(15) }}
                                                                    </div>
                                                                    <div class="cart-category">{{$details['category']}}</div>
                                                                    <div class="cart-price" id="cart-price-{{$id}}"
                                                                         style="margin-top: 10px">{{$details['price'] * $details['quantity']}} тг
                                                                    </div>
                                                                    <input type="hidden" value="{{$details['price']}}"
                                                                           id="current-price-{{$id}}">
                                                                </div>
                                                                <div class="col-md-2" style="width: 50px">
                                                                    {{--<div><span class="remove-from-cart" onclick="remove_cart({{$id}})">--}}
                                                            {{--<img src="/images/exit.png" alt="">--}}
                                                        {{--</span>--}}
                                                                    {{--</div>--}}
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="container product-container" id="product-container-{{$id}}">
                                                            <hr class="cart-product-devider">
                                                        </div>
                                                    @endif
                                                @endforeach



                                </div>

                                    </div>

                            @else
                                <h2 class="cart-top-title" style="display:none;">Товары:</h2>
                                <div class="cart-empty"
                                     style="display:flex;align-items:center !important;justify-content:center;padding: 66px">
                                    <h2 class="empty-title">Ваша корзина пуста</h2>
                                </div>
                                <div id="cart-data-table">
                                </div>
                                {{--<h2 class="cart-top-title" style="display: none">Предложения:</h2>--}}
                                {{--<div id="cartSales">--}}

                                {{--</div>--}}
                            @endif
                        </div>
                    </div>
                                <h2 class="cart-top-title" style="display: none">Предложения:</h2>
                                <div id="cartSales">

                                </div>
                </div>
            </div>

                    <div class="cart-bottom">
                        <div class="row" style="flex-wrap: nowrap">
                            <div class="col-md-4 col-4">
                                <div class="cart-total-price-title">Итого:</div>
                                <div class="cart-bonus" style="margin-top: 10px">Потратить бонусы: <span
                                            class="bonus-price">{{Session::get('ballance') ?? 0}}</span></div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-total-price-money"><?=$CartTotal ?? ''?> тг</div>
                                <div style="margin-top: 10px">
                                    <label class="form-switch">
                                        <input type="checkbox" id="bonusOn" onchange="showModalBonus()">
                                        <i></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-left: -45px">

                                <input class="cart-promocode-input" type="text"
                                       placeholder="Ввести промокод" id="promocode" >
                                <input class="cart-promocode-btn" value="Активировать" onclick="checkPromocode()">
                            </div>
                        </div>
                        <div class="flex-row"
                             style="display:flex;justify-content: center; align-items: center; margin-top: 10px">
                            <button type="submit" class="checkout-btn" onclick="checkout()">Оформить заказ
                            </button>
                        </div>
                    </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                Товар добавлен в корзину
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="your-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">

            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $('#close-mask').click(function () {
        $('#cart-cont').removeClass('open');
        $('body').removeClass('nooverflow1');
        $('body').removeClass('nooverflow');
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.tab a').on('click', function (e) {
            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');

            var href = $(this).attr('href');
            $('.forms > form').hide();
            $(href).fadeIn(500);
        });
    });
</script>

<script>
    $(function() {
        'use strict';

        var body = $('body');

        function goToNextInput(e) {
            var key = e.which,
                t = $(e.target),
                sib = t.next('.verify-code-input');

            if (!sib || !sib.length) {
                sib = body.find('.verify-code-input').eq(0);
            }

            sib.select().focus();
        }

        function onKeyDown(e) {
            var key = e.which;

            if (key === 9 || (key >= 48 && key <= 107) ) {
                return true;
            }

            e.preventDefault();
            return false;
        }

        function onFocus(e) {
            $(e.target).select();
        }

        body.on('keyup', '.verify-code-input', goToNextInput);
        body.on('keydown', '.verify-code-input', onKeyDown);
        body.on('click', '.verify-code-input', onFocus);

    })
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    $('.cart-count').prop('disabled', true);
    $(document).on('click', '#cart-plus', function (e) {
        var id = $(this).attr('class').replace('cart-plus-', ''),
            product_count = $('#cart-count-' + id),
            current_price = $('#current-price-' + id).val();
        product_count.val(parseInt(product_count.val()) + 1)
        $('#cart-price-' + id).html(parseInt(current_price) * parseInt(product_count.val()) + ' тг');
        addToCart(id, 1, false)
        total_price()
    });
    $(document).on('click', '#cart-minus', function () {
        var id = $(this).attr('class').replace('cart-minus-', ''),
            current_price = $('#current-price-' + id).val(),
            product_count = $('#cart-count-' + id);
        if (product_count.val() > 1) {
            product_count.val(parseInt(product_count.val()) - 1)
            $('#cart-price-' + id).html(parseInt(current_price) * parseInt(product_count.val()) + ' тг');
            removeToCart(id, 1, false)
        }

        total_price()
    });

    function remove_cart(product_id) {

        $('.loading-cart').css('display', 'block')

            $.ajax({
                url: '/cart/remove/' + product_id + '/' + 0,
                success: function (data) {
                    $('#cart-product-' + product_id).remove()
                    $('#product-container-' + product_id).remove()
                    if (data.count == false) {
                        $('.cart-empty').show()
                        $('.cart-top-title').hide()
                        $('.cart-bottom').hide();
                    }

                  //  updateCart();
                    updateCartData()
                },
                error: function (XMLHttpRequest) {
                    $('.loading-cart').css('display', 'none')
                }
            });
        total_price()
    }

    function total_price() {
        var total_product_val = 0
        $('.cart-price').each(function () {
            total_product_val = total_product_val + parseInt($(this).html().replace('тг', ''))
        });
        $('.cart-total-price-money').html(total_product_val)
    }

</script>

<script>
    window.addEventListener("DOMContentLoaded", function () {
        function setCursorPosition(pos, elem) {
            elem.focus();
            if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
            else if (elem.createTextRange) {
                var range = elem.createTextRange();
                range.collapse(true);
                range.moveEnd("character", pos);
                range.moveStart("character", pos);
                range.select()
            }
        }

        function mask(event) {
            var matrix = "+7(___)_______",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, "");
            if (def.length >= val.length) val = def;
            this.value = matrix.replace(/./g, function (a) {
                return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
            });
            if (event.type == "blur") {
                if (this.value.length == 2) this.value = ""
            } else setCursorPosition(this.value.length, this)
        };
        var input = document.querySelector("#tel");
        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
    });
</script>

<script>
    window.addEventListener("DOMContentLoaded", function () {
        function setCursorPosition(pos, elem) {
            elem.focus();
            if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
            else if (elem.createTextRange) {
                var range = elem.createTextRange();
                range.collapse(true);
                range.moveEnd("character", pos);
                range.moveStart("character", pos);
                range.select()
            }
        }

        function mask(event) {
            var matrix = "+7(___)_______",
                i = 0,
                def = matrix.replace(/\D/g, ""),
                val = this.value.replace(/\D/g, "");
            if (def.length >= val.length) val = def;
            this.value = matrix.replace(/./g, function (a) {
                return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
            });
            if (event.type == "blur") {
                if (this.value.length == 2) this.value = ""
            } else setCursorPosition(this.value.length, this)
        };
        var input = document.querySelector("#tel-reg");
        input.addEventListener("input", mask, false);
        input.addEventListener("focus", mask, false);
        input.addEventListener("blur", mask, false);
    });
</script>

<script>
    $(document).ready(function () {
        $("#loginBtn").click(function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var phone = $("input[name='phone']").val();

            $.ajax({
                url: '{{ route('login') }}',
                type: 'POST',
                data: {
                    phone: phone
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg-login").find("ul").html('');
            $(".print-error-msg-login").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
            });
        }
    });

    $(document).ready(function () {
        $("#RegisterBtn").click(function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var name = $("input[name='register-name']").val();
            var phone = $("input[name='register-phone']").val();
            var cityId = 6

            $.ajax({
                url: '{{ route('registration') }}',
                type: 'POST',
                data: {
                    name: name,
                    phone: phone,
                    city_id: cityId
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg-login").find("ul").html('');
            $(".print-error-msg-login").css('display', 'block');
            $.each(msg, function (key, value) {
                $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
            });
        }
    });


    function checkout() {
        total_price()
        var price = parseInt($('.cart-total-price-money').text())
        if (price < 5000) {
            $('#favorite-modal-body').html('')
            $('#favorite-modal-body').append('Минимальная сумма заказа 5000 тенге')
            $('#favoriteModal').modal('toggle');

        } else {
            $.ajax({
                url: '{{ route('checkoutCart') }}',
                type: 'GET',
                success: function (data) {
                },
                error: function (XMLHttpRequest) {
                    $('#modal-body').html('')
                    $('#modal-body').append('Произошла ошибка попробуйте позже')
                    $('#your-modal').modal('toggle');
                }
            });


            $('#cart-cart').html(`
                <div class="cart-checkout">
                    <div class="d-flex flex-row justify-content-between cart-header" style="align-items: center !important;">
                        <div class="top-cart-cart">Корзина: Оформить заказ</div>
                    </div>
                    <h2 class="cart-top-title">Оплата:</h2>
                    <hr class="cart-hr">
                    <div class="payment-method d-flex flex-column">
                        <div class="item" style="display: block;">
                          <input type="radio" id="cash" name="payment_method" value="1">
                          <label for="cash" style="display: inline;">Наличными при получении заказа</label>
                        </div>
                        <div class="item" style="display: block;">
                          <input type="radio" id="card-online" name="payment_method" value="2">
                          <label for="card-online" style="display: inline;">Банковской картой онлайн</label>
                        </div>
                        <div class="item" style="display: block;">
                          <input type="radio" id="card-offline" name="payment_method" value="3">
                          <label for="card-offline" style="display: inline;">Банковской картой при получении заказа</label>
                        </div>
                    </div>
                    <div class="address-cart">
                        <h2 class="cart-top-title">Адрес доставки:</h2>
                    </div>
                    <hr class="cart-hr">
                    <div class="checkout-address" style="display: flex; justify-content: center; margin-top: 10px">
                        <div class="input-select justify-content-center" style="background: linear-gradient(0deg, #E3EDF7, #E3EDF7);box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);border-radius: 17.5px;width: 90%;height: 35px; align-items: center">
                            <select id="" class="input-select-option" name="city_id" style="font-family: Montserrat;font-style: normal;font-weight: 500;font-size: 13px;line-height: 16px;align-items: center;text-align: center;color: #43637A;background: linear-gradient(0deg, #E3EDF7, #E3EDF7)">
                                @if ($selectedCity = Session::get('city'))
                <option class="input-select-option-inside" value="$selectedCity['id']">{{$selectedCity['title']}}</option>

                                @else

                                @foreach($cities as $city)
                <option class="input-select-option-inside" value="{{$city->id}}">{{$city->title}}</option>
                                @endforeach
                @endif
                </select>
            </div>
        </div>
        <div style="display: flex; justify-content: center; margin-top: 10px">
            <input type="text" class="input-street" name="street" placeholder="Улица" required>
        </div>
        <div class="flex-row" style="display: flex;justify-content: center; margin-top:10px">
            <input type="" class="input-house" name="home" placeholder="Дом" required>
            <input type="" class="input-house" name="apt" placeholder="Квартира" style="margin-left: 6px" required>
        </div>
        <div class="address-cart">
            <h2 class="cart-top-title">Время доставки:</h2>
        </div>
        <hr class="cart-hr">
        <div class="checkout-address" style="display: flex; justify-content: center">
            <div class="input-select justify-content-center" style="background: linear-gradient(0deg, #E3EDF7, #E3EDF7);box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);border-radius: 17.5px;width: 90%;height: 35px; align-items: center">
                <select id="" class="input-select-option" name="delivery_time_id" style="font-family: Montserrat;font-style: normal;font-weight: 500;font-size: 13px;line-height: 16px;align-items: center;text-align: center;color: #43637A;background: linear-gradient(0deg, #E3EDF7, #E3EDF7)" required>
                    <option class="input-select-option-inside" value="">Время доставки</option>
                    @if(Session::get('username') != null)
                    @foreach (Session::get('orders_delivery_times') as $time)
                         <option class="input-select-option-inside" value="{{$time->id}}">{{$time->title}}</option>
                    @endforeach
                    @else
                        <option class="input-select-option-inside" value="1">До обеда</option>
                        <option class="input-select-option-inside" value="2">После обеда</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="address-cart">
            <h2 class="cart-top-title">Комментарий:</h2>
        </div>
        <hr class="cart-hr">
         <div style="display: flex; justify-content: center; margin-top: 10px">
            <input type="text" class="input-street" name="comment" placeholder="Необязательно">
        </div>

    </div>
    <div class="cart-bottom" style="margin-top: 20px">
        <div class="flex-row" style="display:flex;justify-content: center; align-items: center;">
            <button type="submit" class="checkout-btn" onclick="checkout_finish()">Подтвердить заказ</button>
        </div>
    </div>
`)
        }

    }

    function checkout_finish() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var address = $("input[name='street']").val() + " " + $("input[name='home']").val() + " " + $("input[name='apt']").val();
        var phone = $("input[name='hidden_session_phone']").val();
        var delivery_time_id = $("select[name='delivery_time_id']").val();
        var comment = $("input[name='comment']").val();
        var payment_type = document.querySelector('input[name="payment_method"]:checked').value;

        $.ajax({
            url: '{{ route('createOrder') }}',
            type: 'POST',
            data: {
                address: address,
                phone: phone,
                delivery_time_id: delivery_time_id,
                comment: comment,
                payment_type: payment_type
            },
            success: function (data) {
                jsonData = JSON.parse(data)
                jsonData.epay.params.BackLink = "{{env('APP_URL')}}"
                jsonData.epay.params.FailureBackLink = "{{env('APP_URL')}}"
                params = $.param( jsonData.epay.params)
                location.href=jsonData.epay.url + '?' + params
            },
            error: function (XMLHttpRequest) {
                $('#modal-body').html('')
                $('#modal-body').append('Произошла ошибка попробуйте позже')
                $('#your-modal').modal('toggle');
            }
        });


        $('#cart-cart').html(`
                <div class="cart-checkout">
                    <div class="d-flex flex-row justify-content-between cart-header" style="align-items: center !important;">
                        <div class="top-cart-cart">Корзина: Оформить заказ</div>
                    </div>

                <div id="checkout-body-finish" class="checkout-body-finish" style="display: flex; justify-content: center; align-items: center; margin-top: 20px">
                    <h2 class="thanks-cart" style="display: flex; justify-content: center; align-items: center">Спасибо за заказ</h2>
                </div>
                <div id="checkout-body-finish" class="checkout-body-finish" style="display: flex; justify-content: center; align-items: center; margin-top:20px">
                    <img src="/images/thanks.png" alt="">
                </div>
                 <div id="checkout-body-finish" class="checkout-body-finish" style="display: flex; justify-content: center; align-items: center; margin-top: 20px">
                    <h2 class="thanks-cart-subtitle" style="display: flex; justify-content: center; align-items: center">Наш оператор свяжется с Вами сразу после обработки заказа</h2>
                </div>
                <div class="cart-empty"
                     style="display:none;align-items:center !important;justify-content:center;padding: 66px">
                    <h2 class="empty-title">Ваша корзина пуста</h2>
                </div>


                <div class="cart-bottom" style="margin-top: 20px">
                    <div class="flex-row" style="display:flex;justify-content: center; align-items: center;">
                        <button type="submit" class="checkout-btn" onclick="checkout_finish_reload()">Перейти на главную страницу</button>
                    </div>
                </div>

            `);

        updateCart();
        updateCartData();





    }

    function updateCartAfter() {
        $('.cart-empty').show()
        console.log("Clear cart")
        $('.checkout-body-finish').hide()
        checkout_finish_reload()

    }

    function checkout_finish_reload() {
        document.location.href = '/';
    }

    function clearCart() {
        $.ajax({
            url: '{{ route('deleteCart') }}',
            type: 'GET',
            success: function (data) {
                $('.loading-cart').css('display', 'block')
                $('.cart-top-title').hide()
                $('.cart-bottom').hide()
                $('.cart-empty').show()
                document.getElementById('cart-data-table').innerHTML = "";
                document.getElementById('cartSales').innerHTML = "";
                $('.loading-cart').css('display', 'none')

            },
            error: function (XMLHttpRequest) {
                $('#modal-body').html('')
                $('#modal-body').append('Произошла ошибка попробуйте позже')
                $('#your-modal').modal('toggle');

                $('.loading-cart').css('display', 'none')
            }
        });

        updateCart()
    }


    function addToFavourites(id, page='main') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{ route('addToFavorite') }}',
            type: 'POST',
            data: {
                product_id: id,
                page: page,
            },
            success: function (data) {
                $('#favorite-modal-body').html('')

                if ($("#loginUsername").val() == 'not') {
                    $('#favorite-modal-body').append("Вы должны быть авторизованным")
                    $('#favoriteModal').modal('toggle');
                    // $("#addToFavorite"+id).attr('src','/images/dislike.png');

                } else {

                    console.log(page)

                    if (page == 'favorite') {
                        $('#favorite-modal-body').html('')
                        $("#addToFavorite" + id).css('width', '31px')
                        $("#addToFavorite" + id).css('height', '26px')
                        $("#addToFavorite" + id).css('margin-left', '9px')
                        $("#addToFavorite" + id).css('margin-top', '30px')
                        $("#addToFavorite" + id).attr('src', '/images/like.png')
                        $('#favorite-modal-body').append("Товар удален из избранных")
                        $('#favoriteModal').modal('toggle');
                    } else {
                        if ($("#addToFavorite" + id).attr('src') == '/images/dislike.png') {
                            $('#favorite-modal-body').html('')
                            $("#addToFavorite" + id).css('width', '31px')
                            $("#addToFavorite" + id).css('height', '26px')
                            $("#addToFavorite" + id).css('margin-left', '9px')
                            $("#addToFavorite" + id).css('margin-top', '30px')
                            $("#addToFavorite" + id).attr('src', '/images/like.png')
                            $('#favorite-modal-body').append("Товар удален из избранных")
                            $('#favoriteModal').modal('toggle');


                        } else {
                            $("#addToFavorite" + id).attr('src', '/images/dislike.png')
                            $('#favorite-modal-body').html('')
                            $("#addToFavorite" + id).css('width', '75px')
                            $("#addToFavorite" + id).css('height', '45px')
                            $("#addToFavorite" + id).css('margin-left', '0px')
                            $("#addToFavorite" + id).css('margin-top', '15px')
                            $('#favorite-modal-body').append("Товар добавлен в избранное")
                            $('#favoriteModal').modal('toggle');
                        }
                    }


                }

                setTimeout(function () {
                    $('#your-modal').modal('hide');
                }, 2000);

            },
            error: function (XMLHttpRequest) {
                $('#modal-body').html('')
                $('#modal-body').append('Произошла ошибка попробуйте позже')
                $('#your-modal').modal('toggle');
            }
        });
    }

</script>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
    $('.select_city').on('click', function () {
        var value = $(this).text()
        $('#navbardrop').html(value)
    })
</script>

<script>
    $(document).ready(function () {

        if ($('body').hasClass('nooverflow1 nooverflow')) {
            $('.mobile-nav').css({"position": "fixed", "z-index": 1000, "top": 0});
        }

        if ($(window).width() > 700) {
            $('.signUp').click(function () {
                $('.signIn').css('border-radius', '10px 0px 10px 0px');
                $('.signIn').css('width', '253px');
                $('.signIn').css('z-index', '10');

                $('.signUp').css('width', '245px');
                $('.signUp').css('border-radius', '0px 10px 0px 0px');
                $('.signUp').css('z-index', '0');
            });

            $('.signIn').click(function () {
                $('.signUp').css('border-radius', '0px 10px 0px 10px');
                $('.signUp').css('width', '253px');
                $('.signUp').css('z-index', '11');

                $('.signIn').css('width', '245px');
                $('.signIn').css('border-radius', '10px 0px 0px 0px');
                $('.signIn').css('z-index', '0');
            });
        }

        $('.search').focusin(function () {
            $('.searchRes').show();
        });

        $('.search').focusout(function () {
            $('.searchRes').hide();
        });

        $(".hover-category").hover(function () {
            $('.showCategory').css("display", "block");
        }, function () {
            $('.showCategory').css("display", "none");
        });
        //
        $(".showCategory").hover(function () {
            $('.showCategory').css("display", "block");
        }, function () {
            $('.showCategory').css("display", "none");
        });

        $(".showSub").hover(function () {
            $('.showSubCategory').css("display", "block");
        });
    });
</script>

<script>
    function getProductByAjax(filter, page = 1, price_filter) {
        $('.loading').css('display', 'block')
        var ajax_url = '?' + filter + '&page=' + page + price_filter
        $.ajax({
            url: ajax_url,
            type: 'GET',
            datatype: "html",

        }).done(function (data) {
            $('.loading').css('display', 'none')
            $("#product_list_block").empty().html(data);
        });
    }

    $("#sort").change(function () {
        var price_to = $("#price-from").val()
        var price_from = $("#price-to").val()
        var page = GetURLParameter('page');

        var price_filter = "&price_from=" + price_from + "&price_to=" + price_to
        var filter = $(this).val()
        filter = 'order=' + filter
        getProductByAjax(filter, page, price_filter)
    });

    function priceFilter()
    {
        var price_to = $("#price-from").val()
        var price_from = $("#price-to").val()

        var page = GetURLParameter('page');
        var filter = $( "#sort option:selected" ).val();
        filter = 'order=' + filter

        var price_filter = "&price_from=" + price_from + "&price_to=" + price_to
        getProductByAjax(filter, page, price_filter)
    }

    function page(page) {
        var filter = $( "#sort option:selected" ).val();
        filter = 'order=' + filter
        var price_to = $("#price-from").val()
        var price_from = $("#price-to").val()

        var price_filter = "&price_from=" + price_from + "&price_to=" + price_to
        var url = new URL(page);
        var c = url.searchParams.get("page");

        getProductByAjax(filter, c, price_filter);
    }

    function GetURLParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }

</script>


<script>
    function addToCart(id, quantity=1, modal_show=true) {
        $('.loading-cart').css('display', 'block')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        if(modal_show) {
            $('#product-modal').modal('toggle');
            setTimeout(function () {
                $('#product-modal').modal('hide');
            }, 3000);
        }

        $.ajax({
            url: '{{ route('addToCartPost') }}',
            type: 'POST',
            data: {
                product_id: id,
                quantity: quantity,
            },

            success: function (data) {
                updateCart()
                updateCartData()
                $('.loading-cart').css('display', 'none')
            },
            error: function (XMLHttpRequest) {
                $('#modal-body').html('')
                $('#modal-body').append('Произошла ошибка попробуйте позже')
                $('#your-modal').modal('toggle');

                 $('.loading-cart').css('display', 'none')
            }
        });
    }
    function removeToCart(id, quantity=1, modal_show=true) {
        $('.loading-cart').css('display', 'block')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('removeToCartPost') }}',
            type: 'POST',
            data: {
                product_id: id,
                quantity: quantity,
            },
            success: function (data) {
                if (modal_show) {
                    $('#modal-body').html('')
                    $('#modal-body').append("Товар удален из корзины")
                    $('#your-modal').modal('toggle');
                    setTimeout(function () {
                        $('#your-modal').modal('hide');
                    }, 2000);
                }

               // updateCart()
                updateCartData()

                $('.loading-cart').css('display', 'none')


            },
            error: function (XMLHttpRequest) {
                $('#modal-body').html('')
                $('#modal-body').append('Произошла ошибка попробуйте позже')
                $('#your-modal').modal('toggle');

                $('.loading-cart').css('display', 'none')
            }
        });
    }


    function checkPromocode() {

        var code = $("#promocode").val();

        $.ajax({
            url: '{{ route('checkPromoCode') }}',
            type: 'GET',
            data: {
                code: code,
            },
            dataType: 'json',

            success: function (data) {
                console.log(data.message)
                $('#promocode-modal-body').html('')
                $('#promocode-modal-body').append(data.message)
                $('#promocodeModal').modal('toggle');
            },
            error: function (XMLHttpRequest) {
                $('#promocode-modal-body').html('')
                $('#promocode-modal-body').append('Произошла ошибка попробуйте позже')
                $('#promocodeModal').modal('toggle');
            }
        });
    }

    function showModalBonus() {
        if (document.getElementById("bonusOn").checked) {
            $('#bonus-modal-body').html('');
            $('#bonus-modal-body').append('Бонус будет списан с вашего баланса. Ваш баланс: ' + {{Session::get('ballance') ?? 0}} + '');
            $('#bonusModal').modal('toggle');
        } else {
            $('#bonus-modal-body').html('');
            $('#bonus-modal-body').append('Бонус не будет списан с вашего баланса');
            $('#bonusModal').modal('toggle');
        }
    }

    function updateCart() {

        $.ajax({
            url: '{{ route('update_cart') }}',
            type: 'GET',
            success: function (data) {
                $('.cart-product-count').html(data.count)
                $('.cart-product-price').html(data.prices)

                $('.loading-cart').css('display', 'none')
            },
        });

        $('.loading-cart').css('display', 'none')
    }

    function updateCartData() {

        $.ajax({
            url: '{{ route('update_cart_data') }}',
            type: 'GET',
            success: function (data) {
                $('.cart-empty').hide()
                $('.cart-top-title').show()
                $('.cart-bottom').show()

                if (document.getElementById("cartSales") != null)  {
                    document.getElementById("cartSales").innerHTML = "";
                    document.getElementById("cart-data-table").innerHTML = "";
                } else if(document.getElementById("cart-data-table") != null) {
                    document.getElementById("cart-data-table").innerHTML = "";
                }

                $('.cart-total-price-money').html(data.total_sum + ' тг')
                $('.cart-product-count').html(data.count_products)
                $('.cart-product-price').html(data.total_sum)
                var productSales = '';
                var productInfo = '';
                $.each(data.products, function (key, value) {

                   var productPrice = value['price'];

                   if  (value['type'] == "sales") {
                       productSales += '<div id="ajax-cart">'+ '<div class="cart-product" id="cart-product-' + value['product_id'] + '" style="padding: 20px;">' +
                           '<div class="row"><div class="col-md-4 cart-img"> <div class="div-cart-image" style="height: 80px; display: flex; justify-content: center">' +
                           '<img class="cart-image" src="' + value['image'] + '" alt=""></div></div>' +
                           '<div class="col-md-6 cart-title-style" style="width: 170px">' +
                           '<div class="cart-title">' + value['title'] + '</div>' +
                           '<div class="cart-category">' + value['category_title'] + '</div>' +
                           '<div class="cart-price" id="cart-price-' + value['product_id'] + '" style="margin-top: 10px">' + productPrice * value['count']  + ' тг</div>' +
                           '<input type="hidden" value="' + productPrice + '" id="current-price-' + value['product_id'] + '">' +
                           '<div style="margin-top: 29px; position: absolute; left: 79px; bottom: 0">' +
                           '<div class="col-md-2" style="width: 50px"><div><span class="remove-from-cart" onclick="remove_cart(' + value['product_id'] + ')">' +
                           '<img src="/images/exit.png" alt=""></span></div></div></div></div></div>';
                   } else {


                       productInfo += '<div id="ajax-cart">' + '<div class="cart-product" id="cart-product-' + value['product_id'] + '" style="padding: 20px;">' +
                           '<div class="row"><div class="col-md-4 cart-img"> <div class="div-cart-image" style="height: 80px; display: flex; justify-content: center">' +
                           '<img class="cart-image" src="' + value['image'] + '" alt=""></div></div>' +
                           '<div class="col-md-6 cart-title-style" style="width: 170px">' +
                           '<div class="cart-title">' + value['title'] + '</div>' +
                           '<div class="cart-category">' + value['category_title'] + '</div>' +
                           '<div class="cart-price" id="cart-price-' + value['product_id'] + '" style="margin-top: 10px">' + productPrice * value['count'] + ' тг</div>' +
                           '<input type="hidden" value="' + productPrice + '" id="current-price-' + value['product_id'] + '">' +
                           '<div style="margin-top: 29px; position: absolute; left: 79px; bottom: 0">' +
                           '<div class="cart-qty"><span id="cart-minus" class="cart-minus-' + value['product_id'] + '">-</span>' +
                           '<input type="number" class="cart-count" name="qty" value="' + value['count'] + '" id="cart-count-' + value['product_id'] + '" disabled="">' +
                           '<span id="cart-plus" class="cart-plus-' + value['product_id'] + '">+</span></div></div></div>' +
                           '<div class="col-md-2" style="width: 50px"><div><span class="remove-from-cart" onclick="remove_cart(' + value['product_id'] + ')">' +
                           '<img src="/images/exit.png" alt=""></span></div></div></div></div></div>';
                   }


                })

                $("#cartSales").html(productSales)
                $("#cart-data-table").html(productInfo)

                // if (value['type'] == "sales") {
                //     $(".card-top-title").show()
                //     $("#cartSales").append(productInfo)
                // } else if(value['type'] == "main") {
                //     $("#cart-data-table").append(productInfo)
                // }

                $('.loading-cart').css('display', 'none')
               // updateCart()
            },
            error: function (XMLHttpRequest) {
                $('.loading-cart').css('display', 'none')

            }
        });

        $('.loading-cart').css('display', 'none')
    }

</script>

@if (!Session::get('city'))

    <script type="text/javascript">
        $(document).ready(function () {
            $('#select_city').modal('toggle');
        })

    </script>

@endif

<div class="modal fade" id="select_city" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-body">
                <h2>Выберите ваш город</h2>
                <ul style="list-style: none">

                    @foreach($cities as $city)
                        <li><a href="{{route('selectCity', ['id'=>$city->id, 'title'=>$city->title])}}">{{$city->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="bonusModal" tabindex="-1" role="dialog" aria-labelledby="bonusModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="bonus-modal-body">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="promocodeModal" tabindex="-1" role="dialog" aria-labelledby="promocodeModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="promocode-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-labelledby="favoriteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body" id="favorite-modal-body">

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
