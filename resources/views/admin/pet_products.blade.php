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
                            {{-- <tr>
                                <th scope="row">{{$products->users_customers_id}}</th>
                                <!-- Image -->
                                <td><img src="{{asset($user->image)}}" alt="profile" class="flex-shrink-0 rounded-circle"></td>

                                <!-- First Name -->
                                <td>{{$user->first_name}}</td>

                                <!-- Last Name -->
                                <td>{{$user->last_name}}</td>

                                <!-- Username -->
                                <td>{{$user->username}}</td>

                                <!-- Email -->
                                <td>{{$user->email}}</td>

                                <!-- Phone number -->
                                <td>{{$user->phone_no}}</td>
                            
                                <!-- Address -->
                                <td>{{$user->address}}</td>

                                <!-- Status -->
                                <td>{{$user->status}}</td>

                                <!-- Actions -->
                                <td></td>
                            </tr>  --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Table end -->
@endsection