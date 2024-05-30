@extends('users.layouts.master')
@section('content')
     <!-- Offer Start -->
     <div class="container-fluid bg-offer py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h1 class="display-4 text-uppercase text-white mb-0">Accessories & Food</h1>
                    </div>
                    <p class="text-white mb-4">Offers a variety of high-quality pet accessories to keep your furry friends happy and healthy. From cozy beds and stylish collars to fun toys and nutritious treats, we have everything you need for your pets. Shop with us for affordable, reliable, and stylish pet products."</p>
                    <a href="{{Route('discussion.forum')}}" class="btn btn-outline-light py-md-3 px-md-5 me-3">Any Query Bothering?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Acessory Options -->
    <section class="acessory_section">
        <div class="row justify-content-evenly align-items-center my-1">
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/food.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Food</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/care.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Care</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/acessory.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Acessories</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/clothing.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Clothing</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/decor.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Decor</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/groming.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Grooming</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/medicine.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Medicine</h5>
            </div>
        </div>
    </section>
    <!-- Acessory Options End -->

    <!-- Pet Accessories -->
    <section class="layout_padding-bottom py-5">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2><hr> Pet Accessories <hr></h2>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    @if($product->category == 'Accessories')
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Pet Accessories end -->

    <!-- Pet Food -->
    <section class="layout_padding-bottom py-5">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2><hr> Pet Food <hr></h2>
            </div>
            <div class="row">    
                @foreach ($products as $product)
                    @if($product->category == 'Food')
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- Pet Food end -->

     <!-- new Products -->
     @if(!empty($wanted))
        <section class="layout_padding-bottom py-5">
            <div class="container">
                <div class="heading_container heading_center pb-5">
                    <h2><hr> Most Wanted <hr></h2>
                </div>
                <div class="owl-carousel product-carousel">
                    @foreach ($wanted as $product)
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
                        <div class="pb-5">
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
        </section>   
     @endif
    <!-- new Products end -->
@endsection