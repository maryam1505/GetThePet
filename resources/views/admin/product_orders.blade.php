@extends('admin.layouts.master')

@section('admindata')
<div class="container-fluid pt-4 px-4">
    <div class="g-4 rounded h-100 py-2">
        <div class="row col-12">
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                    <i class="fa fa-clock fa-4x text-info"></i>
                    <div class="d-flex align-items-center flex-column">
                        <span class="mb-0 tiny text-info">Pending</span>
                        <h3 class="display-4 m-0 text-info">4</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                    <i class="fa fa-shipping-fast fa-4x text-warning"></i>
                    <div class="d-flex align-items-center flex-column">
                        <span class="mb-0 tiny text-warning">Processed</span>
                        <h3 class="display-4 m-0 text-warning">4</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                    <i class="fa fa-check-circle fa-4x text-success"></i>
                    <div class="d-flex align-items-center flex-column">
                        <span class="mb-0 tiny text-success">Completed</span>
                        <h3 class="display-4 m-0 text-success">4</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="bg-light rounded d-flex align-items-center justify-content-evenly p-4">
                    <i class="fas fa-times-circle fa-4x text-danger"></i>
                    <div class="d-flex align-items-center flex-column">
                        <span class="mb-0 tiny text-danger">Cancelled</span>
                        <h3 class="display-4 m-0 text-danger">4</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Users Table -->
    <div class="container-fluid mt-3 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Product Orders</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Total Items</th>
                                <th scope="col">Total Quantities</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Billing Address</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                    <tr class="align-middle">
                                        <th scope="row">{{$order->users_orders_id}}</th>

                                        <!-- User ID -->
                                        <th scope="row">{{$order->users_customers_id}}</th>

                                        <!-- Order Number -->
                                        <td> {{$order->order_number}} </td>

                                        <!-- Total Items -->
                                        <td>  {{$order->total_items}} </td>

                                        <!-- Total Quantities -->
                                        <td>  {{$order->total_quantities}} </td>

                                        <!-- Total Amount -->
                                        <td>  {{$order->total_amount}} </td>

                                        <!-- Payment Method-->
                                        <td> {{$order->payment_method}} </td>
                                    
                                        <!-- Billing Address -->
                                        <td>  {{$order->address}} </td>

                                        <!-- Payment Status -->
                                        <td>
                                            @php
                                                switch($order->payment_status) {
                                                    case 'paid':
                                                        $text = 'text-success';
                                                        break;
                                                    case 'pending':
                                                        $text = 'text-info';
                                                        break;
                                                    case 'failed':
                                                        $text = 'text-danger';
                                                        break;
                                                    default:
                                                        $text = '';
                                                        break;
                                                }
                                            @endphp
                                            <div class="{{$text}} text-capitalize">
                                                {{$order->payment_status}}
                                            </div>
                                        </td>

                                        <!-- Order Status -->
                                        <td>
                                            @php
                                                switch($order->order_status) {
                                                    case 'processed':
                                                    case 'completed':
                                                        $text = 'text-success';
                                                        break;
                                                    case 'pending':
                                                        $text = 'text-info';
                                                        break;
                                                    case 'canceled':
                                                        $text = 'text-danger';
                                                        break;
                                                    default:
                                                        $text = '';
                                                        break;
                                                }
                                            @endphp
                                            <div class="{{$text}} text-capitalize">
                                                {{$order->order_status}}
                                            </div>
                                        </td>
                                        <!-- Action -->
                                        <td> 
                                            <div class="d-flex align-items-center">
                                                <!-- Edit -->
                                                <button type="button" class="btn  btn-outline-primary m-2"onclick="OrderEditModal('{{ json_encode($order) }}')"><i class="fa fa-pen"></i></button>
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