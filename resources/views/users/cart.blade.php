@extends('users.layouts.master')

@section('content')
    <section class="h-100 h-custom cart-bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{$cartCount}} items</h6>
                                        </div>
                                        <hr class="my-4">
                                        @if(count($user_products) > 0)
                                       
                                            @foreach ($user_products as $cart)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="{{ asset('storage/'. $cart->image) }}"
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-primary">{{$cart->category}}</h6>
                                                        <h6 class="text-black mb-0">{{$cart->name}}</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <div class="product__details__button m-0">
                                                            <div class="quantity m-0">
                                                                <div class="pro-qty">
                                                                    <input class="text-center" type="text" value="{{$cart->quantity}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0 text-uppercase">{{$cart->currency}} {{$cart->price}} <span class="small text-primary">* {{$cart->quantity}}</span></h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <form action="{{ route('cart.delete', ['id' => $cart->pet_shop_products_id]) }}" method="post" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-danger dlt-bin"><i class="fas fa-trash fa-lg"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                                
                                            @endforeach


                                            <hr class="my-4">
                                            <div class="row justify-content-end">
                                                <div class="pt-5 col-4">
                                                    <div class="subtotal">
                                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                            <p class="mb-2">Items</p>
                                                            <p class="mb-2">{{$cartCount}}</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                            <p class="mb-2">Quantities</p>
                                                            <p class="mb-2">{{$total_quantity}}</p>
                                                        </div>
        
                                                        <hr class="my-4">
        
                                                        <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                                            <p class="mb-2">Total</p>
                                                            <p class="mb-2">PKR {{$total_price}}</p>
                                                        </div>
        
                                                        <a href="{{Route('check.out')}}" class="btn btn-primary rounded btn-block btn-lg">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Checkout</span>
                                                                <span>PKR {{$total_price}}</span>
                                                            </div>
                                                        </a>
        
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <p class="justify-content-center align-items-center">Your cart is empty.</p>
                                        @endif

                                        <h6 class="mb-0 mt-4 text-body cursor-pointer" onclick="BacktoShop();"><i class="fas fa-long-arrow-alt-left mr-2"></i>Back to shop</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
