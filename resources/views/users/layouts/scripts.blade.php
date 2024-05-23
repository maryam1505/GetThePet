<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('users/js/bootstrap.js') }}"></script>
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js  "></script>
<!-- custom js -->
<script src="{{ asset('users/js/custom.js') }}"></script>
<!-- Google Map -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->

<script src="{{ asset('users/template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<!-- Template Javascript -->
<script src="{{ asset('users/template/js/main.js') }}"></script>

<!-- TOASTERS -->
<link href="{{ asset('toasters/toastr.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('toasters/toastr.min.js') }}" type="text/javascript"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    //Command: toastr['success']("hello");
</script>

@if (Session::has('success'))
    <script>
        toastr['success']('{{ Session('success') }}');
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr['error']('{{ Session('error') }}');
    </script>
@endif

@if (Session::has('warning'))
    <script>
        toastr['warning']('{{ Session('warning') }}');
    </script>
@endif

@if (Session::has('info'))
    <script>
        toastr['info']('{{ Session('info') }}');
    </script>
@endif
<!-- TOASTERS -->

<!-- Custom JS -->
<script>
    /*-------------------
		Navbar Animation
	--------------------- */
    $(document).ready(function() {
        $(".nav-item").on('mouseenter', function() {
            $(this).find(".nav-link").css("color", "#90a955");
        });

        $(".nav-item").on('mouseleave', function() {
            $(this).find(".nav-link").css("color", "");
        });
        $(".nav-item").each(function() {
            if ($(this).hasClass("active")) {
                $(this).find(".nav-link").css("color", "#90a955");
            }
        });
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            /* Don't allow decrementing below zero */
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
            9
        }
        $button.parent().find('input').val(newVal);
    });

    /*-------------------
    	Redirect to Shop
    --------------------- */
    function BacktoShop() {
        toastr.success("Redirecting to the Home page");

        setTimeout(function() {
            window.location.href = '/';
        }, 2000);
    }

    /*-------------------
    	Redirect to Login
    --------------------- */
    function RedirectToLogin(destination, id) {
        let isLoggedIn = "{{ Session::has('users_data') }}";
        if (isLoggedIn) {
            if (destination == 'cart') {
                window.location.href = "{{ route('cart') }}";
                
            }
        } else {
            toastr.info("You need to log in first.");
            setTimeout(function() {
                window.location.href = "{{ route('login') }}";
            }, 2000);
        }
    }
</script>
