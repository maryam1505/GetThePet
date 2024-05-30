<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{Route('home')}}" class="navbar-brand mx-4 mb-3 text-center">
            <h4 class="text-primary">Dashboard</h4>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @php
                    $adminData = Session::get('admin_data');
                    $imageSrc = empty($adminData['image']) ? asset('admin/img/user-placeholder.png') : asset("storage/{$adminData['image']}");   
                @endphp
                <img class="rounded-circle" src="{{$imageSrc}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{$adminData['name']}}</h6>
                <span class="small">{{$adminData['role']}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{Route('dashboard')}}" class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="fa fa-home me-2"></i>Dashboard</a>
            <a href="{{Route("users.details")}}" class="nav-item nav-link {{ request()->routeIs('users.details') ? 'active' : '' }}"><i class="fa fa-users me-2"></i></i>Users Details</a>
            <a href="{{Route("pet.products")}}" class="nav-item nav-link {{ request()->routeIs('pet.products') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Products</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle {{ request()->routeIs('pet.products') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Products</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{Route("pet.products")}}" class="dropdown-item">Pet Shop Products</a>
                    <a href="signin.html" class="dropdown-item">Product Categories</a>
                    <a href="signup.html" class="dropdown-item">Wanted Products</a>
                </div>
            </div> --}}
        </div>
    </nav>
</div>
<!-- Sidebar End -->