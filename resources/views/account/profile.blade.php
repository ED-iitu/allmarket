@extends('layouts.app')
@section('content')
    <style>
        #account-profile {
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
                            <div class="form-group row">
                                <label for="phone" class="col-sm-4 col-form-label account-label">Город</label>
                                <div class="col-sm-8">
                                    <select id="" class="form-control-plaintext account-input" name="city_id" style="font-family: Montserrat;font-style: normal;font-weight: 500;font-size: 13px;line-height: 16px;align-items: center;text-align: center;color: #43637A;background: linear-gradient(0deg, #E3EDF7, #E3EDF7)">
                                        <option class="input-select-option-inside" value="{{$user->city->id}}">{{$user->city->title}}</option>
                                        @foreach($cities as $city)
                                            <option class="input-select-option-inside" value="{{$city->id}}">{{$city->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{--<input type="hidden" name="city_id" value="2">--}}
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

@endsection