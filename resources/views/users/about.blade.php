@extends('users.layouts.master')
@section('content')
    <div class="sub_page">
        <!-- about section -->
        <section class="about_section layout_padding-bottom layout_padding2-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-box">
                            <img src="{{ asset('users/images/about-img.jpg') }}" alt="img" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h2>
                                    About Us
                                    <hr>
                                </h2>
                            </div>
                            <p>
                                Our pet website will be a one-stop destination for everything related to pets. Users can create their own profiles to access all the cool features we offer. You can shop for pets in our marketplace, . Once you've found the perfect pet, just add them to your cart and proceed to checkout! Keep track of your pet's health and behavior with our pet history feature, and stay updated on upcoming events in the pet community. Need advice or want to share stories? Our discussion forum is the perfect place to connect with other pet lovers. Plus, we've partnered with verified veterinarians to ensure that all pets listed for sale are healthy and approved. If you ever need to visit a pet doctor, our website makes it easy to find one in your area. With our pharmacy and pet shop, you can conveniently purchase all the essentials your pets needs. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about section -->

        <!-- wedo section --> 
        <section class="wedo_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        <hr>
                        What We Do
                        <hr>
                    </h2>
                    <p class="text-left">
                        Our pet website will be a one-stop destination for everything related to pets. Users can create their own profiles to access all the cool features we offer. You can shop for pets in our marketplace,
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{asset('users/images/s1.png')}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Pet Treatment
                                </h6>
                                <p class="text-left">
                                    Offers a wide selection of premium pet food to keep your furry friends healthy and happy. From nutritious dry and wet food to special dietary options, we have the right products for every pet. Trust us for high-quality, affordable, and delicious food that your pets will love."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{asset('users/images/s2.png')}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Pet Feeding
                                </h6>
                                <p class="text-left">
                                    Offers a wide selection of premium pet food to keep your furry friends healthy and happy. From nutritious dry and wet food to special dietary options, we have the right products for every pet. Trust us for high-quality, affordable, and delicious food that your pets will love."
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="img-box">
                                <img src="{{asset('users/images/s3.png')}}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Pet Grooming
                                </h6>
                                <p class="text-left">
                                    Provides top-notch pet grooming services to keep your furry friends looking and feeling their best. Our professional groomers offer a range of services, including baths, haircuts, nail trims, and more. We use high-quality products to ensure a safe and comfortable experience for your pets.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end wedo section -->

        <!-- our team section -->
        <section class="layout_padding-bottom team_section">
          <div class="container">
            <div class="heading_container heading_center">
              <h2><hr> Professional Doctors <hr></h2>
            </div>
            <div class="container-fluid py-5">
              <div class="container">
                <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('users/template/img/team-1.jpg')}}" alt="">
                            <div class="team-overlay">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase">Full Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('users/template/img/team-2.jpg')}}" alt="">
                            <div class="team-overlay">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase">Full Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('users/template/img/team-3.jpg')}}" alt="">
                            <div class="team-overlay">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase">Full Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('users/template/img/team-4.jpg')}}" alt="">
                            <div class="team-overlay">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase">Full Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('users/template/img/team-5.jpg')}}" alt="">
                            <div class="team-overlay">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase">Full Name</h5>
                            <p class="m-0">Designation</p>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          </div>
        </section>
        <!-- end our team section -->
    </div>
@endsection
