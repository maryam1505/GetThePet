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
        $('#deleteForm').attr('action', '{{ route("product.delete", ":id") }}'.replace(':id', id));
    }

    function DeleteUser(url) {
        $('#DeleteModal').modal('show');
        $('#deleteForm').attr('action', url);
    }

    function UpdateStatus(url) {
        $('#UpdateStatus_Modal').modal('show');
        $('#statusUpdate').attr('action', url);
    }

    function EditModal(data) {
        let product = JSON.parse(data);
        $('.modal-body').empty();
        var Editform = `<div class="bg-light rounded h-100 p-4">
                <form action="{{ Route('edit.products') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="${product.pet_shop_products_id}">
                    <div class="d-flex justify-content-center align-items-center flex-column mb-3">
                        <div class="edit-img-preview rounded d-flex justify-content-center align-items-center cursor-pointer">
                            <img src="{{asset('storage')}}/${product.image}" alt="${product.name}" class="old-img">
                        </div>
                        <input type="file" class="d-none" name="image" id="product_image_value">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput productName" name="product_name" value="${product.name}"
                                    required>
                                <label for="floatingInput">Product Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword productShortDescription" name="short_desc" value="${product.short_description}"
                                    required>
                                <label for="floatingPassword">Short Description</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control resize-none" name="description" id="floatingTextarea productDescription" style="height: 135px;" required>${product.description}</textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="productCategory" name="category" aria-label="Floating label select example" required>
                                    <option value="" disabled>Select category</option>
                                    <option value="Accessories" ${product.category === 'Accessories' ? 'selected' : ''}>Accessories</option>
                                    <option value="Food" ${product.category === 'Food' ? 'selected' : ''}>Food</option>
                                    <option value="Pharmacy" ${product.category === 'Pharmacy' ? 'selected' : ''}>Pharmacy</option>
                                </select>
                                <label for="floatingSelect">Categories for pet shop</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword productSubCategory" name="sub_category" value="${product.sub_category}"
                                    required>
                                <label for="floatingPassword">Sub Category</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control text-uppercase" name="currency"
                                            id="floatingPassword productStock" value="${product.currency}" required>
                                        <label for="floatingPassword">Currency</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" name="price"
                                            id="floatingPassword productPrice"  value="${product.price}" required>
                                        <label for="floatingPassword">Price</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="stock" id="floatingPassword productStock" value="${product.stock}"
                                    required>
                                <label for="floatingPassword">Stock</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="productStatus" name="status" aria-label="Floating label select example" required>
                                    <option value="" disabled>Select Status</option>
                                    <option value="In Stock" ${product.status === 'In Stock' ? 'selected' : ''}>In Stock</option>
                                    <option value="Out of Stock" ${product.status === 'Out of Stock' ? 'selected' : ''}>Out of Stock</option>
                                    <option value="Sale" ${product.status === 'Sale' ? 'selected' : ''}>Sale</option>
                                    <option value="New" ${product.status === 'New' ? 'selected' : ''}>New</option>
                                </select>
                                <label for="floatingSelect">Current Status of the Product</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>`;

        $('.modal-body').append(Editform);
        $('#EditModal').modal('show');
    }

    function OrderEditModal(data) {
        let order = JSON.parse(data);
        $('.modal-body').empty();
        $('.modal-title').empty();
        $('.modal-title').text('Get The Pet - Order Status');

        var Editform = `<div class="bg-light rounded h-100 p-4">
                <form action="{{ Route('edit.order') }}" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="${order.users_orders_id}">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="${order.order_number}"
                                    disabled>
                                <label for="floatingInput">Order Number</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" value="${order.payment_method}"
                                    disabled>
                                <label for="floatingPassword">Payment Method</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="productCategory" name="payment_status" aria-label="Floating label select example" required>
                                    <option value="" disabled>Update Status</option>
                                    <option value="paid" ${order.payment_status === 'paid' ? 'selected' : ''}>Paid</option>
                                    <option value="pending" ${order.payment_status === 'pending' ? 'selected' : ''}>Pending</option>
                                    <option value="failed" ${order.payment_status === 'failed' ? 'selected' : ''}>Failed</option>
                                </select>
                                <label for="floatingSelect">Order Payment Status</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="productStatus" name="order_status" aria-label="Floating label select example" required>
                                    <option value="" disabled>Update Status</option>
                                    <option value="Pending" ${order.order_status === 'pending' ? 'selected' : ''}>Pending</option>
                                    <option value="Processed" ${order.order_status === 'processed' ? 'selected' : ''}>Processed</option>
                                    <option value="Completed" ${order.order_status === 'completed' ? 'selected' : ''}>Completed</option>
                                    <option value="Canceled" ${order.order_status === 'canceled' ? 'selected' : ''}>Canceled</option>
                                </select>
                                <label for="floatingSelect">Product Order Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Order</button>
                    </div>
                </form>
            </div>`;
        $('.modal-body').append(Editform);
        $('#EditModal').modal('show');
    }
</script>
