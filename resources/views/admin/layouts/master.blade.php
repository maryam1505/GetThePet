@include('admin.layouts.header')
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    @include('admin.layouts.sidebar')
        <!-- Content Start -->
        <div class="content">
           @include('admin.layouts.navbar')


            
            @yield('admindata')
            {{-- @include('admin.layouts.footer') --}}
        </div>
        <!-- Content End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('admin.layouts.modals')
</div>


</body>
@include('admin.layouts.scripts')

</html>
