@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <style>
        .banner {
            width: 1110px;
            height: 544px;

            background: #3F9B8A;
            border-radius: 10px;
        }

        .popular-title {
            margin-top: 30px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 30px;
            line-height: 37px;
            /* identical to box height */

            display: flex;
            align-items: center;
            text-align: center;
            text-transform: capitalize;

            color: #6D818F;

            text-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px #8FACC1;
        }

        .popular-hr {
            width: 754px;
            height: 2px;
            background: #C9DBEF;
            border-radius: 0px 0px 1px 1px;
        }

        .rec-hr {
             width: 654px;
             height: 2px;
             background: #C9DBEF;
             border-radius: 0px 0px 1px 1px;
         }

        .sale-hr {
            width: 765px;
            height: 2px;
            background: #C9DBEF;
            border-radius: 0px 0px 1px 1px;
        }


        .popular-red {
            margin-left: 10px;
            width: 14px;
            height: 14px;
            left: calc(50% - 14px/2 - 187px);
            top: 1444px;

            background: #D62626;

            border-radius: 30px;
        }

        .sale-green {
            margin-left: 10px;
            width: 14px;
            height: 14px;
            left: calc(50% - 14px/2 - 187px);
            top: 1444px;

            background: lawngreen;

            border-radius: 30px;
        }

        .rec-blue {
            margin-left: 10px;
            width: 14px;
            height: 14px;
            left: calc(50% - 14px/2 - 187px);
            top: 1444px;

            background: blue;

            border-radius: 30px;
        }
        .product {
            margin-top: 30px;
            width: 241px;
            height: 400px;
            left: calc(50% - 241px/2 - 153.5px);
            top: 1919px;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 10px;
        }

        .product-image {
            padding: 15px;
            width: 211px;
            height: 217px;

            background: #FFFFFF;
            border: 1px solid #3F9B8A;
            box-sizing: border-box;
            border-radius: 10px;
        }

        .product-title {
            width: 230px;


            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 19px;
            /* or 129% */

            letter-spacing: -0.540636px;

            color: #59677D;
        }

        .product-category {
            width: 250px;
            margin-top: 10px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 21px;
            /* or 129% */

            letter-spacing: -0.540636px;

            color: #787A7D;
        }

        .old-price {
            width: 108.24px;
            height: 35.24px;

            margin-top: 10px;


            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 27px;
            /* or 194% */

            letter-spacing: -0.540636px;
            text-decoration-line: line-through;

            color: #43637A;
        }

        .new-price {
            width: 108.24px;
            height: 26.43px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 3px;
            /* or 136% */

            letter-spacing: -0.540636px;

            color: #FF3B37;
        }

        .add-to-cart {
            width: 54.19px;
            height: 54.19px;


            background: #E3EDF7;
            border-radius: 50%;

            background: #E3EDF7;
            box-shadow: -1px -1px 1px #FFFFFF, 0px 4px 4px rgba(38, 149, 151, 0.25), 1px 1px 1px #269597;
        }

        .favorite {
            position: absolute;
            z-index: 10000;
            margin-left: 25px;
            width: 47.53px;
            height: 64.16px;

            background: #EDF4FC;
            box-shadow: 0px 2px 2px rgba(93, 148, 204, 0.22);
            border-radius: 0px 0px 19.5px 19.5px;
        }

        .fav-image {
            width: 31px;
            height: 26px;
            margin-left: 8px;
            margin-top: 30px;
        }

        .product-img {
            margin-top: 30px;
            width: 178.73px;
            height: 138.45px;
            left: calc(50% - 178.73px/2 - 388.64px);
            top: 1590px;
        }

        .carousel-indicators li {
            width: 15px;
            height: 15px;
            border-radius: 100%;
        }

        .almarket-word {
            width: 609px;
            height: 140px;

            margin-left: 100px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 35px;
            line-height: 43px;
            display: flex;
            align-items: center;
            text-transform: uppercase;

            color: #2CD4B3;
        }

        .banner-text-one {
            width: 443px;
            height: 120px;

            margin-left: 100px;


            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
        }

        .banner-text-two {
            width: 450px;
            height: 100px;

            margin-left: 100px;


            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
        }

        .banner-button {
            margin-left: 100px;

            width: 388px;
            height: 71px;

            line-height: 30px;

            background: #5CDCC5;
            border-radius: 20px;
        }

        .banner-button-text {
            width: 331px;
            height: 40px;

            margin-left: 30px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: 700;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #43637A;
        }

        .partner-heading {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 30px;
            line-height: 37px;
            /* identical to box height */

            display: flex;
            align-items: center;
            text-align: center;
            text-transform: uppercase;

            color: #7888A2;

            text-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px #8FACC1;
        }




    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!--Carousel Wrapper-->
            <div id="carousel-home-1" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators" >
                    <li data-target="#carousel-home-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-home-1" data-slide-to="1" style="margin-left: 10px"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item banner active">
                        {{--<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"--}}
                             {{--alt="First slide">--}}
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item banner">
                        {{--<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"--}}
                             {{--alt="Second slide">--}}
                    </div>
                    <!--/Second slide-->
                </div>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->

            <!--Carousel Wrapper-->
            <div id="carousel-home-2" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: 20px">
                <!--Indicators-->
                <ol class="carousel-indicators" >
                    <li data-target="#carousel-home-2" data-slide-to="0" class="active" style="margin-right: 10px"></li>
                    <li data-target="#carousel-home-2" data-slide-to="1"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item banner active">
                        {{--<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"--}}
                        {{--alt="First slide">--}}
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item banner">
                        {{--<img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"--}}
                        {{--alt="Second slide">--}}
                    </div>
                    <!--/Second slide-->
                </div>
                <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->

            <section>
                <h2 class="popular-title">Популярные товары <span class="popular-red"></span><hr class="popular-hr"><hr class="popular-hr-dark"></h2>

                <div uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($popular_products as $popular)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            <div class="favorite">
                                                <img class="fav-image" src="images/like.png" alt="">
                                            </div>
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $popular->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$popular->image}}" alt="">
                                                </div>
                                                </a>

                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $popular->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($popular->title)->limit(30) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($popular->category->title)->limit(22) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$popular->price_sale}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$popular->price}} тг</div>
                                                            <form action="{{route('addToCart', $popular->id)}}" method="GET">
                                                                <button type="submit" class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px">
                                                                    <img src="images/add_to_cart.png" alt="">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="uk-hidden@s uk-light">
                            <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                        <div class="uk-visible@s">
                            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                    </div>


                </div>
            </section>

            <section >
                <h2 class="popular-title">Товары со скидкой <span class="sale-green"></span><hr class="sale-hr"><hr class="popular-hr-dark"></h2>

                <div uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($recommended_products as $sale)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            <div class="favorite">
                                                <img class="fav-image" src="images/like.png" alt="">
                                            </div>
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $sale->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$sale->image}}" alt="">
                                                </div>
                                                </a>
                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $sale->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($sale->title)->limit(30) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($sale->category->title)->limit(22) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$sale->price_sale}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$sale->price}} тг</div>
                                                            <form action="{{route('addToCart', $sale->id)}}" method="GET">
                                                                <button type="submit" class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px">
                                                                    <img src="images/add_to_cart.png" alt="">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="uk-hidden@s uk-light">
                            <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                        <div class="uk-visible@s">
                            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                </div>

            </section>

            <section>
                <h2 class="popular-title">Рекомендованные товары <span class="rec-blue"></span><hr class="rec-hr"><hr class="rec-hr-dark"></h2>

                <div uk-slider autoplay="true">
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($sale_products as $rec)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            <div class="favorite">
                                                <img class="fav-image" src="images/like.png" alt="">
                                            </div>
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $rec->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$rec->image}}" alt="">
                                                </div>
                                                </a>
                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $rec->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($rec->title)->limit(30) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($rec->category->title)->limit(22) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$rec->price_sale}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$rec->price}} тг</div>
                                                            <form action="{{route('addToCart', $rec->id)}}" method="GET">
                                                                <button type="submit" class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px">
                                                                    <img src="images/add_to_cart.png" alt="">
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="uk-hidden@s uk-light">
                            <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                        <div class="uk-visible@s">
                            <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>

    <section style="margin-top: 30px; background: #EDF4FB;background-image: url('/images/main-banner.png'); background-position: right; background-repeat: no-repeat">
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
            <div style="margin-top: 30px; margin-bottom: 30px">
                <button class="banner-button"><span class="banner-button-text">скачай в один клик</span></button>
            </div>
        </div>
    </section>


    <section style="margin-top: 50px; margin-bottom: 50px">
        <div class="partners" style="display: flex; justify-content: center">
            <h2 class="partner-heading">НАШИ ПАРТНЕРЫ</h2>
        </div>

        <div style="margin-left: 50px; margin-right: 10px; margin-top: 30px">
            <div uk-slider >
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

                    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-6@m">
                        <li>
                            <img src="images/mars_logo.png" alt="">
                        </li>
                        <li>
                            <img src="images/splat.png" alt="">
                        </li>
                        <li>
                            <img src="images/red_bull.png" alt="">
                        </li>
                        <li>
                            <img src="images/ferrero.png" alt="">
                        </li>
                        <li>
                            <img src="images/Danone.png" alt="">
                        </li>
                        <li>
                            <img src="images/Ehrmann.png" alt="">
                        </li>
                        <li>
                            <img src="images/uvelka.png" alt="">
                        </li>
                        <li>
                            <img src="images/sady.png" alt="">
                        </li>

                        <li>
                            <img src="images/abbot.png" alt="">
                        </li>

                        <li>
                            <img src="images/johnson.png" alt="">
                        </li>

                    </ul>
                </div>
            </div>
        </div>


    </section>






@endsection
