<!-- JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('admin/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.product-img-cover', function(event) {
            event.stopPropagation(); 
            event.preventDefault(); 
            $("#product_image_value").click();
        });   
        $(document).on('click', '.edit-img-preview', function(event) {
            event.stopPropagation(); 
            event.preventDefault(); 
            $("#product_image_value").click();
        });   
    });
    $(document).ready(function() {
        $("#product_image_value").on('change', function(event) {
            event.stopPropagation();
            event.preventDefault();

            var file = event.target.files[0];
            console.log(file);
            if (file && file.type.match('image.*')) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.img-preview').html('<img src="' + e.target.result +
                        '" alt="Preview Image">').removeClass('d-none');
                    $('.product-img-cover').addClass('d-none');
                    $('.edit-img-preview').html('<img src="' + e.target.result +
                        '" alt="Preview Image">');
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file.');
            }
        });
    });

    function AddProducts() {
        $("#DynamicModal").find('.modal-title').html('Add Pet Products');
        $('#DynamicModal').find('.modal-footer').hide();
        $('#DynamicModal').modal('show');
    }
    
    function DeleteModal(id) {
        $('#DeleteModal').modal('show');
        $('#delete_id').val(id);
    }

    function EditModal(data) {
        var product = JSON.parse(data);

        document.getElementById('productName').value = product.name;
        document.getElementById('productShortDescription').value = product.short_description;
        document.getElementById('productDescription').value = product.description;
        document.getElementById('productSubCategory').value = product.sub_category;
        document.getElementById('productStock').value = product.stock;
        document.getElementById('productCurrency').value = product.currency;
        document.getElementById('productPrice').value = product.price;
        document.getElementById('productCategory').value = product.category;
        document.getElementById('productStatus').value = product.status;

        var imagePath = '{{ asset("storage") }}/' + product.image;
        $('.old-img').attr('src', imagePath);

        $('#EditModal').modal('show');
    }

</script>
