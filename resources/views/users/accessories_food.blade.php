@extends('users.layouts.master')
@section('content')
     <!-- Offer Start -->
     <div class="container-fluid bg-offer py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Special Offer</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Save 50% on all items your first order</h1>
                    </div>
                    <p class="text-white mb-4">Eirmod sed tempor lorem ut dolores sit kasd ipsum. Dolor ea et dolore et at sea ea at dolor justo ipsum duo rebum sea. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo lorem. Elitr ut dolores magna sit. Sea dolore sed et.</p>
                    <a href="" class="btn btn-light py-md-3 px-md-5 me-3">Shop Now</a>
                    <a href="" class="btn btn-outline-light py-md-3 px-md-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Acessory Options -->
    <section class="acessory_section">
        <div class="row justify-content-evenly align-items-center my-1">
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/food.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Food</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/care.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Care</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/acessory.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Acessories</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/clothing.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Clothing</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/decor.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Decor</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/groming.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Grooming</h5>
            </div>
            <div class="food-options d-flex flex-column align-items-center justify-content-center">
                <div>
                    <div class="img-cover mb-3">
                        <img src="{{asset('users/images/waggy/medicine.png')}}" alt="">
                    </div>
                </div>
                <h5 class="text-uppercase text-center my-2">Medicine</h5>
            </div>
        </div>
    </section>
    <!-- Acessory Options End -->

    <!-- new Products -->
    <section class="layout_padding-bottom py-5">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2><hr> New Products <hr></h2>
            </div>
            <div class="owl-carousel product-carousel">
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-1.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-2.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-3.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-4.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-2.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new Products end -->

    <!-- Featured -->
    <section class="layout_padding-bottom py-5">
        <div class="container">
            <div class="heading_container heading_center pb-5">
                <h2><hr> Featured Products <hr></h2>
            </div>
            <div class="row">
                <div class="col-lg-6 pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{asset('users/template/img/product-1.png')}}" alt="">
                        <h6 class="text-uppercase">Quality Pet Foods</h6>
                        <h5 class="text-primary mb-0">$199.00</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="pb-5">
                                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-2.png')}}" alt="">
                                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                                    <h5 class="text-primary mb-0">$199.00</h5>
                                    <div class="btn-action d-flex justify-content-center">
                                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pb-5">
                                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-3.png')}}" alt="">
                                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                                    <h5 class="text-primary mb-0">$199.00</h5>
                                    <div class="btn-action d-flex justify-content-center">
                                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pb-5">
                                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-4.png')}}" alt="">
                                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                                    <h5 class="text-primary mb-0">$199.00</h5>
                                    <div class="btn-action d-flex justify-content-center">
                                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="pb-5">
                                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-2.png')}}" alt="">
                                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                                    <h5 class="text-primary mb-0">$199.00</h5>
                                    <div class="btn-action d-flex justify-content-center">
                                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin('cart');" data-destination="cart"><i class="bi bi-cart"></i></a>
                                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured end -->
@endsection