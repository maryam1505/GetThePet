@include('users.layouts.header')
<body>
    @include('users.layouts.navigation') 
    @yield('content')
    @include('users.layouts.footer')
</body>
    @include('users.layouts.scripts')
</html>