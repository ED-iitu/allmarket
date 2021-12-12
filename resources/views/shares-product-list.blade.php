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
                <?php $price = 0; ?>
                @if(isset($shareProducts->base_items))
                @foreach($shareProducts->base_items as $shareProduct)
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
                                        @if($shareProduct->product->price_sale !== 0)
                                        <div class="old-price">{{$shareProduct->product->price}} тг</div>
                                        <div class="share_price">
                                            <div class="new-price">{{$shareProduct->product->price_sale}} тг</div>
                                        </div>
                                        @else
                                            <div class="share_price">
                                                <div class="new-price">{{$shareProduct->product->price}} тг</div>
                                            </div>
                                        @endif

                                        <?php $price += $shareProduct->product->price; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>


        @if(isset($shareProducts->sale_items))
            <div class="share_product_list">
                <h1>Скидочные товары</h1>
                <div class="row" style="display: flex; justify-content: center">
                    @foreach($shareProducts->sale_items as $shareProduct)
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
                                                <div class="new-price">{{$shareProduct->price}} тг</div>
                                            </div>

                                            <?php $price += $shareProduct->price; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


        @if($share->offers[0]->type->addable_to_basket)
        <div style="display: flex; justify-content: center;">
            <form method="post" action="{{route('addToCartPostSale')}}">
                @csrf
                <input type="hidden" value="{{$share->id}}" name="share_id">
                @if (Session::get('username'))
                    <button class="btn-lg btn-success mt-5" type="submit">Добавить в корзину за {{$price}} KZT</button>
                @else
                    <button class="btn-lg btn-success mt-5" href="#auth" uk-toggle type="button">Добавить в корзину за {{$price}} KZT</button>
                @endif

            </form>
        </div>
        @endif
    </div>

@endsection
