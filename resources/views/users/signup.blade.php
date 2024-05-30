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

    <title>Get The Pet - Register</title>

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
                    <h2>
                        <hr> Register
                        <hr>
                    </h2>
                </div>
                <div class="container">
                    <div class="contact_section px-3 py-3">
                        <form action="{{ Route('user.register') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @if ($errors->count() > 1)
                                        <ul class="valid-msg-list">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>{{ $errors->first() }}</p>
                                    @endif
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-warning">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div>
                                <input type="text" placeholder="Username" name="username" required>
                            </div>
                            <div>
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div>
                                <input type="password" placeholder="Create Password" name="password" required>
                            </div>
                            <div>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 flex-column">
                                <button type="submit" class="auth__btn w-75 text-center">Register</button>
                                <span class="small py-1">Already have an account?<a
                                        href="{{ Route('login') }}">Login</a></span>
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

</html>
