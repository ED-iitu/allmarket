@extends('layouts.app')

@section('content')

    <style>
        .share_price {
            top: 120px;
            position: absolute;
        }

        @media {


        }
    </style>
    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a>/ Акции / {{$share->id}}</div>
    </div>


    <div class="container mt-5">
        <div style="display: flex; justify-content: center">
            <h1>{{$share->title}}</h1>
        </div>
        <hr>

        <div class="share_product_list">
            <div class="row" style="display: flex; justify-content: center">
                <?php $totalPrice = 0; ?>
                @foreach($shareProducts as $shareProduct)
                    <?php $totalPrice += $shareProduct->price ?>s
                    <div class="col-md-4 product-list-mobile">
                        <div class="product">
                            <div class="container" style="padding: 15px">
                                <a href="{{route('product', $shareProduct->id)}}">
                                    <div class="product-image">
                                        <img class="product-img" src="{{$shareProduct->image}}" alt="">
                                    </div>
                                </a>

                                <div class="product-info" style="margin-top: 15px; position: relative">
                                    <a href="{{route('product', $shareProduct->id)}}">
                                        <div class="product-title">
                                            {{ Str::of($shareProduct->title)->limit(25) }}

                                        </div>
                                    </a>
                                    <div class="product-category">
                                        {{ Str::of($shareProduct->category->title)->limit(15) }}
                                    </div>

                                    <div>
                                        <div class="old-price">{{$shareProduct->price_sale}} тг</div>
                                        <div class="share_price">
                                            <div class="new-price">{{$shareProduct->price}} тг</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($share->id != 201)
        <div style="display: flex; justify-content: center;">
            <form method="post" action="{{route('addToCartPostSale')}}">
                @csrf
                <input type="hidden" value="{{$share->id}}" name="share_id">
                @if (Session::get('username'))
                    <button class="btn-lg btn-success mt-5" type="submit">Добавить в корзину за {{$totalPrice}} KZT</button>
                @else
                    <button class="btn-lg btn-success mt-5" href="#auth" uk-toggle type="button">Добавить в корзину за {{$totalPrice}} KZT</button>
                @endif

            </form>
        </div>
        @endif
    </div>

@endsection
