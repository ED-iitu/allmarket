@extends('layouts.app')

@section('content')

    <style>

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
            left: calc(50% - 281px/2 - 393.5px);
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


        .category-list:hover{
            background: #F8FBFF;
        }

        .product_name {

            height: 70px;
            left: calc(50% - 350px/2 + 380px);
            top: 380px;

            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 25px;
            line-height: 25px;
            /* or 83% */

            letter-spacing: -0.540636px;

            color: #59677D;
        }

        .product-devider {
            width: 350px;
            height: 2px;
            left: calc(50% - 350px/2 + 380px);
            top: 715px;

            background: #FFFFFF;
            border-radius: 0px 0px 1px 0.999997px;
        }

        .qty .count {
            /*color: #000;*/
            display: inline-block;
            vertical-align: top;
            /*font-size: 25px;*/
            /*font-weight: 700;*/
            /*line-height: 48px;*/
            padding: 0 2px;
            min-width: 35px;
            text-align: center;
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: normal;
            font-size: 33px;
            line-height: 48px;
            /* or 79% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #56708A;
        }
        .qty .plus {
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: normal;
            font-size: 33px;
            line-height: 42px;
            /* or 79% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #56708A;
            /*cursor: pointer;*/
            display: inline-block;
            vertical-align: top;

            /*width: 30px;*/
            /*height: 30px;*/
            /*font: 30px/1 Arial,sans-serif;*/
            border-radius: 50%;
            width: 50.88px;
            height: 48.85px;


            background: #E3EDF7;
            box-shadow: -2px -2px 2px rgba(255, 255, 255, 0.7), 2px 2px 2px rgba(93, 148, 204, 0.25), inset 1px 1px 3px rgba(93, 148, 204, 0.25), inset -1px -1px 3px rgba(255, 255, 255, 0.8);
        }
        .qty .minus {

            font-family: SF Pro Display;
            font-style: normal;
            font-weight: normal;
            font-size: 33px;
            line-height: 42px;
            /* or 79% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #56708A;
            /*cursor: pointer;*/
            display: inline-block;
            /*width: 30px;*/
            /*height: 30px;*/
            /*font: 30px/1 Arial,sans-serif;*/
            text-align: center;
            border-radius: 50%;
            width: 50.88px;
            height: 48.85px;


            background: #E3EDF7;
            box-shadow: -2px -2px 2px rgba(255, 255, 255, 0.7), 2px 2px 2px rgba(93, 148, 204, 0.25), inset 1px 1px 3px rgba(93, 148, 204, 0.25), inset -1px -1px 3px rgba(255, 255, 255, 0.8);
        }

        /*Prevent text selection*/
        span{
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        input{
            border: 0;
            width: 2%;
        }
        nput::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input:disabled{
            background: #E3EDF7;
        }

        .raiting-first {
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: bold;
            font-size: 70px;
            line-height: 19px;
            /* or 27% */

            letter-spacing: -0.540636px;

            color: #5C7084;
        }
        .raiting-second {
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: bold;
            font-size: 25px;
            line-height: 19px;
            /* or 75% */

            letter-spacing: -0.540636px;

            color: #5C7084;
        }

        .review-form {
            width: 730px;
            height: 160px;
            left: 438px;
            top: 1203px;
            border: none;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 13px;
        }

        .submit-review {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 28px;
            line-height: 21px;
            /* or 74% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #43637A;


            width: 309px;
            height: 53px;
            left: 1168px;
            top: 1457px;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 11px;
        }

        .add_to_cart {
            width: 350px;
            height: 64px;
            left: calc(50% - 350px/2 + 730px);
            top: 847px;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            border: 1px solid #41A1A4;
            box-sizing: border-box;
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 10px;
            outline: none !important;
        }

        .add_to_cart_text {
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 27px;
            /* identical to box height, or 113% */

            text-align: center;
            letter-spacing: -0.0406364px;

            color: #4F7D8B;
        }


    </style>
    <div class="container">
        <div class="bread">Главная / Категории / {{$product->category->title}} / {{$product->section->title}}</div>
    </div>

    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h2 style="margin-left: 20px;font-family: Montserrat;font-size: 20px;text-transform: uppercase;color: #7791A4;font-weight: bold;">Категория</h2>
                </div>

                <div class="category-left-menu ">
                    <div class="menu-body">
                        <h2 style="padding-top: 20px; margin-left: 20px; color: #7791A4;font-size: 18px;font-style: normal;font-weight: 600;text-transform: uppercase; ">{{$product->section->title}}</h2>
                    </div>
                    <div class="container">
                        <hr class="left-menu-devider" style="margin-top: -10px">
                    </div>

                    <div style="width: 320px;">
                        <ul style="list-style: none; padding-left: 15px !important">
                            @foreach($categories as $category)
                                <div >
                                    <a href="{{route('category_products', [$product->section->id, $product->category->id])}}" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">{{$category->title}}</li></a>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="margin-top: 18px">
                <div class="row">
                    <div class="col-md-6">
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


                                <button class="add_to_cart"><span class="add_to_cart_text">Добавить в корзину</span></button>

                                <hr class="product-devider">
                            </div>
                        </div>
                    </div>

                    <div class=" container raiting mt-5">
                        <div class="d-flex flex-row justify-content-between">
                            <div style="font-family: SF Pro Display;font-style: normal;font-weight: bold;font-size: 35px;line-height: 32px;/* or 92% */letter-spacing: -0.540636px;color: #5C7084;" class="ml-4">Рейтинг товара</div>
                            <div><span class="raiting-first">2</span>  <span class="raiting-second"> из 5</span></div>
                        </div>
                        <div class="mt-5">
                            <hr style="width: 730px;height: 2px;left: calc(50% - 730px/2 + 190px);top: 1057px;background: #FFFFFF;border-radius: 0px 0px 1px 0.999997px;">
                        </div>

                        <div class="mt-2 mb-5">
                            <div class="d-flex flex-column">
                                <div style="font-family: Montserrat;font-style: normal;font-weight: bold;font-size: 33px;line-height: 19px;/* or 57% */letter-spacing: -0.540636px;color: #5C7084;" class="mt-2 ml-4">Отзывы</div>
                                <div style="font-family: Montserrat;font-style: normal;font-weight: normal;font-size: 24px;line-height: 21px;/* or 86% */letter-spacing: -0.540636px;color: #637C8E;" class="mt-4 mb-3 ml-4">Отзывов нет будьте первымы</div>
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        });
    </script>
@endsection