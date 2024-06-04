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
                            <tr class="align-middle">
                                <th scope="row">{{$user->users_customers_id}}</th>
                                <!-- Image -->
                                <td>
                                    @php
                                        $imageSrc = empty($user->image) ? asset('admin/img/user-placeholder.png') : asset("storage/{$user->image}");
                                    @endphp
                                    <img src="{{ $imageSrc }}" alt="profile" class="flex-shrink-0 rounded-circle" style="width:2vw;height:2vw;">
                                </td>

                                <!-- First Name -->
                                <td>
                                    @php
                                        $first_name = empty($user->first_name) ? "N/A" : $user->first_name;
                                    @endphp
                                    {{$first_name}}
                                </td>

                                <!-- Last Name -->
                                <td>
                                    @php
                                        $last_name = empty($user->last_name) ? "N/A" : $user->last_name;
                                    @endphp
                                    {{$last_name}}
                                </td>

                                <!-- Username -->
                                <td>
                                    @php
                                        $username = empty($user->username) ? "N/A" : $user->username;
                                    @endphp
                                    {{$username}}
                                </td>

                                <!-- Email -->
                                <td>
                                    @php
                                        $email = empty($user->email) ? "N/A" : $user->email;
                                    @endphp
                                    {{$email}}
                                </td>

                                <!-- Phone number -->
                                <td>
                                    @php
                                        $phone_no = empty($user->phone_no) ? "N/A" : $user->phone_no;
                                    @endphp
                                    {{$phone_no}}
                                </td>
                            
                                <!-- Address -->
                                <td>
                                    @php
                                        $address = empty($user->address) ? "N/A" : $user->address;
                                    @endphp
                                    {{$address}}
                                </td>

                                <!-- Status -->
                                <td>
                                    @php
                                        switch($user->status) {
                                            case 'Active':
                                                $text = 'text-success';
                                                break;
                                            case 'Inactive':
                                                $text = 'text-secondary';
                                                break;
                                            case 'Deactivated':
                                            case 'Deleted':
                                                $text = 'text-danger';
                                                break;
                                            default:
                                                $text = '';
                                                break;
                                        }
                                    @endphp
                                    <div class="{{$text}}">
                                        {{$user->status}}
                                    </div>
                                </td>
                                <!-- Action -->
                                <td> 
                                    @php
                                        $statuses = ['Active', 'Inactive', 'Deactivated', 'Deleted'];
                                    @endphp
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown">
                                            <a href="#" class="nav-link text-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="dynamic">Status</a>
                                            <div class="dropdown-menu">
                                                @foreach ($statuses as $status)
                                                    @if ($status !== $user->status)
                                                    <a class="dropdown-item cursor-pointer" onclick="UpdateStatus('{{ route('status.update', ['id' => $user->users_customers_id, 'status' => $status]) }}');">{{ $status }}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- <a class="cursor-pointer" onclick="DeleteUser('{{Route('user.delete', $user->users_customers_id)}}')"><i class="fa fa-trash text-danger"></i></a> --}}
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