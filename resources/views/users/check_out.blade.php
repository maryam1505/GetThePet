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
                                        <div class="d-flex justify-content-center align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Check Out</h1>
                                        </div>
                                        <hr class="my-4">

                                    <form action="{{route('thankyou')}}" method="POST">
                                        @csrf
                                        <div class="card-body contact_section">
                                                <div class="row ">
                                                    <div class="col">
                                                        <div data-mdb-input-init class="form-outline-none">
                                                            <input type="text" id="form7Example1" class="form-control" name="first_name" placeholder="First Name" required @if($user_data->first_name) value="{{$user_data->first_name}}" @endif/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div data-mdb-input-init class="form-outline-none">
                                                            <input type="text" id="form7Example2" class="form-control" name="last_name" placeholder="Last Name" @if($user_data->last_name) value="{{$user_data->last_name}}" @endif required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="Username" name="username" @if($user_data->username) value="{{$user_data->username}}" @endif required/>
                                                </div>
                                                <div>
                                                    <input type="email" placeholder="Email" name="email" @if($user_data->email) value="{{$user_data->email}}" @endif required/>
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="Pone Number" name="phone_no" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" @if($user_data->phone_no) value="{{$user_data->phone_no}}" @endif required/>
                                                </div>
                                                <div>
                                                    <input type="text" class="message-box" name="address" placeholder="Address" @if($user_data->address) value="{{$user_data->address}}" @endif required/>
                                                </div>
                                            
                                        </div>
                                        <hr class="my-4">

                                        <div class="row justify-content-end">
                                            <div class="pt-5 col-4">
                                                <div class="subtotal">
                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-2">Total items</p>
                                                        <p class="mb-2">{{$cartCount}}</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-2">Quantities</p>
                                                        <p class="mb-2">{{$total_quantity}}</p>
                                                    </div>

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between mb-4"
                                                        style="font-weight: 500;">
                                                        <p class="mb-2">Total</p>
                                                        <p class="mb-2">PKR {{$total_price}}</p>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary btn-block btn-lg rounded mb-2">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Make Purchase</span>
                                                            <span>PKR {{$total_price}}</span>
                                                        </div>
                                                    </button>
                                                    <div class="small text-danger text-right">
                                                        <p>Cash on delivery</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

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
