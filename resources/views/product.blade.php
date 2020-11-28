@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bread">Главная / Категории / {{$product->category->title}} / {{$product->section->title}}</div>
    </div>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h2 class="product-category-title">Категория</h2>
                </div>

                <div class="category-left-menu ">
                    <div class="menu-body">
                        <h2 class="product-section-title">{{$product->section->title}}</h2>
                    </div>
                    <div class="container">
                        <hr class="left-menu-devider" style="margin-top: -10px">
                    </div>

                    <div style="width: 320px;">
                        <ul style="list-style: none; padding-left: 15px !important">
                            @foreach($categories as $category)
                                <div>
                                    <a href="{{route('category_products', [$product->section->id, $product->category->id])}}" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">{{$category->title}}</li></a>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="margin-top: 18px">
                <div class="row">
                    <div class="col-md-6 product-singe-block">
                        <div class="product" style="width: 350px !important;height: 532px !important;">
                            <div class="favorite">
                                <img class="fav-image" src="/images/like.png" alt="">
                            </div>
                            <div class="container" style="padding: 15px">
                                <a href="{{route('product', $product->id)}}" style="text-decoration: none">
                                    <div class="product-image" style="width: 316px !important;height: 413px !important;">
                                        <img class="product-img" style="width: 285px !important;height: 221px !important; margin-top: 60px !important;" src="{{$product->image}}" alt="">
                                    </div>
                                </a>
                                <div class="product-info" style="margin-top: 15px; position: relative">
                                    <div class="raiting">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 50px">
                        <div>
                            <h2 class="product_name">{{$product->title}}</h2>
                        </div>

                        <div class="d-flex flex-column justify-content-between">
                            <div>Desctiption</div>
                            <div style="margin-top: 198px">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="qty" style="margin-top: 15px;">
                                        <span class="minus">-</span>
                                        <input type="number" class="count" name="qty" value="1">
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="flex-column">
                                        <div class="old-price">{{$product->price_sale}} тг</div>
                                        <div class="new-price">{{$product->price}} тг</div>
                                    </div>
                                </div>
                                <hr class="product-devider">

                                @if (Session::get('username'))
                                    <form action="{{route('addToCart', $product->id)}}" method="GET">
                                        <button type="submit" class="add_to_cart"><span class="add_to_cart_text">Добавить в корзину</span></button>
                                    </form>
                                @else
                                    <button href="#auth" uk-toggle type="submit" class="add_to_cart"><span class="add_to_cart_text">Добавить в корзину</span></button>

                                @endif


                                <hr class="product-devider">
                            </div>
                        </div>
                    </div>

                    <div class=" container raiting mt-5">
                        <div class="d-flex flex-row justify-content-between">
                            <div class="ml-4 raiting-title">Рейтинг товара</div>
                            <div><span class="raiting-first">2</span>  <span class="raiting-second"> из 5</span></div>
                        </div>
                        <div class="mt-5">
                            <hr class="product-devider-last">
                        </div>

                        <div class="mt-2 mb-5">
                            <div class="d-flex flex-column">
                                <div class="mt-2 ml-4 rewiew-title">Отзывы</div>
                                <div class="mt-4 mb-3 ml-4 rewiew-title-addition">Отзывов нет будьте первыми</div>
                                <div>
                                    <textarea class="review-form" name="" id="" cols="30" rows="10" style="outline:none;"></textarea>
                                </div>
                                <div class="d-flex flex-row-reverse mt-3">
                                    <button class="submit-review" style="outline:none;">Отправить</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection