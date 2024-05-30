@extends('admin.layouts.master')
@section('admindata')
    <!-- Sale & Revenue Start -->
    {{-- <div class="container-fluid pt-4 px-4 mb-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Revenue</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    
    <!-- Active Users -->
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Active Users</h6>
        <div class="g-4 row rounded h-100">
            @foreach ($active_users as $item)
                <div class="col">
                    <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                        @php
                            $imageSrc = empty($user->image) ? asset('admin/img/user-placeholder.png') : asset("storage/{$user->image}");
                        @endphp
                        <img src="{{ $imageSrc }}" alt="{{$item->name}}" style="width:5vw;height:5vw;">
                        <div class="">
                            <p class="mb-2 text-capitalize">{{$item->username}}</p>
                            <h6 class="mb-0">{{$item->email}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Recent Users -->
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Recent Users</h6>
        <div class="g-4 row rounded h-100">
            @foreach ($recent_users as $item)
                <div class="col">
                    <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                        @php
                            $imageSrc = empty($user->image) ? asset('admin/img/user-placeholder.png') : asset("storage/{$user->image}");
                        @endphp
                        <img src="{{ $imageSrc }}" alt="{{$item->name}}" style="width:5vw;height:5vw;">
                        <div class="">
                            <p class="mb-2 text-capitalize">{{$item->username}}</p>
                            <h6 class="mb-0">{{$item->email}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Most Wanted Products -->
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Most Wanted Products</h6>
        <div class="g-4 row rounded h-100">
            @foreach ($wanted_products as $item)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{$item->name}}" style="width:5vw;height:5vw;">
                        <div class="ms-3">
                            <p class="mb-2">{{$item->name}}</p>
                            <h6 class="mb-0">{{$item->category}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- recent Products -->
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Recent Products</h6>
        <div class="g-4 row rounded h-100">
            @foreach ($recent_products as $item)
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{$item->name}}" style="width:5vw;height:5vw;">
                        <div class="ms-3">
                            <p class="mb-2">{{$item->name}}</p>
                            <h6 class="mb-0">{{$item->category}}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

    
@endsection