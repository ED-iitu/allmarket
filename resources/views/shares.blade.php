@extends('layouts.app')

@section('content')

    <style>
        .card-link {
            font-family: Montserrat;
            font-size: 15px;
            color: #7791A4;
        }
    </style>
    <div class="container">
        <div class="bread"><a class="bredLink" href="{{route('home')}}">Главная</a>/ Акции</div>
    </div>

    <div class="container">
        @if ($shares->sales == null)
            <div style="display: flex;justify-content: center; align-items: center;">
                <div style="height: 200px;">
                    <h2 style="color: #7791A4; margin-top: 40px">Акции не найдены</h2>
                </div>
            </div>
        @else
        <div class="row">
            @foreach($shares->sales as $share)
            <div class="col-md-4 mt-5">
                <div class="card">
                    <img class="card-img-top" src="{{$share->image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$share->title}}</h5>
                        {{--<p class="card-text">--}}
                            {{--{{$share->description}}--}}
                        {{--</p>--}}
                    </div>
                    <div class="card-body" style="display: flex; justify-content: center">
                        <form method="post" action="{{route('addToCartPostSale')}}">
                            @csrf
                            <input type="hidden" value="{{$share->id}}" name="share_id">

                            @if (Session::get('username'))
                                <input type="submit" class="card-link" value="Добавить в корзину">
                            @else
                                <input href="#auth" uk-toggle class="card-link" type="button" value="Добавить в корзину">
                            @endif


                        </form>
                        <a href="{{route('share', $share->id)}}" class="card-link">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
                @endif
        </div>
    </div>
@endsection