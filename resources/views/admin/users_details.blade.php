@extends('admin.layouts.master')

@section('admindata')
    <!-- Users Table -->
    <div class="container-fluid mt-3 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Users Customers</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->users_customers_id}}</th>
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