@extends('layouts.app')

@section('content')

    <style>
        #account-order {
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
            width: 722px;
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
            display: flex;
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
                            <div class="tab active">
                                <a href="#account-favorite" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">Избранные товары</li></a>
                            </div>
                            <div class="tab">
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
                    <div class="product">
                        <div class="favorite">
                            <img class="fav-image" src="images/like.png" alt="">
                        </div>
                        <div class="container" style="padding: 15px">
                            <div class="product-image">
                                <img class="product-img" src="images/logo.png" alt="">
                            </div>
                            <div class="product-info" style="margin-top: 15px; position: relative">
                                <div class="product-title">
                                   title

                                </div>
                                <div class="product-category">
                                    category title
                                </div>

                                <div>
                                    <div style="display: flex;align-items: center;justify-content: space-between;">
                                        <div class="old-price">0 тг</div>
                                    </div>
                                    <div style="display: flex;align-items: center;justify-content: space-between;">
                                        <div class="new-price">100 тг</div>
                                        <button class="add-to-cart" style="position: absolute; bottom: 15px; right: 5px">
                                            <img src="images/add_to_cart.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="account-order" style="margin-top: 75px">
                    <div class="d-flex flex-row justify-content-between orders">
                        <div class="d-flex flex-row" style="padding: 8px;">
                            <div style="display:flex;justify-content:center;align-items: center; width: 38px;height: 38px;background: #EE3030;border-radius: 5px">
                                <span style="color: white; font-size: 25px">X</span>
                            </div>
                            <div style="margin-top: -4px">
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <a href="{{route('sections')}}"><div class="order-num">Заказ №1</div></a>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <div class="order-status">Статус: Отменен</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row" style="padding: 8px;">
                            <button style="background: none; border: none; outline: none"><img src="images/repeat_cart.png" alt=""></button>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between orders" style="margin-top: 20px">
                        <div class="d-flex flex-row" style="padding: 8px;">
                            <div style="display:flex;justify-content:center;align-items: center; width: 38px;height: 38px;background: #30EE4E;;border-radius: 5px">
                                <span style="color: white; font-size: 25px">OK</span>
                            </div>
                            <div style="margin-top: -4px">
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <a href="{{route('sections')}}"><div class="order-num">Заказ №1</div></a>
                                </div>
                                <div style="display: flex;align-items: center;justify-content: space-between">
                                    <div class="order-status">Статус: Выполнен</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row" style="padding: 8px;">
                            <button style="background: none; border: none; outline: none"><img src="images/repeat_cart.png" alt=""></button>
                        </div>
                    </div>
                </div>
                <div id="account-profile" style="margin-top: 75px;">
                    <div class="container">
                        <form>
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label account-label">Имя</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" id="username" placeholder="Имя">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label account-label">Номер телефона</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" id="phone" placeholder="Номер телефона">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label account-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control-plaintext account-input" id="email" placeholder="E-main">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label account-label"></label>
                                <div class="col-sm-8" style="display: flex">
                                    <input type="checkbox" id="happy" name="happy" value="yes">
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
@endsection