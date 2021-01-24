@extends('layouts.app')

@section('content')
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        fieldset, label { margin: 0; padding: 0; }

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;
            float: left;
        }

        .rating > input { display: none; }
        .rating > label:before {
            margin: 10px;
            font-size: 3.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > input:checked ~ label, /* show gold star when clicked */
        .rating:not(:checked) > label:hover, /* hover current star */
        .rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

        .rating > input:checked + label:hover, /* hover current star when changing rating */
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
        .rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
    </style>
    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a> / <a class="bredLink" href="{{route('sections')}}">Категории</a> /
            <a class="bredLink" href="{{route('category_products', [$product->section->id, $product->category->id])}}">{{$product->category->title}}</a> / {{$product->section->title}}</div>
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
                                        <img class="product-img" src="{{$product->image}}" alt="">
                                    </div>
                                </a>
                                <div class="product-info" style="margin-top: 15px; position: relative">
                                    <div class="raiting">
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars" onclick="addRaiting(5,{{$product->id}})"></label>
                                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars" onclick="addRaiting(4.5,{{$product->id}})"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars" onclick="addRaiting(4,{{$product->id}})"></label>
                                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars" onclick="addRaiting(3.5,{{$product->id}})"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars" onclick="addRaiting(3,{{$product->id}})"></label>
                                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars" onclick="addRaiting(2.5,{{$product->id}})"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars" onclick="addRaiting(2,{{$product->id}})"></label>
                                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars" onclick="addRaiting(1.5,{{$product->id}})"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star" onclick="addRaiting(1,{{$product->id}})"></label>
                                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars" onclick="addRaiting(0.5,{{$product->id}})"></label>
                                        </fieldset>
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
                            <div style="margin-top: 198px">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="qty" style="margin-top: 15px;">
                                        <span class="minus">-</span>
                                        <input type="number" class="count" id="productQuantity" name="qty" value="1">
                                        <span class="plus">+</span>
                                    </div>
                                    <div class="flex-column">
                                        @if($product->price == 0 || $product->price_sale == 0)
                                            <div class="old-price mt-4"></div>
                                        @else
                                            <div class="old-price">{{$product->price}} тг</div>
                                        @endif
                                        @if($product->price_sale != 0)
                                        <div class="new-price">{{$product->price_sale}} тг</div>
                                        @else
                                            <div class="new-price">{{$product->price}} тг</div>
                                        @endif

                                    </div>
                                </div>
                                <hr class="product-devider">

                                @if (Session::get('username'))
                                        <button class="add_to_cart cart-add" ><span class="add_to_cart_text">Добавить в корзину</span></button>
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
    <script>
        $('.cart-add').on('click', function (){
            var quantity = $('#productQuantity').val()
            addToCart({{$product->id}}, quantity)
        })
    </script>

    <script>
        function addRaiting(raiting,productId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('addRaiting') }}',
                type: 'POST',
                data: {
                    productId: productId,
                    raiting: raiting,
                },
                success: function (data) {
                    $('#modal-body').html('')
                    $('#modal-body').append("Спасибо, Ваш голос принят!")
                    $('#your-modal').modal('toggle');
                    setTimeout(function () {
                        $('#your-modal').modal('hide');
                    }, 2000);
                    // updateCart()
                    // updateCartData()

                },
                error: function (XMLHttpRequest) {
                    $('#modal-body').html('')
                    $('#modal-body').append('Произошла ошибка попробуйте позже')
                    $('#your-modal').modal('toggle');
                }
            });
        }
    </script>

@endsection
