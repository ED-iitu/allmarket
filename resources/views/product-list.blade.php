
@section('product-list')
<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="product">
                <div class="favorite">
                    <img class="fav-image" src="/images/like.png" alt="">
                </div>
                <div class="container" style="padding: 15px">
                    <div class="product-image">
                        <img class="product-img" src="{{$product->image}}" alt="">
                    </div>
                    <div class="product-info" style="margin-top: 15px; position: relative">
                        <div class="product-title">
                            {{ Str::of($product->title)->limit(30) }}

                        </div>
                        <div class="product-category">
                            {{ Str::of($product->category->title)->limit(22) }}
                        </div>

                        <div>
                            <div style="display: flex;align-items: center;justify-content: space-between;">
                                <div class="old-price">{{$product->price}} тг</div>
                            </div>
                            <div style="display: flex;align-items: center;justify-content: space-between;">
                                <div class="new-price">{{$product->price_sale}} тг</div>
                                <button class="add-to-cart">
                                    <img class="addToCartSvg" src="/images/addToCart.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

    @endsection