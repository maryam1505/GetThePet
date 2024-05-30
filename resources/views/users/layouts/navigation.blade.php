<!-- header section strats -->
<header class="header_section">
    <div class="d-flex justify-content-between align-items-center px-3">
        <nav class="navbar navbar-expand-lg custom_nav-container w-75">
            <a class="navbar-brand mr-5" href="{{Route('home')}}">
                <img src="{{asset('users/images/logo2.png')}}" alt="logo"/>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex justify-content-evenly w-100">
                    <li class="nav-item {{ request()->route()->getName() === 'home' ? 'active' : '' }}">
                        <a class="nav-link" href="{{Route('home')}}"> Home </a>
                    </li>
                    <li class="nav-item {{ request()->route()->getName() === 'about' ? 'active' : '' }}">
                        <a class="nav-link" href="{{Route('about')}}"> About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getName() === 'marketplace' ? 'active' : '' }}" href="{{Route('marketplace')}}"> Marketplace </a>
                    </li>
                    <li class="nav-item dropdown {{ request()->route()->getName() === 'pharmacy' || request()->route()->getName() === 'product.details' || request()->route()->getName() === 'accessory.food' ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">PetShop</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{Route('pharmacy')}}" class="dropdown-item">Pharmacy</a>
                            <a href="{{Route('accessory.food')}}" class="dropdown-item">Accessory & Food</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->route()->getName() === 'pet.history' ? 'active' : '' }}">
                        <a class="nav-link" href="{{Route('pet.history')}}"> Pet History </a>
                    </li>
                    <li class="nav-item {{ request()->route()->getName() === 'discussion.forum' ? 'active' : '' }}">
                        <a class="nav-link" href="{{Route('discussion.forum')}}"> Discussion forum </a>
                    </li>
                    <li class="nav-item {{ request()->route()->getName() === 'contact' ? 'active' : '' }}">
                        <a class="nav-link pr-lg-0" href="{{Route('contact')}}"> Contact us</a>
                    </li>
                </ul>
            </div>

        </nav>
        @if(session()->has('users_data'))
            <div class="header_icons text-end w-15 d-flex justify-content-evenly align-items-center">
                <span class="small text-capitalize">{{Session::get('users_data')['username']}}</span>
                <h6>
                    <a href="{{Route('cart')}}" class="position-relative"><i class="bi bi-cart"></i> 
                        @if($cartCount > 0)
                            <span class="badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                </h6>
                <h6>
                    <a href="#" class="position-relative"><i class="bi bi-heart"></i> 
                        @if($favCount > 0)
                            <span class="badge">{{ $favCount }}</span>
                        @endif
                    </a>
                </h6>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right m-0">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="{{Route('logout')}}"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </div>
                </div>
            </div>
        @else
        <div class="text-end small auth">
            <a href="{{Route('login')}}">Login</a> /
            <a href="{{Route('register')}}">Register</a>
        </div>
        @endif
    </div>
</header>
<!-- end header section -->