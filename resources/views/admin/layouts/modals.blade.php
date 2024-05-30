<!-- Dynamic Modal -->
<div class="modal fade" id="DynamicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Get The Pet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="bg-light rounded h-100 p-4">
                    <form action="{{ Route('add.products') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center flex-column mb-3">
                            <div class="product-img-cover rounded d-flex justify-content-center align-items-center cursor-pointer">
                                <i class="bi-image text-primary text-center"></i>
                            </div>
                            <div class="img-preview rounded mb-3 d-none"></div>
                            <input type="file" class="d-none" name="image" id="product_image_value" required>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="product_name"
                                        required>
                                    <label for="floatingInput">Product Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword" name="short_desc"
                                        required>
                                    <label for="floatingPassword">Short Description</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control resize-none" name="description" id="floatingTextarea" style="height: 135px;" required></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="category"
                                        aria-label="Floating label select example">
                                        <option selected>Select category</option>
                                        <option value="Accessories">Accessories</option>
                                        <option value="Food">Food</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                    </select>
                                    <label for="floatingSelect">Categories for pet shop</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword" name="sub_category"
                                        required>
                                    <label for="floatingPassword">Sub Category</label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control text-uppercase" name="currency"
                                                id="floatingPassword" required>
                                            <label for="floatingPassword">Currency</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="price"
                                                id="floatingPassword" required>
                                            <label for="floatingPassword">Price</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="stock" id="floatingPassword"
                                        required>
                                    <label for="floatingPassword">Stock</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                        <option selected>Select Status</option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                        <option value="Sale">Sale</option>
                                        <option value="New">New</option>
                                    </select>
                                    <label for="floatingSelect">Current Status of the Product</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal" tabindex="-1" id="DeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="text-center my-3"><i class="fa fa-trash text-danger me-4"></i>Are you sure you want to delete?</h5>
          <form action="" method="POST" id="deleteForm">
            @csrf
              <div class="text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Update Status Modal -->
    <div class="modal" tabindex="-1" id="UpdateStatus_Modal">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h6 class="text-center my-3">Are you sure you want to Update current status?</h6>
            <form action="" method="POST" id="statusUpdate">
                @csrf
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>

<!-- Edit Modal -->
  <div class="modal fade" id="EditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Get The Pet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <div class="bg-light rounded h-100 p-4">
                    <form action="{{ Route('edit.products') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center flex-column mb-3">
                            <div class="edit-img-preview rounded d-flex justify-content-center align-items-center cursor-pointer">
                                <img src="" alt="" class="old-img">
                            </div>
                            <input type="file" class="d-none" name="image" id="product_image_value" required>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput productName" name="product_name"
                                        required>
                                    <label for="floatingInput">Product Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword productShortDescription" name="short_desc"
                                        required>
                                    <label for="floatingPassword">Short Description</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control resize-none" name="description" id="floatingTextarea productDescription" style="height: 135px;" required></textarea>
                                    <label for="floatingTextarea">Description</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect productCategory" name="category"
                                        aria-label="Floating label select example">
                                        <option selected>Select category</option>
                                        <option value="Accessories">Accessories</option>
                                        <option value="Food">Food</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                    </select>
                                    <label for="floatingSelect">Categories for pet shop</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPassword productSubCategory" name="sub_category"
                                        required>
                                    <label for="floatingPassword">Sub Category</label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control text-uppercase" name="currency"
                                                id="floatingPassword productStock" required>
                                            <label for="floatingPassword">Currency</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="price"
                                                id="floatingPassword productPrice" required>
                                            <label for="floatingPassword">Price</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="stock" id="floatingPassword productStock"
                                        required>
                                    <label for="floatingPassword">Stock</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect productStatus" name="status"
                                        aria-label="Floating label select example">
                                        <option selected>Select Status</option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                        <option value="Sale">Sale</option>
                                        <option value="New">New</option>
                                    </select>
                                    <label for="floatingSelect">Current Status of the Product</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>