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

    </style>


    <div class="container">
        <div class="bread">Главная / Разделы</div>
    </div>

    <div class="container">
        <div class="section-banner"></div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($sections as $section)
            <div class="col-xs-6 col-sm-4 col-md-4">
                 <a href="{{route('sectionById', $section->id)}}" style="text-decoration: none">
                    <div class="section-item d-flex flex-row" >
                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 10px; margin-left: 20px">
                                <div class="section-img">
                                    <img src="images/category/icons/{{$section->system_key}}.png" alt="">
                                </div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between; margin-top: 20px; margin-left: 20px">
                                <div class="section-name">{{$section->title}}</div>
                            </div>
                        </div>
                        <div style="margin-top: 10px;margin-right: 20px">
                            <a href=""><img  src="images/category/{{$section->system_key}}.png" alt=""></a>
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
        </div>
    </div>

@endsection