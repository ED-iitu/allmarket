@extends('layouts.app')



@section('content')

    <style>
        .section-banner {
            margin-top: 30px;
            width: 1110px;
            height: 141px;
            background: #3F9B8A;
            border-radius: 19px;
        }

        .section-item {
            margin-top: 30px;
            width: 346px;
            height: 152px;


            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
            border-radius: 19px;
        }

        .section-name {
            width: 160px;
            font-family: SF Pro Display;
            font-style: normal;
            font-weight: bold;
            font-size: 25px;
            line-height: 26px;
            /* or 104% */

            letter-spacing: -0.540636px;

            color: #4E565E;
        }

        .sections-banner {
            max-width: 33% !important;
            height: 152px;
            margin-top: 30px;
        }

    </style>


    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a> / Разделы</div>
    </div>

    <div class="container">
        <div class="section-banner"></div>
    </div>

    <div class="container">
        <div class="row">
            {{--@foreach($sections as $index => $section)--}}

                {{--@if($index === 5)--}}
                    {{--<div class="col-md-4 sections-banner">--}}
                        {{--<img src="/images/test.jpg" alt="" style="border-radius: 20px;height: 333px;width: 345px;">--}}
                    {{--</div>--}}
                {{--@endif--}}
                <a href="{{route('sectionById', 1)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/food.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Продукты <span style="color: green">питания</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 20px">
                            <img  src="images/category/food.png" alt="" >
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('sectionById', 2)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/drinks.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Напитки, <span style="color: brown">чай кофе</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 20px">
                            <img  src="images/category/drinks.png" alt="" >
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('sectionById', 5)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/kids.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Товары <span style="color: darkred">для детей</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 20px">
                           <img  src="images/category/kids.png" alt=""  class="cleaning-mobile3">
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('sectionById', 3)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/beauty.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Гигиена и <span style="color: deepskyblue">косметика</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 20px">
                           <img  src="images/category/beauty.png" alt="" class="cleaning-mobile1">
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('sectionById', 6)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/pets.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Товары для <span style="color: darkorange">животных</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 30px">
                            <img  src="images/category/pets.png" alt="" class="cleaning-mobile2" >
                        </div>
                    </div>
                </div>
            </a>

            <div class="col-md-4 sections-banner">
                <img src="/images/test.jpg" alt="" style="border-radius: 20px;height: 333px;width: 345px;">
            </div>

            <a href="{{route('sectionById', 7)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/home-goods.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Хозяйственные <span style="color: darkblue">товары</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 30px">
                            <img  src="images/category/home-goods.png" alt="" class="cleaning-mobile1">
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{route('sectionById', 4)}}" style="text-decoration: none">
                <div class="col-xs-6 col-sm-4 col-md-4" id="section-list">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/cleaning.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name" >Стирка и <span style="color: darkred">уборка</span></div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 30px">
                            <img  src="images/category/cleaning.png" alt="" class="cleaning-mobile">
                        </div>
                    </div>
                </div>
            </a>

            {{--<a href="{{route('sectionById', 2)}}" style="text-decoration: none">--}}
                {{--<div class="col-xs-6 col-sm-4 col-md-4" id="section-list">--}}
                    {{--<div class="section-item d-flex flex-row" >--}}
                        {{--<div>--}}
                            {{--<div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">--}}
                                {{--<div class="section-img">--}}
                                    {{--<img src="images/category/icons/{{$section->system_key}}.png" alt="">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">--}}
                                {{--<div class="section-name" >{{$section->title}}</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div style="margin-top: 10px;margin-right: 20px">--}}
                            {{--<a href=""><img  src="images/category/{{$section->system_key}}.png" alt=""></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</a>--}}
            {{--@endforeach--}}

                <div class="col-md-4 sections-banner-mobile" style="display: none">
                    <img src="/images/test.jpg" alt="" style="border-radius: 20px;height: 333px;width: 345px;">
                </div>
        </div>
    </div>

@endsection