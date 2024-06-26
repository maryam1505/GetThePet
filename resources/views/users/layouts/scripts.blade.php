<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('users/js/bootstrap.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
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

    $(document).ready(function () {
        $('.dropdown').hover(
            function () {
                $(this).addClass('show');
                $(this).find('.dropdown-menu').addClass('show');
            },
            function () {
                $(this).removeClass('show');
                $(this).find('.dropdown-menu').removeClass('show');
            }
        );
    });

    /*-------------------
		Quantity change
	--------------------- */
    // var proQty = $('.pro-qty');
    // proQty.prepend('<span class="dec qtybtn">-</span>');
    // proQty.append('<span class="inc qtybtn">+</span>');
    // proQty.on('click', '.qtybtn', function() {
    //     var $button = $(this);
    //     var oldValue = $button.parent().find('input').val();
    //     if ($button.hasClass('inc')) {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } else {
    //         /* Don't allow decrementing below zero */
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } else {
    //             newVal = 0;
    //         }
    //         9
    //     }
    //     $button.parent().find('input').val(newVal);
    // });

    $(document).ready(function() {
        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');

        proQty.on('click', '.qtybtn', function() {
            var $button     = $(this);
            var $parent     = $button.parent();
            var $input      = $parent.find('input');
            var oldValue    = parseInt($input.val());
            var newVal;
            if ($button.hasClass('inc')) {
                newVal = oldValue + 1;
            } else {
                newVal = oldValue > 1 ? oldValue - 1 : 1;
            }
            $input.val(newVal);

            var $row                = $parent.closest('.row');
            var pricePerUnit        = parseFloat($row.find('.item-price').data('price'));
            var $totalPriceElement  = $row.find('.total-price');
            var totalPrice          = pricePerUnit * newVal;
            $totalPriceElement.text('Rs. ' + totalPrice.toFixed(2));

            updateTotals();
        });

        function updateTotals() {
            var totalQuantity = 0;
            var totalPrice = 0;

            $('.pro-qty input').each(function() {
                var quantity = parseInt($(this).val());
                totalQuantity += quantity;

                var $row            = $(this).closest('.row');
                var pricePerUnit    = parseFloat($row.find('.item-price').data('price'));
                totalPrice += pricePerUnit * quantity;
            });

            $('#total_quantity').text(totalQuantity);
            $('#total_price').text('Rs. ' + totalPrice);
            $('#checkout_total_price').text('Rs. ' + totalPrice);
        }

        updateTotals(); 
        /*-------------------
    	    Check Out
        --------------------- */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#Check_out').on('click', function() {
            var totalPrice = $('#total_price').text().replace('Rs. ', '');
            var totalQuantity = $('#total_quantity').text();
            $("#T_Quantity").val(totalQuantity);
            $("#T_Price").val(totalPrice);

            $("#CheckOutForm").submit();
        });


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
    document.addEventListener('DOMContentLoaded', function () {
        const addToCartForm = document.getElementById("addToCartForm"); 
        const isLoggedIn = {{ session()->has('users_data') ? 'true' : 'false' }};

        if (!isLoggedIn) {
            addToCartForm.addEventListener('submit', function (event) {
                event.preventDefault();
                toastr.error('You need to login First'); 
                setTimeout(function() {
                    window.location.href = '/login';
                }, 2000);
            });
        }
    });

    /*-----------------------
    	Favourites Products
    ------------------------- */
    $(document).ready(function() {
        var isLoggedIn = {{ session()->has('users_data') ? 'true' : 'false' }};
        $('.products_fav').on('click',function(){
            if(isLoggedIn) {
                var $this = $(this);
                var product_id = $(this).data('product');
                var user_id = "{{session()->get('users_data.user_id',0)}}";
                var isLiked = $(this).find('i').hasClass('bi-heart-fill');
                var data = {
                    pet_shop_products_id: product_id,
                    users_customers_id: user_id,
                    status: isLiked ? 'Unliked' : 'Liked'
                };
                $.ajax({
                    url: '{{url("api/add_favourites")}}',
                    method: 'Post',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                }).done(function(response){
                    if(response.status === 'success'){
                        if(isLiked) {
                            $this.find('i').removeClass('bi-heart-fill').addClass('bi-heart');

                        } else {
                            $this.find('i').removeClass('bi-heart').addClass('bi-heart-fill');
                        }
                        setTimeout(function() {
                            location.reload();
                        },2000);
                    } else {
                        toastr.error('Something went wrong, please try again.');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    toastr.error('Error: ' + textStatus + ' - ' + errorThrown);
                });
            } else {
                toastr.error("Oops you are not logged in Yet!");
            }
        });
    });

    /*---------------------------------
        Discussion Forum - Chat Box 
    ---------------------------------*/
    $(document).ready(function() {
        var isLoggedIn = {{ session()->has('users_data') ? 'true' : 'false' }};
        $(".chat-box").on("click", function() {
            var $replyBox = $(this).closest(".row").siblings(".reply-box");
            $replyBox.toggleClass("d-none");
        });
        $(".send-msg").on("click", function() {
            $(this).closest('form').submit();
        });

        $(".reply-like").on("click", function() {
            if(isLoggedIn) {
                var $this       = $(this);
                var user_id     = "{{session()->get('users_data.user_id',0)}}";
                var reply_id    = $(this).data('reply_id');
                var is_Liked    = $this.find('i').hasClass('bi-heart-fill text-danger');
                var data = {
                    question_replies_id: reply_id,
                    users_customers_id: user_id,
                    status: is_Liked ? 'Unliked' : 'Liked'
                };
                $.ajax({
                    url: '{{url("api/reply_likes")}}',
                    method: 'Post',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                }).done(function(response){
                    if(response.status === 'success'){
                        if(is_Liked) {
                            $this.find('i').removeClass('bi-heart-fill text-danger').addClass('bi-heart');
                            var likes = parseInt($this.find('span').text());
                            $this.find('span').text(likes - 1);
                        } else {
                            $this.find('i').removeClass('bi-heart').addClass('bi-heart-fill text-danger');
                            var likes = parseInt($this.find('span').text());
                            $this.find('span').text(likes + 1);
                        }
                    } else {
                        toastr.error('Something went wrong, please try again.');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    toastr.error('Error: ' + textStatus + ' - ' + errorThrown);
                });
            } else {
                toastr.error("Oops you are not logged in Yet!");
            }
        });

        $(".question_like").on("click",function() {
            if(isLoggedIn) {
                var $this       = $(this);
                var user_id     = "{{session()->get('users_data.user_id',0)}}";
                var question_id    = $(this).data('question_id');
                var is_Liked    = $this.find('i').hasClass('bi-heart-fill text-danger');

                var data = {
                    users_questions_id: question_id,
                    users_customers_id: user_id,
                    status: is_Liked ? 'Unliked' : 'Liked'
                };

                $.ajax({
                    url: '{{url("api/question_likes")}}',
                    method: 'Post',
                    contentType: 'application/json',
                    data: JSON.stringify(data),
                }).done(function(response){
                    if(response.status === 'success'){
                        if(is_Liked) {
                            $this.find('i').removeClass('bi-heart-fill text-danger').addClass('bi-heart text-muted');
                            var likes = parseInt($this.find('span').text());
                            $this.find('span').text(likes - 1);
                        } else {
                            $this.find('i').removeClass('bi-heart text-muted').addClass('bi-heart-fill text-danger');
                            var likes = parseInt($this.find('span').text());
                            $this.find('span').text(likes + 1);
                        }
                    } else {
                        toastr.error('Something went wrong, please try again.');
                    }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    toastr.error('Error: ' + textStatus + ' - ' + errorThrown);
                });

            } else {
                toastr.error("Oops you are not logged in Yet!");
            }
        });
        
    });

    
    
</script>
