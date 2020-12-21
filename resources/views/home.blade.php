@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <style>
        /*.product {*/
            /*margin-top: 30px;*/
            /*width: 252px;*/
            /*height: 400px;*/
            /*left: calc(50% - 241px/2 - 153.5px);*/
            /*top: 1919px;*/

            /*background: linear-gradient(0deg, #E3EDF7, #E3EDF7);*/
            /*box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);*/
            /*border-radius: 10px;*/
        /*}*/

        /*.product-image {*/
            /*padding: 15px;*/
            /*width: 220px;*/
            /*height: 217px;*/

            /*background: #FFFFFF;*/
            /*border: 1px solid #3F9B8A;*/
            /*box-sizing: border-box;*/
            /*border-radius: 10px;*/
        /*}*/

        /*.product-title {*/
            /*width: 230px;*/


            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 600;*/
            /*font-size: 16px;*/
            /*line-height: 19px;*/
            /*!* or 129% *!*/

            /*letter-spacing: -0.540636px;*/

            /*color: #59677D;*/
        /*}*/

        /*.product-category {*/
            /*width: 250px;*/
            /*margin-top: 10px;*/

            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 500;*/
            /*font-size: 16px;*/
            /*line-height: 21px;*/
            /*!* or 129% *!*/

            /*letter-spacing: -0.540636px;*/

            /*color: #787A7D;*/
        /*}*/

        /*.old-price {*/
            /*width: 108.24px;*/
            /*height: 35.24px;*/

            /*margin-top: 10px;*/


            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 500;*/
            /*font-size: 14px;*/
            /*line-height: 27px;*/
            /*!* or 194% *!*/

            /*letter-spacing: -0.540636px;*/
            /*text-decoration-line: line-through;*/

            /*color: #43637A;*/
        /*}*/

        /*.new-price {*/
            /*width: 108.24px;*/
            /*height: 26.43px;*/

            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 600;*/
            /*font-size: 20px;*/
            /*line-height: 3px;*/
            /*!* or 136% *!*/

            /*letter-spacing: -0.540636px;*/

            /*color: #FF3B37;*/
        /*}*/

        /*.add-to-cart {*/
            /*width: 54.19px;*/
            /*height: 54.19px;*/


            /*background: #E3EDF7;*/
            /*border-radius: 50%;*/

            /*background: #E3EDF7;*/
            /*box-shadow: -1px -1px 1px #FFFFFF, 0px 4px 4px rgba(38, 149, 151, 0.25), 1px 1px 1px #269597;*/
        /*}*/

        /*.favorite {*/
            /*position: absolute;*/
            /*z-index: 10000;*/
            /*margin-left: 25px;*/
            /*width: 47.53px;*/
            /*height: 64.16px;*/

            /*background: #EDF4FC;*/
            /*box-shadow: 0px 2px 2px rgba(93, 148, 204, 0.22);*/
            /*border-radius: 0px 0px 19.5px 19.5px;*/
        /*}*/

        /*.fav-image {*/
            /*width: 31px;*/
            /*height: 26px;*/
            /*margin-left: 8px;*/
            /*margin-top: 30px;*/
        /*}*/

        /*.product-img {*/
            /*margin-top: 30px;*/
            /*width: 178.73px;*/
            /*height: 138.45px;*/
            /*left: calc(50% - 178.73px/2 - 388.64px);*/
            /*top: 1590px;*/
        /*}*/

        .carousel-indicators li {
            width: 15px;
            height: 15px;
            border-radius: 100%;
        }

        /*.almarket-word {*/
            /*width: 609px;*/
            /*height: 140px;*/

            /*margin-left: 7px;*/

            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: bold;*/
            /*font-size: 35px;*/
            /*line-height: 43px;*/
            /*display: flex;*/
            /*align-items: center;*/
            /*text-transform: uppercase;*/

            /*color: #2CD4B3;*/
        /*}*/

        /*.banner-text-one {*/
            /*width: 443px;*/
            /*height: 120px;*/

            /*margin-left: 7px;*/


            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: normal;*/
            /*font-size: 25px;*/
            /*line-height: 30px;*/
            /*display: flex;*/
            /*align-items: center;*/

            /*color: #43637A;*/
        /*}*/

        /*.banner-text-two {*/
            /*width: 450px;*/
            /*height: 100px;*/

            /*margin-left: 7px;*/


            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: normal;*/
            /*font-size: 25px;*/
            /*line-height: 30px;*/
            /*display: flex;*/
            /*align-items: center;*/

            /*color: #43637A;*/
        /*}*/

        /*.banner-button {*/
            /*border: none;*/
            /*margin-left: 7px;*/

            /*width: 388px;*/
            /*height: 71px;*/

            /*line-height: 30px;*/

            /*background: #5CDCC5;*/
            /*border-radius: 20px;*/
        /*}*/

        /*.banner-button-text {*/
            /*width: 331px;*/
            /*height: 40px;*/

            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 700;*/
            /*font-size: 25px;*/
            /*line-height: 30px;*/
            /*display: flex;*/
            /*align-items: center;*/
            /*text-align: center;*/
            /*text-transform: uppercase;*/

            /*color: #43637A;*/
        /*}*/

        /*.partner-heading {*/
            /*font-family: Montserrat;*/
            /*font-style: normal;*/
            /*font-weight: 500;*/
            /*font-size: 30px;*/
            /*line-height: 37px;*/
            /*!* identical to box height *!*/

            /*display: flex;*/
            /*align-items: center;*/
            /*text-align: center;*/
            /*text-transform: uppercase;*/

            /*color: #7888A2;*/

            /*text-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px #8FACC1;*/
        /*}*/



        .uk-dotnav>.uk-active>* {
            width: 15px;
            height: 15px;
        }

        .uk-dotnav>*>* {
            width: 15px;
            height: 15px;
        }

        .dots-left {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: -24px !important;
            margin-left: -532px;
        }

        .dots-right {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: -24px !important;
            margin-left: 952px;
        }





    </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="slider-div" style="width: 100vw; overflow: hidden">

                <div class="uk-position-relative uk-light" uk-slideshow>

                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="banner-home" uk-cover></div>
                            {{--<img src="images/photo.jpg" alt="" uk-cover>--}}
                        </li>
                        <li>
                            <div class="banner-home" uk-cover></div>
                        </li>
                    </ul>

                    <div class="uk-position-bottom-center uk-position-small">
                        <ul class="uk-dotnav dots-left">
                            <li uk-slideshow-item="0"><a href="#">Item 1</a></li>
                            <li uk-slideshow-item="1"><a href="#">Item 2</a></li>
                        </ul>
                    </div>

                </div>

                <div class="uk-position-relative uk-light" uk-slideshow style="margin-top: 20px">

                    <ul class="uk-slideshow-items">
                        <li>
                            <div class="banner-home" uk-cover></div>
                            {{--<img src="images/photo.jpg" alt="" uk-cover>--}}
                        </li>
                        <li>
                            <div class="banner-home" uk-cover></div>
                        </li>
                    </ul>

                    <div class="uk-position-bottom-center uk-position-small">
                        <ul class="uk-dotnav dots-right">
                            <li uk-slideshow-item="0"><a href="#">Item 1</a></li>
                            <li uk-slideshow-item="1"><a href="#">Item 2</a></li>
                        </ul>
                    </div>

                </div>


            <section>
                <h2 class="popular-title">Популярные товары <span class="popular-red"></span>
                    <hr class="product-line">
                </h2>

                <div uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($popular_products as $popular)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            @if(in_array($popular->id, (array)Session::get('favorited')))
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$popular->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/like.png" alt="" onClick="addToFavourites({{$popular->id}})">
                                                </div>
                                            @endif
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $popular->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$popular->image}}" alt="">
                                                </div>
                                                </a>

                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $popular->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($popular->title)->limit(25) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($popular->category->title)->limit(15) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$popular->price}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$popular->price_sale}} тг</div>
                                                            @if (Session::get('username'))
                                                                <form action="{{route('addToCart', $popular->id)}}" method="GET">
                                                                    <button type="submit" class="add-to-cart">
                                                                        <img src="/images/add_to_cart.png" alt="">
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart">
                                                                    <img src="/images/add_to_cart.png" alt="">
                                                                </button>
                                                            @endif
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
                <h2 class="popular-title">Товары со скидкой <span class="sale-green"></span>
                    <hr class="product-line">


                </h2>

                <div uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($recommended_products as $sale)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            @if(in_array($sale->id, (array)Session::get('favorited')))
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$sale->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/like.png" alt="" onClick="addToFavourites({{$sale->id}})">
                                                </div>
                                            @endif
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $sale->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$sale->image}}" alt="">
                                                </div>
                                                </a>
                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $sale->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($sale->title)->limit(25) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($sale->category->title)->limit(15) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$sale->price}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$sale->price_sale}} тг</div>
                                                            @if (Session::get('username'))
                                                                <form action="{{route('addToCart', $sale->id)}}" method="GET">
                                                                    <button type="submit" class="add-to-cart">
                                                                        <img src="/images/add_to_cart.png" alt="">
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart">
                                                                    <img src="/images/add_to_cart.png" alt="">
                                                                </button>
                                                            @endif
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
                <h2 class="popular-title">Рекомендованные товары <span class="rec-blue"></span><hr class="product-line-recommended"></h2>

                <div uk-slider autoplay="true">
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($sale_products as $rec)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            @if(in_array($rec->id, (array)Session::get('favorited')))
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$rec->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite" class="fav-image" src="images/like.png" alt="" onClick="addToFavourites({{$rec->id}})">
                                                </div>
                                            @endif
                                            <div class="container" style="padding: 15px">
                                                <a href="{{route('product', $rec->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$rec->image}}" alt="">
                                                </div>
                                                </a>
                                                <div class="product-info" style="margin-top: 15px; position: relative">
                                                    <a href="{{route('product', $rec->id)}}">
                                                    <div class="product-title">
                                                        {{ Str::of($rec->title)->limit(25) }}

                                                    </div>
                                                    </a>
                                                    <div class="product-category">
                                                        {{ Str::of($rec->category->title)->limit(15) }}
                                                    </div>

                                                    <div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$rec->price}} тг</div>
                                                        </div>
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$rec->price_sale}} тг</div>
                                                            @if (Session::get('username'))
                                                            <form action="{{route('addToCart', $rec->id)}}" method="GET">
                                                                <button type="submit" class="add-to-cart">
                                                                    <img src="/images/add_to_cart.png" alt="">
                                                                </button>
                                                            </form>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart">
                                                                    <img src="/images/add_to_cart.png" alt="">
                                                                </button>
                                                            @endif

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
