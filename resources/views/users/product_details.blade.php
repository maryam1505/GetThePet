@extends('users.layouts.master')

@section('content')

<!-- Product Details Section Begin -->
<section class="product-details spad py-3">
    <div class="container">
        <div class="row equal-height">
            <div class="col-lg-4">
                <div class="product__details__pic">
                    <img src="{{asset('storage/'. $product->image)}}" alt="product">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product__details__text pl-5">
                    <h3>{{$product->name}} <span>{{$product->short_description}}</span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    <div class="product__details__price text-uppercase">{{$product->currency}} {{$product->price}}</div>
                    <p>{{$product->description}}</p>
                    <div class="product__details__button">
                        <form action="{{ route('add.cart') }}" method="POST" id="addToCartForm{{ $product->pet_shop_products_id }}">
                            @csrf
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input class="text-center" type="text" value="1" name="quantity" id="product_quantity">
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->pet_shop_products_id }}">
                            <button type="submit" class="cart-btn"
                                @if(in_array($product->pet_shop_products_id, $cart_product_ids)) disabled @endif>
                                <span class="bi bi-cart mr-2"></span>
                                @if(in_array($product->pet_shop_products_id, $cart_product_ids))
                                    In Cart
                                @else
                                    Add to cart
                                @endif
                            </button>
                        </form>   
                    </div>
                    <div class="product__details__widget">
                        <ul class="p-0">
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label class="small" for="stockin">
                                        {{$product->status}}
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Promotions:</span>
                                <p class="small">Free shipping</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h5 class="mb-3">Description</h5>
                            <p>{{$product->description}}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h5 class="mb-3">Specification</h5>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                            consequat massa quis enim.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                            quis, sem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->
@endsection