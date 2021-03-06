@extends('layouts.app')

@section('content')

    <style>
        .category-sort {
            width: 242px;
            height: 45px;
            left: calc(50% - 242px/2 + 676px);
            top: 321px;
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

        .sort-by {

        }

        .sort-div-title {
            margin: 30px;
            width: 207px;
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

        .category-list:hover{
            background: #F8FBFF;
        }
    </style>

    <div class="container">
        <div class="bread">Главная / Категории / {{$category}}</div>
    </div>

    <div class="container">
        <div class="d-flex flex-row-reverse">
            <select class="category-sort" id="sort"
                    style="font-size: 18px;font-family: Montserrat; font-weight: 600; color: #43637A;width: 260px; padding: 9px">
                <option value="views.asc">По популярности</option>
                <option value="price.desc">По уменьшению цены</option>
                <option value="price.asc">По возрастанию цены</option>
            </select>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h2 style="margin-top:20px;margin-left: 20px;font-family: Montserrat;font-size: 20px;text-transform: uppercase;color: #7791A4;font-weight: bold;">Категория</h2>
                </div>

                <div class="category-left-menu ">
                    <div class="menu-body">
                        <h2 style="padding-top: 20px; margin-left: 20px; color: #7791A4;font-size: 18px;font-style: normal;font-weight: 600;text-transform: uppercase; ">{{$category}}</h2>
                    </div>
                    <div class="container">
                        <hr class="left-menu-devider" style="margin-top: -10px">
                    </div>

                    <div style="width: 320px;">
                        <ul style="list-style: none; padding-left: 15px !important">
                            @foreach($categories as $category)
                                <div >
                                    <a href="{{route('category_products', [$section_id, $category->id])}}" class="showproduct" style="text-decoration: none"><li class="category-list" style="font-size: 18px;">{{$category->title}}</li></a>
                                </div>
                            @endforeach
                        </ul>
                    </div>


                </div>

            </div>
            <div class="col-md-8 product-list-sections product-overflow" style="margin-top: 30px;">
                <div id="product_list_block">
                    @include('section-product-list')
                </div>
            </div>
        </div>
    </div>
@endsection