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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>



    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Выбрать город
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Алматы</a>
                                <a class="dropdown-item" href="#">Нур-Султан</a>
                                <a class="dropdown-item" href="#">Караганда</a>
                                <a class="dropdown-item" href="#">Петропавлоск</a>
                                <a class="dropdown-item" href="#">Усть-Каменогорск</a>
                                <a class="dropdown-item" href="#">Атырау</a>
                                <a class="dropdown-item" href="#">Актау</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            @if ($message = Session::get('username'))
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                style=" font-family: Montserrat;color: #0EFEC3 !important;">
                                    {{$message}}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/account#account-favorite">Избранные товары</a>
                                        <a class="dropdown-item" href="/account#account-order">История заказов</a>
                                    <a class="dropdown-item" href="/account#account-зкщашду">Мои данные</a>
                                    <a class="dropdown-item" href="{{route('logout')}}">Выход</a>
                                </div>
                            @else

                            <a class="nav-link" href="#auth" uk-toggle>
                                Вход / Регистрация
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Акции & Скидки</a>
                        </li>
                        <li class="nav-item">
                            <div style="margin-top: -4px">
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <a class="nav-link" href="tel:+ 77476574712" style="text-decoration-line: underline;">+ 7 747 657 47 12</a>
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
                    <a class="nav-link" href="tel:+ 77476574712">
                        <img src="/images/phone.png" alt="">
                    </a>
                </div>
                <div class="mobile-cart" onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1');$('body').addClass('nooverflow');">
                    <a class="nav-link" href="#">
                        <img src="/images/corzina-mobile.png" alt="">
                    </a>
                </div>
                <div class="mobile-expand">
                    <img src="/images/collapse-mobile.png" class="nav-link collapsible" alt="">
                    {{--<button type="button" class="collapsible">--}}
                        {{--<span class="navbar-toggler-icon"></span>--}}
                    {{--</button>--}}
                    <div class="content-mobile-menu flex-column">
                        <div><a class="menu-links" href="{{route('sections')}}">Категории</a></div>
                        <hr>
                        <div>Выбрать город</div>
                        <hr>

                        @if ($message = Session::get('username'))
                            <a class="menu-links dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                               style=" font-family: Montserrat;color: #0EFEC3 !important;">
                                {{$message}}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/account#account-favorite">Избранные товары</a>
                                <a class="dropdown-item" href="/account#account-order">История заказов</a>
                                <a class="dropdown-item" href="/account#account-зкщашду">Мои данные</a>
                                <a class="dropdown-item" href="{{route('logout')}}">Выход</a>
                            </div>
                        @else

                            <div href="#auth" uk-toggle>Вход</div>
                            <div href="#auth" uk-toggle>Регистрация</div>
                        @endif
                        <div>Акции & Скидки</div>
                        <div><a class="menu-links" href="{{route('faq')}}">F.A.Q</a></div>
                        <div><a class="menu-links" href="{{route('about')}}">О нас</a></div>
                        <hr>
                        <div class="d-flex flex-row" style="justify-content: center;">
                            <div class="social-mobile">
                                <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                            </div>
                            <div class="social-mobile">
                                <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                            </div>
                            <div class="social-mobile">
                                <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                            </div>
                            <div class="social-mobile">
                                <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                            </div>
                            <div class="social-mobile">
                                <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <div class="navbar-second">
            <div class="container">
                <div class="d-flex flex-row mb-3">
                    <div class="p-2 category-web">
                        <div class="d-flex flex-row">
                            <div>
                                <a href=><img src="/images/категории.png" alt=""></a>
                            </div>
                            <div style="margin-top: -4px">
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <a href="{{route('sections')}}"><div class="category">Категории</div></a>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <div class="category-title">все товары по разделам</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="p-2 search-div">
                        <form action="{{route('search')}}" method="GET">
                            <input type="text" class="search" name="title" placeholder="Что то искали?" style="outline:none;" required>
                            <button type="submit" class="btn-search" style="outline:none;">
                                <img src="/images/search.png" alt="">
                            </button>
                        </form>

                    </div>
                    <div class="p-2 cart-div">
                        <div class="d-flex" id="cart">
                            <button class="btn-cart" style="outline:none;" onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1');$('body').addClass('nooverflow');">
                                <img src="/images/corzina.png" alt="">
                            </button>
                            <div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <div class="cart-p">Товары:</div>
                                    @if(session('cart'))
                                        <div class="cart-p"><span>{{count(session('cart'))}} </span>шт</div>
                                    @else
                                        <div class="cart-p"><span>0 </span>шт</div>
                                    @endif

                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between; margin-top: -15px">
                                    <div class="cart-p">Сумма:</div>
                                    @if(session('cart'))
                                        <?php $total = 0 ?>
                                        @foreach(session('cart') as $id => $details)
                                            <?php $total += $details['price'] ?>
                                        @endforeach
                                        <div class="cart-p"><span>{{$total}} </span>тг</div>
                                    @else
                                        <div class="cart-p"><span>0 </span>тг</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <hr class="menu-blackline" style="width: 1140px;height: 2px;background: #C9DBEF; border-radius: 1px 1px 0px 0px;">
            <hr class="menu-line" style="margin-top: -18px;width: 1140px;height: 2px;background: #FFFFFF;border-radius: 0px 0px 1px 1px;">
        </div>

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


        <div class="container" style="margin-top: -15px">
            <div class="d-flex flex-row-reverse">
                <p class="p-2" style="margin-top: 0px !important;">
                    <a href="{{route('about')}}" class="under-line-menu">О нас</a>
                </p>
                <p class="p-2" style="margin-top: 0px !important;">
                    <a href="{{route('faq')}}" class="under-line-menu">F.A.Q</a>
                </p>
            </div>
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
                                    <a href="">
                                        <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                                    </a>
                                </div>
                                <div class="social">
                                    <a href="">
                                        <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                                    </a>
                                </div>
                                <div class="social">
                                    <a href="">
                                        <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                                    </a>
                                </div>
                                <div class="social">
                                    <a href="">
                                        <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
                                    </a>
                                </div>
                                <div class="social">
                                    <a href="">
                                        <img class="social-img" src="/images/apple.png" alt="" width="48px" height="49px">
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
                            <li>
                                <a href="#!" class="footer-link">вход/ регистрация</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">акции & скидки</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">о нас</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">доставка и оплата</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">помощь покупателю </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="footer-link">популярные товары</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">товары со скидкой</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">Рекомендованные товары</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">наше приложение</a>
                            </li>
                            <li>
                                <a href="#!" class="footer-link">наши партнеры</a>
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
                            <div class="authBtnText" ><a href="#login" class="login-btn-text">Войти</a></div>
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
                            <input type="text" id="tel" class="input-text-login" name="phone" placeholder="Номер телефона" value="" required>
                            <a href="#signin-next" class="login-title-btn btn-submit" style="padding-top: 12.5px;" id="loginBtn">Авторизоваться</a>
                        </div>
                    </form>
                    <form id="signup" class="signUp-form" style="text-align: center">
                        @csrf
                        <h1 class="reg-title">Введите свои данные</h1>
                        <div class="tab input-field d-flex flex-column">
                            <input type="text" class="input-text" placeholder="Ваше имя" name="register-name" required>
                            <input type="text" id="tel-reg" class="input-text" name="register-phone" placeholder="Номер телефона" value="" required>
                            <div class="input-select">
                                <select id="" class="input-select-option" name="city_id">
                                    <option class="input-select-option-inside" value="">Выберите город</option>
                                    <option class="input-select-option-inside" value="6">Алматы</option>
                                    <option class="input-select-option-inside" value="6">Нур-Султан</option>
                                    <option class="input-select-option-inside" value="6">Караганда</option>
                                    <option class="input-select-option-inside" value="6">Петропавлоск</option>
                                    <option class="input-select-option-inside" value="6">Усть-Каменогорск</option>
                                    <option class="input-select-option-inside" value="6">Атырау</option>
                                    <option class="input-select-option-inside" value="6">Актау</option>
                                </select>
                            </div>

                            <a href="#signup-finish"  class="btn-submit" id="RegisterBtn" style="padding-top: 12.5px;">Зарегистрироваться</a>

                            <div style="justify-content: center">
                                <p class="aggrement">Нажимая «зарегистрироваться», вы соглашаетесь
                                    с <a href="">«Политика конфиденциальности»</a> </p>
                            </div>
                        </div>
                    </form>
                    <form action="{{route('sendSms')}}" method="POST" id="signin-next" class="signIn-form" style="text-align: center; display: none">
                        @csrf
                        <div class="d-flex flex-column">
                            <h1 class="login-title">введите код подтверждения</h1>
                            <div class="flex-row">
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="one" />
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="two"/>
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="three"/>
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="four"/>
                            </div>
                            <input type="submit" class="login-title-btn" value="Авторизоваться">
                        </div>
                    </form>

                    <form action="{{route('sendSms')}}" method="POST" id="signup-finish" class="signUp-form">
                        @csrf
                        <div class="d-flex flex-column">
                            <h1 class="signup-title">введите код подтверждения</h1>
                            <div class="flex-row">
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="one" />
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="two"/>
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="three"/>
                                <input class="verify-code-input" type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" name="four"/>
                            </div>
                            <input type="submit" class="btn-submit" id="RegisterBtn" value="Завершить регистрацию">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="cart-cont">
        <div>
            <button id="close-cart" onclick="$('#cart-cont').removeClass('open');$('body').removeClass('nooverflow1');
                    $('body').removeClass('nooverflow');"></button>
            <div id="close-mask" class="empty_cart_block empty-cart"></div>
            <div id="cart-cart" class="empty_cart_block empty-cart">
                <div class="newcart" id="for_the_scroll">
                    <div id="newcart">
                        <div class="cart-content">
                            <div class="empty_cart" id="empty_cart">
                                <div class="d-flex flex-row justify-content-between cart-header" style="align-items: center !important;">
                                    <div class="top-cart-cart">Корзина</div>
                                    <div ><a href="" class="clear-cart">очистить все</a></div>
                                </div>
                                @if(session('cart'))
                                <div class="non-empty-cart" id="cart-after">
                                    <h2 class="cart-top-title">Товары:</h2>
                                    <hr>
                                    <?php $CartTotal = 0 ?>
                                        @foreach(session('cart') as $id => $details)

                                        <?php $CartTotal += $details['price'] * $details['quantity'] ?>
                                            <div class="cart-product" style="padding: 20px;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img class="cart-image" src="{{$details['image']}}" alt="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="cart-title">
                                                            {{ Str::of($details['title'])->limit(15) }}
                                                        </div>
                                                        <div class="cart-category">{{$details['category']}}</div>
                                                        <div class="cart-price" style="margin-top: 10px">{{$details['price']}} тг</div>
                                                        <div style="margin-top: 29px; position: absolute; left: 106px; bottom: 0">
                                                            <div class="cart-qty">
                                                                <span id="cart-minus" class="cart-minus-{{$id}}">-</span>
                                                                <input type="number" class="cart-count" name="qty" value="{{$details['quantity']}}">
                                                                <span id="cart-plus" class="cart-plus-{{$id}}">+</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div><span class="remove-from-cart">x</span></div>
                                                    </div>
                                                </div>
                                            </div>

                                    <div class="container">
                                        <hr class="cart-product-devider">
                                    </div>

                                        @endforeach
                                </div>
                                    <div class="cart-bottom">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="cart-total-price-title">Итого:</div>
                                                <div class="cart-bonus" style="margin-top: 10px">Потратить бонусы: <span class="bonus-price">200</span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="cart-total-price-money">{{$CartTotal}} тг</div>
                                                <div style="margin-top: 10px">
                                                    <label class="form-switch">
                                                        <input type="checkbox">
                                                        <i></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" style="margin-left: -45px">
                                                <form action="">
                                                    <input class="cart-promocode-input" type="text" placeholder="Ввести промокод">
                                                    <input class="cart-promocode-btn" type="submit" value="Активировать">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="flex-row" style="justify-content: center; align-items: center; margin-top: 10px">
                                            <button type="submit" class="checkout-btn" onclick="checkout()">Оформить заказ</button>
                                        </div>
                                    </div>
                                @else
                                <div class="cart-empty" style="display:flex;align-items:center !important;justify-content:center;padding: 66px">
                                    <h2 class="empty-title">Ваша корзина пуста</h2>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function(){
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
                console.log(e)
                var key = e.which,
                    t = $(e.target),
                    sib = t.next('.verify-code-input');

                if (key != 9 && (key < 48 || key > 57)) {
                    e.preventDefault();
                    return false;
                }

                if (key === 9) {
                    return true;
                }
                if (key === 8) {
                    return false;
                }

                if (!sib || !sib.length) {
                    sib = body.find('verify-code-input').eq(0);
                }
                sib.select().focus();
            }

            function onKeyDown(e) {
                var key = e.which;

                if (key === 9 || (key >= 48 && key <= 57)) {
                    return true;
                }

                e.preventDefault();
                return false;
            }



            body.on('keyup', '.verify-code-input', goToNextInput);
            body.on('keydown', '.verify-code-input', onKeyDown);


        })
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
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
                this.value = matrix.replace(/./g, function(a) {
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
        window.addEventListener("DOMContentLoaded", function() {
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
                this.value = matrix.replace(/./g, function(a) {
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
        $(document).ready(function() {
            $("#loginBtn").click(function(e) {

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
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log(data.success)
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

            });

            function printErrorMsg(msg) {
                $(".print-error-msg-login").find("ul").html('');
                $(".print-error-msg-login").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
                });
            }
        });

        $(document).ready(function() {
            $("#RegisterBtn").click(function(e) {

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
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            console.log(data.success)
                        } else {
                            printErrorMsg(data.error);
                        }
                    }
                });

            });

            function printErrorMsg(msg) {
                $(".print-error-msg-login").find("ul").html('');
                $(".print-error-msg-login").css('display', 'block');
                $.each(msg, function(key, value) {
                    $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
                });
            }
        });


        function checkout() {
            $('#cart-cart').html(`
                <div class="cart-checkout">
                    <div class="d-flex flex-row justify-content-between cart-header" style="align-items: center !important;">
                        <div class="top-cart-cart">Корзина: Оформить заказ</div>
                    </div>
                    <h2 class="cart-top-title">Оплата:</h2>
                    <hr>
                    <div class="payment-method d-flex flex-column">
                        <div class="item" style="display: block;">
                          <input type="radio" id="cash" name="cash" value="cash">
                          <label for="cash" style="display: inline;">Наличными при получении заказа</label>
                        </div>
                        <div class="item" style="display: block;">
                          <input type="radio" id="card-online" name="card-online" value="card-online">
                          <label for="card-online" style="display: inline;">Банковской картой онлайн</label>
                        </div>
                        <div class="item" style="display: block;">
                          <input type="radio" id="card-offline" name="card-offline" value="card-offline">
                          <label for="card-offline" style="display: inline;">Банковской картой при получении заказа</label>
                        </div>
                    </div>
                    <div class="address-cart">
                        <h2 class="cart-top-title">Адрес доставки:</h2>
                    </div>
                    <hr>
                    <div class="checkout-address" style="display: flex; justify-content: center; margin-top: -10px">
                        <div class="input-select justify-content-center" style="background: linear-gradient(0deg, #E3EDF7, #E3EDF7);box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);border-radius: 17.5px;width: 297px;height: 35px; align-items: center">
                            <select id="" class="input-select-option" name="city_id" style="font-family: Montserrat;font-style: normal;font-weight: 500;font-size: 13px;line-height: 16px;align-items: center;text-align: center;color: #43637A;background: linear-gradient(0deg, #E3EDF7, #E3EDF7)">
                                <option class="input-select-option-inside" value="">Выберите город</option>
                                <option class="input-select-option-inside" value="6">Алматы</option>
                                <option class="input-select-option-inside" value="6">Нур-Султан</option>
                                <option class="input-select-option-inside" value="6">Караганда</option>
                                <option class="input-select-option-inside" value="6">Петропавлоск</option>
                                <option class="input-select-option-inside" value="6">Усть-Каменогорск</option>
                                <option class="input-select-option-inside" value="6">Атырау</option>
                                <option class="input-select-option-inside" value="6">Актау</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; margin-top: 10px">
                        <input type="text" class="input-street" placeholder="Улица">
                    </div>
                    <div class="flex-row" style="display: flex;justify-content: center; margin-top: 10px">
                        <input type="" class="input-house" placeholder="Дом">
                        <input type="" class="input-house" placeholder="Квартира" style="margin-left: 6px">
                    </div>
                    <div class="checkout-address" style="display: flex; justify-content: center">
                        <div class="input-select justify-content-center" style="background: linear-gradient(0deg, #E3EDF7, #E3EDF7);box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);border-radius: 17.5px;width: 297px;height: 35px; align-items: center">
                            <select id="" class="input-select-option" name="city_id" style="font-family: Montserrat;font-style: normal;font-weight: 500;font-size: 13px;line-height: 16px;align-items: center;text-align: center;color: #43637A;background: linear-gradient(0deg, #E3EDF7, #E3EDF7)">
                                <option class="input-select-option-inside" value="">Время доставки</option>
                                <option class="input-select-option-inside" value="6">Утром</option>
                                <option class="input-select-option-inside" value="6">В обед</option>
                                <option class="input-select-option-inside" value="6">Вечером</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="cart-bottom" style="margin-top: 20px">
                    <div class="flex-row" style="justify-content: center; align-items: center; margin-top: 10px">
                        <button type="submit" class="checkout-btn" onclick="checkout()">Подтвердить заказ</button>
                    </div>
                </div>

            `)
        }


        function addToFavourites(id) {
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
                },
                success: function (data) {
                    $('#modal-body').html('')
                    $('#modal-body').append(data.success)
                    $('#your-modal').modal('toggle');
                    location.reload();
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
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>



</body>
</html>
