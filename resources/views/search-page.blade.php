@extends('layouts.app')

@section('content')
    <style>
        .search-result {
            margin-top: 40px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 30px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
        }

        .not-found-result {
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            color: #43637A;
        }
    </style>
    <div class="container">
        <div class="bread">Главная / Результаты поиска</div>
    </div>

    <div class="container">
        <h2 class="search-result">Результаты по запросу "{{$title}}"</h2>
        <hr>
    </div>


    @if(empty($products))
        <div class="container">
            <h4 class="not-found-result">По вашему запросу ничего не найдено</h4>
        </div>
    @endif

    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="product">
                    <div class="favorite">
                        <img class="fav-image" src="images/like.png" alt="">
                    </div>
                    <div class="container" style="padding: 15px">
                        <a href="{{route('product', $product->id)}}">
                        <div class="product-image">
                            <img class="product-img" src="{{$product->image}}" alt="">
                        </div>
                        </a>
                        <div class="product-info" style="margin-top: 15px; position: relative">
                            <a href="{{route('product', $product->id)}}">
                            <div class="product-title">
                                {{ Str::of($product->title)->limit(30) }}
                            </div>
                            </a>
                            <div class="product-category">
                                {{ Str::of($product->category->title)->limit(22) }}
                            </div>
                            <div>
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="old-price">{{$product->price}} тг</div>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="new-price">{{$product->price_sale}} тг</div>
                                    @if (Session::get('username'))
                                        <form action="{{route('addToCart', $product->id)}}" method="GET">
                                            <button type="submit" class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px"></button>
                                        </form>
                                    @else
                                        <button href="#auth" uk-toggle class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px"></button>
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


@endsection