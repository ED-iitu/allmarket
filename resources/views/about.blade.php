@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a> / О нас</div>
    </div>

    
    <div class="about-home-banner">
        <img src="/images/home-banner.png" alt="">
    </div>

    <div class="container">
        <div class="d-flex flex-column">
            <div class="benefits-block" style="margin-top: 30px">
                <div class="d-flex flex-row">
                    <div>
                        <img class="benefits-img" src="/images/Calculator.png" alt="">
                    </div>
                    <div>
                        <div style="display: flex;align-items: center;justify-content: space-between">
                            <div class="benefits">НИЗКИЕ ЦЕНЫ</div>
                        </div>
                    </div>
                </div>
                <div class="benefits-description">
                    Никаких наценок и переплат! Цены на весь ассортимент представлены
                    ниже чем в магазинах/супермаркетах. Больше не нужно выбирать между
                    хорошим сервисом и экономией — мы совместили первоклассное
                    обслуживание от Allmarket и минимальные цены
                </div>
            </div>

            <div class="benefits-block">
                <div class="d-flex flex-row">
                    <div>
                        <a href=""><img class="benefits-img" src="/images/Truck.png" alt=""></a>
                    </div>
                    <div>
                        <div style="display: flex;align-items: center;justify-content: space-between">
                            <div class="benefits" style="width: 455px; margin-left: 10px">БЕСПЛАТНАЯ ДОСТАВКА</div>
                        </div>
                    </div>
                </div>
                <div class="benefits-description">
                    Мы предлагаем оперативную доставку заказов, ежедневно с 10.00 до 00.00,
                    также и в праздничные дни. Вы также сможете отслеживать онлайн маршрут доставки.
                    При оформлении заказа с 0:00 до 16:00 доставка «день в день»
                    При оформлении заказа с 16:00 до 0:00 доставка «на следующий день». Минимальная сумма заказа 5 000 тенге.
                </div>
            </div>

            <div class="benefits-block">
                <div class="d-flex flex-row">
                    <div>
                        <a href=""><img class="benefits-img" src="/images/Bag.png" alt=""></a>
                    </div>
                    <div>
                        <div style="display: flex;align-items: center;justify-content: space-between">
                            <div class="benefits" style="width: 476px">ШИРОКИЙ АССОРТИМЕНТ</div>
                        </div>
                    </div>
                </div>
                <div class="benefits-description">
                    Мы напрямую сотрудничаем с ведущими производителями и поставщиками.
                    У нас представлен весь востребованный ассортимент, более 10 000 наименований.
                    Вам доступны тысячи товаров начиная от молочной продукции, товары для красоты и
                    здоровья, товары для детей и многое другое
                </div>
            </div>

        </div>
    </div>

    <section class="home-about-banner">
        <div class="container">
            <div class="d-flex flex-column banner-text">
                <div class="almarket-word">
                    <span style="color: #43637A"><span style="color: #2CD4B3">allmarket</span> в твоём телефоне</span>
                </div>
                <div class="banner-text-one">
                    Скачивай наше мобильное приложение, доступное на Google play и App store
                </div>
                <div class="banner-text-two">
                    Получай больше <br>выгодных предложений и акций!
                </div>
                <div class="download-app-button" style="margin-top: 30px; margin-bottom: 30px">
                    <button onclick="location.href='http://onelink.to/rs5shb';" class="banner-button"><span class="banner-button-text">скачай в один клик</span></button>
                </div>
            </div>
        </div>
    </section>


    <section style="margin-top: 50px; margin-bottom: 50px">
        <div class="container">
            <div class="partners" style="display: flex; justify-content: center">
                <h2 class="partner-heading">НАШИ ПАРТНЕРЫ</h2>
            </div>

            <div style="margin-left: 30px; margin-right: 10px; margin-top: 30px">
                <div uk-slider autoplay="true" autoplay-interval="2000" draggable="false" >
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" draggable="false">

                        <ul class="uk-slider-items uk-child-width-1-3 uk-child-width-1-3@s uk-child-width-1-6@m">
                            <li class="partner-img">
                                <img src="images/1.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/2.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/3.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/4.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/5.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/6.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/7.png" alt="">
                            </li>
                            <li class="partner-img">
                                <img src="images/8.png" alt="">
                            </li>

                            <li class="partner-img">
                                <img src="images/9.png" alt="">
                            </li>

                            <li class="partner-img">
                                <img src="images/10.png" alt="">
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection