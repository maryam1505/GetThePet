@extends('users.layouts.master')

@section('content')
    <section class="h-100 h-custom cart-bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-center align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Check Out</h1>
                                        </div>
                                        <hr class="my-4">

                                        <div class="card-body contact_section">
                                            <form action="#">
                                                <div class="row ">
                                                    <div class="col">
                                                        <div data-mdb-input-init class="form-outline-none">
                                                            <input type="text" id="form7Example1" class="form-control"
                                                                placeholder="First Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div data-mdb-input-init class="form-outline-none">
                                                            <input type="text" id="form7Example2" class="form-control"
                                                                placeholder="Last Name" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="Name" />
                                                </div>
                                                <div>
                                                    <input type="email" placeholder="Email" />
                                                </div>
                                                <div>
                                                    <input type="text" placeholder="Pone Number"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                </div>
                                                <div>
                                                    <input type="text" class="message-box" placeholder="Address" />
                                                </div>
                                            </form>
                                        </div>

                                        <hr class="my-4">

                                        <div class="row justify-content-end">
                                            <div class="pt-5 col-4">
                                                <div class="subtotal">
                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-2">Total items</p>
                                                        <p class="mb-2">3</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="mb-2">$23.49</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                                        <p class="mb-0">Shipping</p>
                                                        <p class="mb-0">$2.99</p>
                                                    </div>

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between mb-4"
                                                        style="font-weight: 500;">
                                                        <p class="mb-2">Total (tax included)</p>
                                                        <p class="mb-2">$26.48</p>
                                                    </div>

                                                    <button type="button" onclick="window.location.href='/thankyou'" class="btn btn-primary btn-block btn-lg rounded mb-2">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Make Purchase</span>
                                                            <span>$26.48</span>
                                                        </div>
                                                    </button>
                                                    <div class="small text-danger text-right">
                                                        <p>Cash on delivery</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="mb-0 mt-4 text-body cursor-pointer" onclick="BacktoShop();"><i class="fas fa-long-arrow-alt-left mr-2"></i>Back to shop</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
