@extends('admin.layouts.master')
@section('admindata')
     <!-- Users Table -->
     <div class="container-fluid mt-3 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="">Pet Products</h6>
                    <button type="button" class="btn btn-primary rounded-pill" onclick="AddProducts();">Add Products</button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)        
                            <tr class="align-middle">
                                <th scope="row">{{$product->pet_shop_products_id}}</th>
                                <!-- Image -->
                                <td><img src="{{asset('storage/'.$product->image)}}" alt="profile" class="flex-shrink-0" style="width: 5vw;height:5vw;"></td>

                                <!-- First Name -->
                                <td>{{$product->name}}</td>

                                <!-- Last Name -->
                                <td>{{$product->short_description}}</td>

                                <!-- Username -->
                                <td>{{$product->description}}</td>

                                <!-- Email -->
                                <td>{{$product->category}}</td>

                                <!-- Phone number -->
                                <td>{{$product->sub_category}}</td>
                            
                                <!-- Address -->
                                <td>{{$product->stock}}</td>

                                <!-- Status -->
                                <td>{{$product->price}}</td>

                                <!-- Actions -->
                                <td>{{$product->status}}</td>

                                <!-- Actions -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Delete -->
                                        <button type="button" class="btn btn-outline-danger m-2" onclick="DeleteModal('{{$product->pet_shop_products_id}}');"><i class="fa fa-trash"></i></button>
                                        <!-- Edit -->
                                        <button type="button" class="btn  btn-outline-primary m-2"onclick="EditModal('{{ json_encode($product) }}')"><i class="fa fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Table end -->
@endsection