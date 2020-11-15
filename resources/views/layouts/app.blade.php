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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .forms form { padding: 30px; }
        #signup { display: none; }
        #signup-next {display: none; }
        .forms .tab-group {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .forms .tab-group:after {
            content: "";
            display: table;
            clear: both;
        }
        .signIn {
            width: 245px;
            height: 89px;

            background: #E3EDF7;
            border-radius: 10px 0px 0px 0px;
        }
        .signUp {
            width: 245px;
            height: 89px;

            background: #AFC5DB;
            border-radius: 0px 10px 0px 0px;
        }
        .login-btn-text {
            text-decoration: none;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 29px;
            align-items: center;
            text-align: right;
            text-transform: uppercase;

            color: #637E99;
        }
        .login-subtext {
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 11px;
            line-height: 27px;
            /* or 247% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #637E99;
        }
        .signUp-btn-text {
            text-decoration: none;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 29px;
            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        .signUp-subtext {
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 11px;
            line-height: 27px;
            /* or 247% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #EFF7FF;
        }

        .login-form {
            width: 490px;
            background: #E3EDF7;
        }
        .signUp-form {
            width: 490px    ;
            background: #AFC5DB;
        }
        .signIn-form {
            width: 490px    ;
            background: #E3EDF7;
        }
        .reg-title {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 24px;

            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #FFFFFF;
        }

        .input-text {
            color: white;
            outline: none;
            border: none;
            height: 52.39px;
            margin-top: 15px;
            background: #B3C9DF;
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.5);
            border-radius: 31px;
        }
        .input-text::placeholder {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 27px;
            /* or 124% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #FFFFFF;
        }
        .input-select {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 27px;
            /* or 124% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #FFFFFF !important;

            overflow: hidden;
            margin-top: 15px;
            height: 52.39px;
            border: none;
            background: linear-gradient(0deg, #B2C9DF, #B2C9DF);
            box-shadow: -4px -4px 4px #C5D7EA, 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 31px;
        }
        .input-select-option {
            color: white;
            margin-top: 9px;
            border: none;
            background: linear-gradient(0deg, #B2C9DF, #B2C9DF);
            outline: none;
        }

        .input-select-option-inside {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 27px;
            /* or 124% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #FFFFFF;
        }
        .btn-submit {

            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 27px;
            /* or 124% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #FFFFFF;

            margin-top: 15px;
            height: 52.39px;

            background: linear-gradient(0deg, #B2C9DF, #B2C9DF);
            border: 0.3px solid #FFFFFF;
            box-sizing: border-box;
            box-shadow: -4px -4px 4px #C5D7EA, 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 31px;
        }
        .aggrement {

            margin-top: 20px;
            height: 32px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 13px;
            line-height: 16px;
            align-items: center;
            text-align: center;
            font-variant: small-caps;

            color: #FFFFFF;
        }
        .input-text-login {color: white;
            outline: none;
            height: 52.39px;
            border: none;

            background: #CDDFEF;
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 31px;
        }

        .input-text-login::placeholder {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 22px;
            line-height: 27px;
            /* or 124% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #70889A;
        }
        .login-title {

            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 29px;
            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #637E99;

            margin-top: 30px;
        }

        .login-title-btn {
            height: 52.39px;
            margin-top: 15px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            line-height: 27px;
            /* or 151% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #70889A;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 31px;
        }
        input{
            padding: 0px 20px;
        }
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
                            <a class="nav-link" href="#auth" uk-toggle>
                                Вход / Регистрация
                            </a>
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

        <div class="navbar-second">
            <div class="container">
                <div class="d-flex flex-row mb-3">
                    <div class="p-2">
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
                        <input type="text" class="search" placeholder="Что то искали?" style="outline:none;">
                        <button class="btn-search" style="outline:none;">
                            <img src="/images/search.png" alt="">
                        </button>
                    </div>
                    <div class="p-2">
                        <div class="d-flex" id="cart">
                            <button class="btn-cart" style="outline:none;" onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1');$('body').addClass('nooverflow');">
                                <img src="/images/corzina.png" alt="">
                            </button>
                            <div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <div class="cart-p">Товары:</div>
                                    <div class="cart-p"><span>0 </span>шт</div>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between; margin-top: -15px">
                                    <div class="cart-p">Сумма:</div>
                                    <div class="cart-p"><span>0 </span>тг</div>
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
                            <div style="text-align: center; margin-top: 20px"><a href="#login" class="login-btn-text">Войти</a></div>
                            <div class="login-subtext">Покупали раньше?</div>
                        </li>
                        <li class="tab signUp">
                            <div style="text-align: center; margin-top: 20px"><a href="#signup" class="signUp-btn-text">Регистрация</a></div>
                            <div class="signUp-subtext">Пройди регистрацию за 1 минуту</div>
                        </li>
                    </ul>
                    <form action="#" id="login" class="login-form" style="height: 350px">
                        <h1 class="login-title">Ведите свои данные</h1>
                        <div class="tab input-field d-flex flex-column">
                            <input type="text" class="input-text-login" placeholder="Номер телефона" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            <a href="#signup-next" class="login-title-btn btn-submit" style="padding-top: 12.5px;">Авторизоваться</a>
                        </div>
                    </form>
                    <form action="{{route('registration')}}" method="POST" id="signup" class="signUp-form" style="text-align: center">
                        @csrf
                        <h1 class="reg-title">Введите свои данные</h1>
                        <div class="input-field d-flex flex-column">
                            <input type="text" class="input-text" placeholder="Ваше имя" name="name">
                            <input type="text" class="input-text" name="phone" placeholder="Номер телефона" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
                            <input type="submit" class="btn-submit" value="Зарегистрироваться">

                            <div style="justify-content: center">
                                <p class="aggrement">Нажимая «зарегистрироваться», вы соглашаетесь
                                    с <a href="">«Политика конфиденциальности»</a> </p>
                            </div>
                        </div>
                    </form>
                    <form action="#" id="signup-next" class="signIn-form" style="text-align: center">
                        <h1 class="login-title">введите код подтверждения</h1>
                        <input class="input-text" type="text" name="name" placeholder="sms-код" inputmode="numeric" pattern="[0-9]*" style="width: 100%;">
                        <a type="submit" class="login-title-btn btn-submit" style="padding-top: 12.5px; display: block;">Авторизоваться</a>
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
                            <div class="empty_cart" id="empty_cart" style="">
                                <h2>
                                    Ваша корзина ещё пуста
                                </h2>
                                <img alt="cart-icon" src="http://test.4-it.kz/image/empty.jpg">
                                <button onclick="window.location.href=' http://test.4-it.kz/wine-shop ';">
                                    Выбрать вино
                                </button>
                            </div>
                        </div>
                        <div class="not_empty_cart" style="display: none;">
                            <div class="cart-cart">
                                <h3>Корзина</h3>
                                <div class="cart-block" id="simplecheckout_cart">
                                    <div class="table-responsive" id="for-cart">
                                        <table class="ul-cart" id="cart_table">
                                            <colgroup>
                                                <col class="image">
                                                <!-- <col class="name">
                                                <col class="quantity">
                                                <col class="total">
                                                <col class="remove"> -->
                                            </colgroup>
                                            <tbody id="product_buy"></tbody>
                                        </table>
                                    </div>
                                    <div id="itog">
                                        <div class="row">
                                            <div class="col-md-4 first_cl">
                                                <span>Позиций (<span id="count-prods">0</span>) </span>
                                                <div class=" simplecheckout-cart-total" id="total_sub_total">
                                                        <span class="simplecheckout-cart-total-value">Итого <span id="total_price">0</span> р. </span>

                                                </div>
                                            </div>
                                            <div class="col-md-4 second_cl">
                                                <a id="oformlenie" class="btn-danger" href="http://test.4-it.kz/checkout">Оформить заявку</a>
                                            </div>
                                            <div class="col-md-4 third_cl">
                                                <p style="font-family: ProximaNova-reg;">Пожалуйста
                                                    <a href="http://test.4-it.kz/wine-shop" style="color: #23252b;text-decoration:underline;" id="link_wine">добавьте</a>
                                                    товары в корзину
                                                </p>
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

    <script type="text/javascript">
        $('#close-mask').click(function () {
            $('#cart-cont').removeClass('open');
            $('body').removeClass('nooverflow1');
            $('body').removeClass('nooverflow');
        });

    </script>

    <style type="text/css">
        
    #cart-cont {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0
    }
    #cart-cont {
    z-index: 100;
    position: fixed;
    left: 100vw;
    right: 0;
    top: 0;
    bottom: 0;
    box-sizing: border-box;
    transition: 0.8s;
    display: none;
    pointer-events: all;
    }
    #cart-cont h3 {
        text-align: center
    }
    #cart-cont.open {
        left: 0vw;
        display: block;
    }
    #cart-cont.open #close-cart {
        display: block;
    }
    #cart-cont input, #cart-cont button {
        outline: 0 !important;
    }
    #close-cart, #closecheck {
        cursor: pointer;
        background: transparent;
        border: none;
        box-shadow: none;
        width: 1.484vw;
        height: 1.484vw;
        background: url(/images/closecart.png);
        top: 2.344vw;
        right: 3.281vw;
        position: absolute;
        background-size: cover;
        z-index: 120;
    }
    #close-cart, #closecheck {
        z-index: 120;
        cursor: pointer;
        background: transparent;
        border: none;
        box-shadow: none;
        width: 1.484vw;
        height: 1.484vw;
        background: url(/images/closecart.png);
        top: 2.344vw;
        right: 3.281vw;
        background-position: center center;
        position: absolute;
        background-size: cover;
    }
    #cart-cont.open #close-mask {
        transform: scale(1);
        border-radius: 0;
    }
    #close-mask.empty-cart {
        width: 56.1vw;
    }
    #close-mask {
        z-index: 100;
        position: fixed;
        right: 62.500vw;
        left: 0;
        width: 29.167vw;
        background: rgba(40, 44, 64, .3);
        top: 0;
        bottom: 0;
        transform: scale(0);
        transition: 0.4s;
        border-radius: 100%;
        pointer-events: all;
    }
    #cart-cart.empty-cart {
        width: 44vw;
        z-index: 111;
    }
    #cart-cart {
        padding: 4.427vw 4.167vw 0;
        width: 70.833vw;
        background: #fff;
        transition: 0.4s;
        position: absolute;
        background: #fff;
        top: 0;
        bottom: 0;
        height: 100%;
        overflow: auto;
        right: 0;
        left: auto;
    }
    #cart-cart.empty-cart h2 {
        font: 3.128vw ProximaNova-Bold;
        text-align: center;
        padding: 0 4vw;
        margin: 0;
    }
    #cart-cart.empty-cart img {
        width: 90%;
        max-width: 90%;
        height: auto;
    }
    #cart-cart.empty-cart button {
        margin-left: auto !important;
        margin-right: auto !important;
        float: none !important;
        display: block;
        margin-top: 2.604vw;
        margin-bottom: 3.385vw;
        font: .887vw ProximaNova-bold;
        line-height: normal;
        text-align: center;
        line-height: 2.604vw;
        text-transform: uppercase;
        float: left;
        border-radius: 50px;
        background: #da224d;
        width: 10.416vw;
        color: #fff;
        border: none;
        letter-spacing: .05em;
    }
    </style>


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

</body>
</html>
