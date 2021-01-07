@extends('layouts.app')

@section('content')

    <style>
        .share_price {
            top: 120px;
            position: absolute;
        }

        @media  {


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

        <div class="share_product_list" >
            <div class="row" style="display: flex; justify-content: center">
                <?php $totalPrice = 0; ?>
                @foreach($shareProducts as $shareProduct)

                        <?php $totalPrice += $shareProduct->price ?? $shareProduct->product->price?>
                <div class="col-md-4 product-list-mobile">
                    <div class="product">
                        <div class="container" style="padding: 15px">
                            <a href="{{route('product', $shareProduct->product->id)}}">
                                <div class="product-image">
                                    <img class="product-img" src="{{$shareProduct->product->image}}" alt="">
                                </div>
                            </a>

                            <div class="product-info" style="margin-top: 15px; position: relative">
                                <a href="{{route('product', $shareProduct->product->id)}}">
                                    <div class="product-title">
                                        {{ Str::of($shareProduct->product->title)->limit(25) }}

                                    </div>
                                </a>
                                <div class="product-category">
                                    {{ Str::of($shareProduct->product->category->title)->limit(15) }}
                                </div>

                                <div>
                                    <div class="share_price">
                                        @if ($shareProduct->price == null)
                                        <div class="new-price">{{$shareProduct->product->price}} тг</div>
                                        @else
                                        <div class="new-price">{{$shareProduct->price}} тг</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>


        <div style="display: flex; justify-content: center;">
            <button class="btn-lg btn-success mt-5">Добавить в корзину за {{$totalPrice}} KZT</button>
        </div>
    </div>

@endsection