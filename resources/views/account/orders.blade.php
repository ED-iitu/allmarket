@extends('layouts.app')
@section('content')
    <style>

        #account-order {
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


        .loading-order {
            display: none;
            position: fixed;
            top: 0; right: 0;
            bottom: 0; left: 0;
            z-index: 100000;
        }
        .loader {
            display: none;
            left: 50%;
            margin-left: -4em;
            font-size: 10px;
            border: .8em solid rgba(218, 219, 223, 1);
            border-left: .8em solid rgba(58, 166, 165, 1);
            animation: spin 1.1s infinite linear;
        }
        .loader, .loader:after {
            border-radius: 50%;
            width: 8em;
            height: 8em;
            display: block;
            position: absolute;
            top: 50%;
            margin-top: -4.05em;
        }

        @keyframes spin {
            0% {
                transform: rotate(360deg);
            }
            100% {
                transform: rotate(0deg);
            }
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
                <div id="account-order" style="margin-top: 75px;" class="">

                    @if(!$orders)
                        <div style="display: flex; justify-content: center; align-items: center">
                            Вы не совершали покупок
                        </div>
                    @else


                        @foreach($orders as $order)

                            <div class="loading-order">
                                <div class="loader"></div>
                            </div>
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
            </div>
        </div>
    </div>


    <script>
        function getOrders(id) {
            $('.loading-order').css('display', 'block');
            $.ajax({
                url: '{{ route('accountOrdersById') }}',
                type: 'GET',
                dataType: "json",
                data: {
                    id: id
                },
                success: function (data) {
                    $('.loading-order').css('display', 'none');
                    productPrice = 0
                    offerPrice = 0
                    document.getElementById('orders-content-' +id+ '').innerHTML = "";
                    document.getElementById('orders-content-total-' + id + '').innerHTML = "";
                    $.each(data, function (key, value) {
                        if (value.product != null)  {
                            productPrice = productPrice + value.price * value.count
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
                                '<div class="new-price">' + value.price + ' тг '+ '<span style="color:black">X '+ value.count +'</span>'+'</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                        } else {
                            offerPrice = productPrice + value.product.price * value.count
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

                    $('.loading-order').css('display', 'none');
                }
            });



        }
    </script>
@endsection