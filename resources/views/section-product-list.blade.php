
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 product-list-mobile">
                <div class="product">
                    @if(in_array($product->id, (array)Session::get('favorited')))
                        <div class="favorite">
                            <img id="addToFavorite{{$product->id}}" class="fav-image" src="/images/dislike.png" style="width: 75px; height: 45px; margin-left: 0px;margin-top: 15px" alt="" onClick="addToFavourites({{$product->id}})">
                        </div>
                    @else
                        <div class="favorite">
                            <img id="addToFavorite{{$product->id}}" class="fav-image" src="/images/like.png" alt="" onClick="addToFavourites({{$product->id}})">
                        </div>
                    @endif
                    <div class="container" style="padding: 15px">
                        <a href="{{route('product', $product->id)}}" style="text-decoration: none">
                            <div class="product-image">
                                <img class="product-img" src="{{$product->image}}" alt="">
                            </div>
                        </a>
                        <div class="product-info" style="margin-top: 15px; position: relative">
                            <div class="product-title">
                                {{ Str::of($product->title)->limit(25) }}

                            </div>
                            <div class="product-category">
                                {{ Str::of($product->category->title)->limit(22) }}
                            </div>

                            <div>
                                <div
                                        style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="old-price">{{$product->price}} тг</div>
                                </div>
                                <div
                                        style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="new-price">{{$product->price}} тг</div>
                                    @if (Session::get('username'))
                                        <button class="add-to-cart" onclick="addToCart({{$product->id}})"></button>
                                    @else
                                        <button href="#auth" uk-toggle class="add-to-cart"></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
