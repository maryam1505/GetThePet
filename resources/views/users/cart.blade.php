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
                                                    <img src="{{ asset('storage/' . $cart->image) }}" class="img-fluid rounded-3" alt="Product Image">
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
                                                    <h6 class="mb-0 text-uppercase item-price" data-price="{{$cart->price}}"></h6>
                                                    <h6 class="mb-0 total-price">Rs. {{$cart->price * $cart->quantity}}</h6>
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
                                                        <p class="mb-2" id="total_items">{{$cartCount}}</p>
                                                    </div>
                                        
                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-2">Quantities</p>
                                                        <p class="mb-2" id="total_quantity"></p>
                                                    </div>
                                        
                                                    <hr class="my-4">
                                        
                                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                                        <p class="mb-2">Total</p>
                                                        <p class="mb-2" id="total_price"></p>
                                                    </div>
                                                    <form action="{{route('check.out')}}" method="post" id="CheckOutForm">
                                                        @csrf
                                                        <input type="hidden" name="total_price" id="T_Price">
                                                        <input type="hidden" name="total_quantity" id="T_Quantity">
                                                        <div class="btn btn-primary rounded btn-block btn-lg" id="Check_out">
                                                            <div class="d-flex justify-content-between">
                                                                <span>Checkout</span>
                                                                <span id="checkout_total_price"></span>
                                                            </div>
                                                        </div>
                                                    </form>
                                        
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <h5 class="justify-content-center text-secondary align-items-center h-100 d-flex">Your cart is empty.</h5>
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
