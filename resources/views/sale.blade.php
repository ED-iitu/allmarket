@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-draggable, .ui-droppable {
            background-position: top;
        }

        .category-sort {

            height: 45px;
            border: none;
            display: flex;
            justify-content: center;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 10px;
        }

        .category-left-menu {
            width: 320px;
            left: 58px;
            top: 345px;

            background: #E3EDF7;
            box-shadow: -3px -3px 10px rgba(255, 255, 255, 0.5), inset 0px 4px 4px rgba(93, 148, 204, 0.22);
            border-radius: 11px;
        }

        .menu-body {
            font-family: Montserrat;
            color: #7791A4;
        }

        .left-menu-devider {
            width: 281px;
            height: 2px;
            left: calc(50% - 281px / 2 - 393.5px);
            top: 399px;

            background: #FFFFFF;
            border-radius: 0px 0px 1px 0.999997px;
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

        .priceFrom {
            width: 100.82px;
            height: 35.67px;
            left: calc(50% - 100.82px/2 - 455.57px);
            top: 1035px;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 17.8334px;
        }

        .priceTo {
            width: 100.82px;
            height: 35.67px;
            left: calc(50% - 100.82px/2 - 455.57px);
            top: 1035px;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 17.8334px;
        }


        .sort-div-title {
            height: 24px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 24px;
            display: flex;
            align-items: center;
            text-transform: uppercase;

            color: #7791A4;
        }

        .ui-corner-all {
            width: 279px;
            height: 32px;


            background: #EDF4FC;
            box-shadow: inset 0px 1px 2px #8FACC1;
            border-radius: 16px;
        }

        .category-list:hover {
            background: #F8FBFF;
        }

        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            width: 35px !important;
            height: 35px !important;
            padding: 18px !important;
        }
    </style>

    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a> / Акции и Предложения</div>
    </div>

    <div class="container" style="overflow: visible">
        <div class="d-flex flex-row-reverse select-sort">
            <form>
                <select class="category-sort" id="sort"
                        style="font-size: 18px;font-family: Montserrat; font-weight: 600; color: #43637A;width: 260px; padding: 9px">
                    <option>По популярности</option>
                    <option>По уменьшению цены</option>
                    <option>По возрастанию цены</option>
                </select>
            </form>
        </div>
    </div>

    <div class="container" style="overflow: visible">
        <div class="row">
            <div class="col-md-4">
                <div class="sort-div">
                    <h2 class="sort-div-title" style="font-weight: bold;">Сортировать по</h2>
                    <div class="container sort-by" style="overflow: visible">
                        <div class="menu-body">
                            <h2 style="padding-top: 20px; margin-left: 20px; color: #7791A4;font-size: 18px;font-style: normal;font-weight: 600;text-transform: uppercase; ">
                                Цена:</h2>
                        </div>
                        <div class="container" style="overflow: visible">
                            <hr class="left-menu-devider" style="margin-top: -10px">
                        </div>
                        <p>
                            <label for="price-to" class="price-title" style="font-weight: lighter">От</label>
                            <input class="priceFrom" type="number" value="0" id="price-to" style="color: #7791A4;">
                            <label for="price-from" class="price-title" style="font-weight: lighter">До</label>
                            <input class="priceTo" type="number" value="12000" id="price-from" style="color: #7791A4;">
                        </p>
                        <div id="slider-range"
                             class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 product-overflow" style="margin-top: 30px;">
                <div class="row">
                    @foreach($sales->sales as $product)
                        <div class="col-md-4 product-list-mobile">
                            <div class="product">
                                @if(in_array($product->id, (array)Session::get('favorited')))
                                    <div class="favorite">
                                        <img id="addToFavorite" class="fav-image" src="/images/dislike.png"
                                             style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt=""
                                             onClick="addToFavourites({{$product->id}})">
                                    </div>
                                @else
                                    <div class="favorite">
                                        <img id="addToFavorite" class="fav-image" src="/images/like.png" alt=""
                                             onClick="addToFavourites({{$product->id}})">
                                    </div>
                                @endif
                                <div class="container" style="padding: 15px; overflow: visible;">
                                    <a href="{{route('product', $product->id)}}" style="text-decoration: none">
                                        <div class="product-image">
                                            <img class="product-img" src="{{$product->image}}" alt="">
                                        </div>
                                    </a>
                                    <div class="product-info" style="margin-top: 15px; position: relative">
                                        <div class="product-title">
                                            {{ Str::of($product->title)->limit(30) }}

                                        </div>
                                        <div class="product-category">
                                            {{ Str::of($product->type->title)->limit(22) }}
                                        </div>

                                        <div>
                                            @if (Session::get('username'))
                                                <form action="{{route('addToCart', $product->id)}}" method="GET">
                                                    <button type="submit" class="add-to-cart sale-cart"></button>
                                                </form>
                                            @else
                                                <button href="#auth" uk-toggle class="add-to-cart sale-cart"></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
         </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var slider_range = $("#slider-range"),
            price_min = $("#price-to");
        price_max = $("#price-from");
        SliderRange()
        function SliderRange(start = 0, end = 12000) {
            slider_range.slider({
                range: true,
                min: 0,
                max: 12000,
                values: [start, end],
                slide: function (event, ui) {
                    price_min.val(ui.values[0])
                    price_max.val(ui.values[1])

                }
            });
        }
        price_min.val(slider_range.slider("values", 0))
        price_max.val(slider_range.slider("values", 1))
        price_min.on('keyup', function () {
            SliderRange(price_min.val(), price_max.val())
        })
        price_max.on('keyup', function () {
            SliderRange(price_min.val(), price_max.val())
        })

    </script>
@endsection