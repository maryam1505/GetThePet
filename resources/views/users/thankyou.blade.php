@extends('users.layouts.master')
@section('content')
<section class="h-100 cart-bg h-custom">
    <div class="container">
        <div class="wrapper-1">
            <div class="wrapper-2 ">
                <div class="mb-3">
                    <h1>Thank you {{$user_data->first_name}} {{$user_data->last_name}}!</h1>
                    <p class="small">Thanks for Your happy purchase. </p>
                </div>
                <h4 class="mb-5">These are your order details</h4>
                <div class="container d-flex justify-content-center align-items-center flex-column">
                    <div class="d-flex col-8 justify-content-between">
                        <h6 class="m-0">Your Order ID: </h6> <p>{{$order_details->order_number}}</p>
                    </div>
                    <div class="d-flex col-8 justify-content-between">
                        <h6 class="m-0">Your Total Bill: </h6> <p>Rs. {{$order_details->total_amount}}</p>
                    </div>
                    <div class="d-flex col-8 justify-content-between mb-3">
                        <h6 class="m-0">Your Billing Address: </h6> <p>{{$user_data->address}}</p>
                    </div>
                    <p class="small">Hope you find it helpfull and exciting. Wish you luck with your sweet pet! 😊 </p>
                    <p class="small">you will receive your order soon! </p>
                </div>
                <button onclick="window.location.href='/'" class="go-home">
                    go back for shopping
                </button>
            </div>
        </div>
    </div>
</section>
@endsection
