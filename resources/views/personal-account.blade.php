@extends('layouts.app')

@section('content')

    <style>
        #account-favorite {
            display: none;
        }
        #account-profile {
            display: none;
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

        .orders {
            width: 100%;
            height: 51px;
            left: calc(50% - 722px/2 + 916px);
            top: 396px;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 5px;
        }

        .order-num {
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 26px;
            /* or 270% */

            letter-spacing: -0.540636px;

            color: #5C5C5C;
            margin-left: 5px;
        }

        .order-status {
            margin-left: 5px;
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            /* or 309% */

            letter-spacing: -0.540636px;

            color: #5C5C5C;
        }

        .account-input {
            outline: none;

            height: 43px;
            left: calc(50% - 516.98px/2 + 296.51px);
            top: 331px;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 7px;
        }

        .account-input::placeholder {
            padding-left: 15px;
            font-family: Montserrat;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 45px;
            /* or 253% */

            letter-spacing: -0.540636px;

            color: #96B2CC;
        }

        .account-label {
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            line-height: 45px;
            /* or 253% */

            letter-spacing: -0.540636px;

            color: #43637A;
        }

        input[type=checkbox] {
            align-items: center;
            justify-content: center;
            -webkit-appearance: initial;
            appearance: initial;

            width: 57px;
            height: 37px;
            left: calc(50% - 35px/2 + 55.52px);
            top: 532px;

            background: rgba(205, 223, 239, 0.85);
            box-shadow: 2px 2px 2px rgba(255, 255, 255, 0.49), inset 3px 4px 3px rgba(93, 148, 204, 0.25);
            border-radius: 5px;
        }

        input[type="checkbox"]:checked:after{
            display: flex;
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            content: "\2713";
            color: #fff;
        }

        .account-agree {
            font-family: Montserrat;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            /* or 143% */

            letter-spacing: -0.540636px;

            color: #43637A;
        }

        .account-submit {
            outline: none;
            font-family: Montserrat;
            font-style: normal;
            font-weight: bold;
            font-size: 18px;
            line-height: 21px;
            /* or 115% */

            text-align: center;
            letter-spacing: -0.540636px;

            color: #43637A;


            width: 317px;
            height: 51px;
            left: calc(50% - 317px/2 + 513.5px);
            top: 649px;

            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 5px;
        }

        .totalPrice {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 21px;
            /* identical to box height, or 129% */

            letter-spacing: -0.540636px;

            color: #43637A;

            text-shadow: 1px 1px 2px #FFFFFF;
        }

        .cloneBtn {
            background: #3F9B8A;
            border-radius: 12px;
        }

        .statusOrder {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            color: #EE3030;
        }

        .statusOrderSuccess {
            font-family: Montserrat;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            color: #30EE4E;
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
                            <div class="tab">
                                <a href="#account-favorite" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Избранные товары</li></a>
                            </div>
                            <div class="tab active">
                                <a href="#account-order" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">История заказов</li></a>
                            </div>
                            <div class="tab">
                                <a href="#account-profile" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Мои данные</li></a>
                            </div>
                            <div>
                                <a  href="{{route('logout')}}" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Выход</li></a>
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
                            <div class="col-md-4 product-list-mobile">
                                <div class="product">
                                    <div class="favorite">
                                        <img id="addToFavorite{{$favorite->product->id}}" class="fav-image" src="/images/dislike.png" alt="" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" onClick="addToFavourites({{$favorite->product->id}})">
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
                                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                                    <div class="old-price">{{$favorite->product->price}} тг</div>
                                                </div>
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
                <div id="account-order" style="margin-top: 75px; display: block !important;" class="active">

                    @if(!$orders)
                        <div style="display: flex; justify-content: center; align-items: center">
                            Вы не совершали покупок
                        </div>
                    @else



                    @foreach($orders as $order)

                            <?php $totalPrice = 0; ?>

                            <ul uk-accordion >
                                <li class="uk-close">
                                    <a class="uk-accordion-title" href="#" onclick="getOrders({{$order->id}})">
                                        <div class="flex-row">
                                            <div>Заказ №{{$order->id}}</div>
                                            @if($order->status->title == "Доставлен")
                                            <div class="statusOrderSuccess">Статус: {{$order->status->title}}</div>
                                            @else
                                            <div class="statusOrder">Статус: {{$order->status->title}}</div>
                                            @endif
                                        </div>

                                    </a>
                                    <div class="uk-accordion-content" >
                                        <div>
                                            <div class="row" id="orders-content-{{$order->id}}">

                                            </div>
                                            <div class="order-buttom" id="orders-content-total-{{$order->id}}"  style="display: flex; justify-content: space-between;margin: 20px">

                                            </div>
                                        </div>

                                    </div>

                                </li>
                            </ul>

                    @endforeach
                    @endif
                </div>


                <div id="account-profile" style="margin-top: 75px;">
                    <div class="container">
                        <form action="{{route('account-update')}}" method="GET">
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label account-label">Имя</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" name="name" id="username" placeholder="Имя" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label account-label">Номер телефона</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" id="phone" name="phone" placeholder="Номер телефона" value="{{$user->phone}}">
                                </div>
                            </div>
                            <input type="hidden" name="city_id" value="2">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label account-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" name="email" id="email" placeholder="E-mail" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label account-label"></label>
                                <div class="col-sm-8" style="display: flex">
                                    <input type="checkbox" id="happy" name="happy" value="yes" required style="display: flex;">
                                    <label for="happy"  style="margin-left: 10px" class="account-agree">Я принимаю условия Политики и даю согласие на обработку моих персональных данных данных</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label account-label"></label>
                                <div class="col-sm-8" style="display: flex">
                                    <input type="submit" class="account-submit" value="Сохранить изменения">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab a').on('click', function (e) {
                e.preventDefault();

                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');

                var href = $(this).attr('href');
                $('.form > div').hide();
                $(href).fadeIn(500);
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            var tab = $(location).attr('hash')
            activaTab(tab);
        });


        function activaTab(tab){

            $(tab).addClass('active');
            $("#account-favorite").removeClass('active');

            var href = tab;
            $('.form > div').hide();
            $(href).fadeIn(500);

            //$('.tab a[href="' + tab + '"]').tab('show');
        };
    </script>

    <script>


        function getOrders(id) {
            $.ajax({
                url: '{{ route('accountOrdersById') }}',
                type: 'GET',
                dataType: "json",
                data: {
                    id: id
                },
                success: function (data) {

                    console.log(data)
                    productPrice = 0
                    offerPrice = 0
                    document.getElementById('orders-content-' +id+ '').innerHTML = "";
                    document.getElementById('orders-content-total-' + id + '').innerHTML = "";
                    $.each(data, function (key, value) {
                        if (value.product != null)  {
                            productPrice = productPrice + value.price
                            var product =
                                '<div>' +
                                '<div class="col-md-4 product-list-mobile">' +
                                '<div class="product">' +
                                '<div class="container" style="padding: 15px">' +
                                '<a href="">' +
                                '<div class="product-image">' +
                                '<img class="product-img" src='+value.product.image+'>' +
                                '</div>' +
                                '</a>' +
                                '<div class="product-info" style="margin-top: 15px; position: relative">' +
                                '<a href="">' +
                                '<div class="product-title">' +
                                value.product.title +
                                '</div>' +
                                '</a>' +
                                ' <div class="product-category">' +
                                value.product.category.title +
                                '</div>' +
                                '<div>' +
                                '<div class="" style="display: flex;align-items: center;justify-content: space-between;    margin-top: 2rem !important;"> '+
                                '<div class="new-price">'+ value.price+' тг'+'</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        } else {
                            offerPrice = productPrice + value.product.price
                            var offer =
                                '<div>' +
                                '<div class="col-md-4 product-list-mobile">' +
                                '<div class="product">' +
                                '<div class="container" style="padding: 15px">' +
                                '<a href="">' +
                                '<div class="product-image">' +
                                '<img class="product-img" src='+value.offer.image+'>' +
                                '</div>' +
                                '</a>' +
                                '<div class="product-info" style="margin-top: 15px; position: relative">' +
                                '<a href="">' +
                                '<div class="product-title">' +
                                value.offer.title +
                                '</div>' +
                                '<div class="product-category">' +
                                'Предложение' +
                                '</div>' +
                                '<div>' +
                                '<div class="" style="display: flex;align-items: center;justify-content: space-between;    margin-top: 2rem !important;"> '+
                                '<div class="new-price">'+ value.price+' тг'+'</div>' +
                                '</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        }

                        $("#orders-content-" + id + "").append(offer)
                        $("#orders-content-" + id + "").append(product)
                    })

                    var totalPrice = productPrice + offerPrice

                    var total =
                        '<div class="totalPrice">' +
                        'Итого:' + totalPrice +' тг' +
                        '</div>' +
                        '<div>' +
                        '<form action="{{route('duplicate_order')}}" method="post">' +
                        '@csrf' +
                        '<input type="hidden" value='+id+' name="order_id">' +
                        '<button type="submit" class="btn btn-success cloneBtn">Дублировать заказ</button>' +
                        '</form>' +
                        '</div>'


                    $("#orders-content-total-" + id + "").append(total)

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
