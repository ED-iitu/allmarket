<style>
    .paginator {
        width: 49px;
        height: 45px;

        margin: 10px 5px 5px 5px;

        background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
        box-shadow: -4px -4px 4px rgba(255, 255, 255, 0.8), 3px 3px 4px rgba(93, 148, 204, 0.25);
        border-radius: 10px;
    }
</style>
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
                                    @if($product->price == 0 || $product->price_sale == 0)
                                        <div class="old-price"></div>
                                    @else
                                        <div class="old-price">{{$product->price}} тг</div>
                                    @endif

                                </div>
                                <div
                                        style="display: flex;align-items: center;justify-content: space-between;">
                                    @if($product->price_sale == 0)
                                        <div class="new-price">{{$product->price}} тг</div>
                                    @else
                                    <div class="new-price">{{$product->price_sale}} тг</div>
                                    @endif
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

    <div style="display: flex; justify-content: center;" >
        <input onclick="page(1)" value="1" id="page" class="paginator" type="button">
        <input onclick="page(2)" value="2" id="page" class="paginator" type="button">
        <input onclick="page(3)" value="3" id="page" class="paginator" type="button">
        <input onclick="page(4)" value="4" id="page" class="paginator" type="button">
    </div>


