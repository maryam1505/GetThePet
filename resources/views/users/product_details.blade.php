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
                        <form action="{{ route('add.cart') }}" method="POST" id="addToCartForm">
                            @csrf
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input class="text-center" type="text" value="1" name="quantity" id="product_quantity">
                                </div>
                            </div>
                            <input type="hidden" name="product_id" value="{{ $product->pet_shop_products_id }}">
                            <button type="submit" class="cart-btn"
                                @if(in_array($product->pet_shop_products_id, $cart_product_ids) || $product->stock == 0) disabled @endif>
                                    <span class="bi bi-cart mr-2"></span>
                                @if($product->stock == 0)
                                    Sold out
                                @elseif(in_array($product->pet_shop_products_id, $cart_product_ids))
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
                                    @php
                                        switch($product->status) {
                                            case 'In Stock':
                                            case 'New':
                                                $text = 'text-success';
                                                break;
                                            case 'Out of Stock':
                                                $text = 'text-danger';
                                                break;
                                            case 'Sale':
                                                $text = 'text-warning';
                                                break;
                                            default:
                                                $text = '';
                                                break;
                                        }
                                    @endphp
                                    <label class="small {{$text}}" for="stockin">
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
                    {{-- <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                    </ul> --}}
                    <div class="tab-content mt-5">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h5 class="mb-3">Description</h5>
                            <p>{{$product->description}}</p>
                        </div>
                        {{-- <div class="tab-pane" id="tabs-2" role="tabpanel">
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

@if ($liked_products)
    <!-- Featured -->
    <section class="layout_padding-bottom py-5">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2><hr> Related Products <hr></h2>
            </div>
            <div class="row">
                <div class="col-12 pb-5">
                    <div class="row">
                        @foreach ($related_products as $product)
                                @php
                                    $isLiked = false;
                                @endphp
                            @foreach ($liked_products as $liked)
                                @if ($liked->pet_shop_products_id === $product->pet_shop_products_id)
                                    @php
                                        $isLiked = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach
                                <div class="pb-5 col-3">
                                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                                        <img class="img-fluid mb-4" src="{{ asset('storage/'. $product->image) }}" alt="product">
                                        <h6 class="text-uppercase">{{$product->name}}</h6>
                                        <h5 class="text-primary mb-0 text-uppercase">{{$product->currency}} {{$product->price}}</h5>
                                        <div class="btn-action d-flex justify-content-center">
                                            <a class="btn btn-primary py-2 px-3 products_fav text-white cursor-pointer" data-product="{{$product->pet_shop_products_id}}"><i class="bi {{ $isLiked ? 'bi-heart-fill' : 'bi-heart' }}"></i></a>
                                            <a class="btn btn-primary py-2 px-3" href="{{ Route('product.details', $product->pet_shop_products_id) }}"><i class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                </div>  
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>          
    <!-- Featured end -->
@endif
@endsection