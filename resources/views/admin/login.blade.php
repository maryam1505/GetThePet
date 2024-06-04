@include('admin.layouts.header')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('admin.layouts.loading')


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded position-relative p-4 p-sm-5 my-4 mx-3">
                        <div class="position-absolute text-center" style="top:-19%">
                            <a href="{{Route('home')}}">
                                <img src="{{asset('users/images/logo2.png')}}" alt="" width="50%">
                            </a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center my-3">
                            <h3>Login</h3>
                        </div>
                        <form action="{{Route('admin.login')}}" method="post">
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
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div> --}}
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                            {{-- <p class="text-center mb-0 small">Don't have an Account? <a class="text-primary" href="{{Route('admin.register')}}">Sign Up</a></p> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    @include('admin.layouts.scripts')
</body>

</html>