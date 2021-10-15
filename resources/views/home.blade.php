@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <style>
        .carousel-indicators li {
            width: 15px;
            height: 15px;
            border-radius: 100%;
        }

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
                @if(empty($banners))
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

                @else


                    <div class="uk-position-relative uk-light" uk-slideshow>

                        <ul class="uk-slideshow-items">
                            @foreach($banners as $key => $banner)
                            <li>
                                @if($isMobile)
                                {{--<div class="banner-home" uk-cover></div>--}}
                                <img src="{{$banner->image_mobile}}" alt="" uk-cover>
                                @else
                                    <img src="{{$banner->image}}" alt="" uk-cover>
                                @endif
                            </li>
                            @endforeach
                        </ul>

                        <div class="uk-position-bottom-center uk-position-small">
                            <ul class="uk-dotnav dots-left">
                                @foreach($banners as $key => $banner)
                                <li uk-slideshow-item="{{$key}}"><a href="#">{{$key}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                @endif

                    <br>

                @if(empty($additionalBanners))

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

                @else

                        <div class="uk-position-relative uk-light" uk-slideshow>

                            <ul class="uk-slideshow-items">
                                @foreach($additionalBanners as $key => $banner)
                                    <li>
                                        @if($isMobile)
                                            {{--<div class="banner-home" uk-cover></div>--}}
                                            <img src="{{$banner->image_mobile}}" alt="" uk-cover>
                                        @else
                                            <img src="{{$banner->image}}" alt="" uk-cover>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                            <div class="uk-position-bottom-center uk-position-small">
                                <ul class="uk-dotnav dots-left">
                                    @foreach($banners as $key => $banner)
                                        <li uk-slideshow-item="{{$key}}"><a href="#">{{$key}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                @endif


            <section id="popular">
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
                                                    <img id="addToFavorite{{$popular->id}}" class="fav-image" src="/images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$popular->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite{{$popular->id}}" class="fav-image" src="/images/like.png" alt="" onClick="addToFavourites({{$popular->id}})">
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
                                                        @if ($popular->price !== 0)
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            @if($popular->price == 0 || $popular->price_sale == 0)
                                                                <div class="old-price"></div>
                                                            @else
                                                                <div class="old-price">{{$popular->price}} тг</div>
                                                            @endif
                                                        </div>
                                                        @endif
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            @if($popular->price_sale != 0)
                                                            <div class="new-price">{{$popular->price_sale}} тг</div>
                                                            @else
                                                                <div class="new-price">{{$popular->price}} тг</div>
                                                            @endif
                                                            @if (Session::get('username'))
                                                                    <button type="submit" class="add-to-cart" onclick="addToCart({{$popular->id}})"></button>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart"></button>
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

            <section id="sale">
                <h2 class="popular-title">Товары со скидкой <span class="sale-green"></span>
                    <hr class="product-line">


                </h2>

                <div uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" style="margin-bottom: 20px">
                                @foreach ($recommended_products as $sale)
                                    @if ($sale->price_sale != 0)
                                    <li style="display: flex; justify-content: center">
                                        <div class="product">
                                            @if(in_array($sale->id, (array)Session::get('favorited')))
                                                <div class="favorite">
                                                    <img id="addToFavorite{{$sale->id}}" class="fav-image" src="/images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$sale->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite{{$sale->id}}" class="fav-image" src="/images/like.png" alt="" onClick="addToFavourites({{$sale->id}})">
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
                                                        @if ($sale->price != 0)
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$sale->price}} тг</div>
                                                        </div>
                                                        @endif
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="new-price">{{$sale->price_sale}} тг</div>
                                                            @if (Session::get('username'))
                                                                <button type="submit" class="add-to-cart" onclick="addToCart({{$sale->id}})"></button>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart"></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
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

            <section id="recomended">
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
                                                    <img id="addToFavorite{{$rec->id}}" class="fav-image" src="/images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$rec->id}})">
                                                </div>
                                            @else
                                                <div class="favorite">
                                                    <img id="addToFavorite{{$rec->id}}" class="fav-image" src="/images/like.png" alt="" onClick="addToFavourites({{$rec->id}})">
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
                                                                <button type="submit" class="add-to-cart" onclick="addToCart({{$rec->id}})"></button>
                                                            @else
                                                                <button href="#auth" uk-toggle class="add-to-cart"></button>
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


    <section style="margin-top: 50px; margin-bottom: 50px" id="partners">
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
