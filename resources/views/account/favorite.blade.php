@extends('layouts.app')
@section('content')
    <style>
        #account-favorite {
            display: block;
        }

        .category-left-menu {
            width: 320px;
            left: 58px;
            top: 345px;

            background: #E3EDF7;
            box-shadow: -3px -3px 10px rgba(255, 255, 255, 0.5), inset 0px 4px 4px rgba(93, 148, 204, 0.22);
            border-radius: 11px;
        }

        .category-list {


            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;

            line-height: 42px;
            /* or 236% */

            letter-spacing: -0.540636px;

            color: #43637A;
        }


        .category-list:hover{
            background: #F8FBFF;
        }
    </style>
    <div class="container">
        <div class="bread">Главная / Личный кабинет</div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4" style="margin-top: 40px">
                <div>
                    <h2 style="margin-left: 20px;font-family: Montserrat;font-size: 20px;text-transform: uppercase;color: #7791A4;font-weight: bold;">Профиль</h2>
                </div>

                <div class="category-left-menu ">
                    <div style="width: 320px;">
                        <ul style="list-style: none; padding-top: 10px">
                            <div>
                                <a href="{{route('accountFavorite')}}" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Избранные товары</li></a>
                            </div>
                            <div>
                                <a href="{{route('accountOrders')}}"  style="text-decoration: none"><li class="category-list" style="font-size: 18px;">История заказов</li></a>
                            </div>
                            <div>
                                <a href="{{route('accountProfile')}}"  style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Мои данные</li></a>
                            </div>
                            <div>
                                <a  href="{{route('logout')}}"  style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Выход</li></a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 form">
                <div id="account-favorite" style="margin-top: 30px">
                    @if(!$favorites)
                        <div>
                            <h4 style="display: flex;justify-content: center;align-items: center">Здесь будут ваши избранные товары</h4>
                        </div>
                    @else
                        <div class="row">
                            @foreach($favorites as $favorite)
                                <div class="col-md-4 product-list-mobile" id="favorite-block-{{$loop->iteration}}">
                                    <div class="product">
                                        <div class="favorite">
                                            <img id="addToFavorite{{$favorite->product->id}}" class="fav-image" src="/images/dislike.png" alt="" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" onClick="addToFavourites({{$favorite->product->id}}, 'favorite');$('#favorite-block-{{$loop->iteration}}').remove()">
                                        </div>
                                        <div class="container" style="padding: 15px">
                                            <a href="{{route('product', $favorite->product->id)}}">
                                                <div class="product-image">
                                                    <img class="product-img" src="{{$favorite->product->image}}" alt="">
                                                </div>
                                            </a>
                                            <div class="product-info" style="margin-top: 15px; position: relative">
                                                <div class="product-title">
                                                    {{ Str::of($favorite->product->title)->limit(25) }}

                                                </div>
                                                <div class="product-category">
                                                    {{$favorite->product->brand}}
                                                </div>

                                                <div>
                                                    @if ($favorite->product->price_sale != 0)
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price">{{$favorite->product->price_sale}} тг</div>
                                                        </div>
                                                    @else
                                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                                            <div class="old-price"></div>
                                                        </div>
                                                    @endif
                                                    <div style="display: flex;align-items: center;justify-content: space-between;">
                                                        <div class="new-price">{{$favorite->product->price}} тг</div>
                                                        <button class="add-to-cart" onclick="addToCart({{$favorite->product->id}})"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection