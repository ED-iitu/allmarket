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
                        <a href="#" class="card-link">В корзину</a>
                        <a href="{{route('share', $share->id)}}" class="card-link">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection