<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Get The Pet - Login</title>

    <!-- font awesome style -->
    <link href="{{ asset('users/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- lightbox -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel="stylesheet" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('users/css/bootstrap.css') }}" />

    {{-- Title Logo --}}
    <link rel="icon" href="{{ asset('users/images/title-logo.png') }}" type="image/icon">

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Poppins:400,700|Roboto:400,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('users/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('users/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <section class="auth__section py-5">
        <div class="auth_wrapper">
            <div class="auth_logo">
                <img src="{{ asset('users/images/waggy/banner-img.png') }}" alt="logo"
                    class="w-100 h-100 object-fit-cover">
            </div>
            <div class="auth__container">
                <div class="heading_container auth__head py-5">
                    <h2 class="mb-3"><hr> Verify OTP <hr></h2>
                    <small class="text-secondary">Verify the OTP that has sent to your registered email</small>
                </div>
                <div class="container">
                    <div class="contact_section px-3 py-3">
                        <form action="{{route('reset.password')}}" method="POST">
                            @csrf
                            <input type="hidden" placeholder="Email" name="email" value="{{$email}}">
                            <div class="d-flex">
                                <div class="mr-3"><input class="pl-0 mb-0 text-center" type="text" name="otp_1" placeholder="0" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"></div>
                                <div class="mr-3"><input class="pl-0 mb-0 text-center" type="text" name="otp_2" placeholder="0" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"></div>
                                <div class="mr-3"><input class="pl-0 mb-0 text-center" type="text" name="otp_3" placeholder="0" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"></div>
                                <div class=""><input class="pl-0 mb-0 text-center" type="text" name="otp_4" placeholder="0" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 flex-column">
                                <button type="submit" class="auth__btn w-75 text-center">Verify OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="auth_logo auth-img2">
                <img src="{{ asset('users/images/waggy/banner-img2.png') }}" alt="logo"
                    class="w-100 h-100 object-fit-cover">
            </div>
        </div>
    </section>
</body>
@include('users.layouts.scripts')
</html>