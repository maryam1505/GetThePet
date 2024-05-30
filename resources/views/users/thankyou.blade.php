@extends('users.layouts.master')
@section('content')
    <div class=container>
        <div class="wrapper-1">
            <div class="wrapper-2">
                <h1>Thank you {{$user_data->first_name}} {{$user_data->last_name}}!</h1>
                <p>Thanks for Your happy purchase. </p>
                <p>Hope you find it helpfull and exciting. Wish you luck with your sweet pet! 😊 </p>
                <p>you will receive your order soon! </p>
                <button onclick="window.location.href='/'" class="go-home">
                    go back for shopping
                </button>
            </div>
        </div>
    </div>
@endsection
