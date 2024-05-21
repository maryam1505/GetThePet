@extends('users.layouts.master')
@section('content')
<div class="hero_area">
  <!-- slider section -->
  <section class=" slider_section position-relative">
      <div class="slider_bg_box">
          <img src="{{asset('users/images/slider-bg.jpg')}}" alt="get the pet">
      </div>
      <div class="container">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <div class="row">
                          <div class="col-md-7 col-lg-6">
                              <div class="detail-box">
                                  <h1>
                                      Welcome to
                                      <br>Our Pet Shop
                                  </h1>
                                  <p>
                                      It is a long established fact that a reader will be distracted
                                      by the readable content of a page when looking at its layout.
                                      The point of using Lorem Ipsum is that it has a more-or-less
                                      normal distribution of letters, as
                                  </p>
                                  <div class="btn-box">
                                      <a href="" class="btn-1">
                                          Read More
                                      </a>
                                      <a href="{{Route('contact')}}" class="btn-2">
                                          Contact us
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="row">
                          <div class="col-md-7 col-lg-6">
                              <div class="detail-box">
                                  <h1>
                                      Welcome to
                                      <br>Our Pet Shop
                                  </h1>
                                  <p>
                                      It is a long established fact that a reader will be distracted
                                      by the readable content of a page when looking at its layout.
                                      The point of using Lorem Ipsum is that it has a more-or-less
                                      normal distribution of letters, as
                                  </p>
                                  <div class="btn-box">
                                      <a href="" class="btn-1">
                                          Read More
                                      </a>
                                      <a href="{{Route('contact')}}" class="btn-2">
                                          Contact us
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="row">
                          <div class="col-md-7 col-lg-6">
                              <div class="detail-box">
                                  <h1>
                                      Welcome to
                                      <br>Our Pet Shop
                                  </h1>
                                  <p>
                                      It is a long established fact that a reader will be distracted
                                      by the readable content of a page when looking at its layout.
                                      The point of using Lorem Ipsum is that it has a more-or-less
                                      normal distribution of letters, as
                                  </p>
                                  <div class="btn-box">
                                      <a href="" class="btn-1">
                                          Read More
                                      </a>
                                      <a href="{{Route('contact')}}" class="btn-2">
                                          Contact us
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="row">
                          <div class="col-md-7 col-lg-6">
                              <div class="detail-box">
                                  <h1>
                                      Welcome to Our <br>
                                      <span>Pet Shop</span>
                                  </h1>
                                  <p>
                                      It is a long established fact that a reader will be distracted
                                      by the readable content of a page when looking at its layout.
                                      The point of using Lorem Ipsum is that it has a more-or-less
                                      normal distribution of letters, as
                                  </p>
                                  <div class="btn-box">
                                      <a href="" class="btn-1">
                                          Read More
                                      </a>
                                      <a href="{{Route('contact')}}" class="btn-2">
                                          Contact us
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <div class="detail-box">
                                  <h1>
                                      Welcome to Our <br>
                                      <span>Pet Shop</span>
                                  </h1>
                                  <p>
                                      It is a long established fact that a reader will be distracted
                                      by the readable content of a page when looking at its layout.
                                      The point of using Lorem Ipsum is that it has a more-or-less
                                      normal distribution of letters, as
                                  </p>
                                  <div class="btn-box">
                                      <a href="" class="btn-1">
                                          Read More
                                      </a>
                                      <a href="{{Route('contact')}}" class="btn-2">
                                          Contact us
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>
  <!-- end slider section -->
</div>

<!-- products section -->
<section class="layout_padding-bottom py-5">
    <div class="container">
        <div class="heading_container heading_center pb-5">
            <h2><hr> Our Products <hr></h2>
        </div>
        <div class="owl-carousel product-carousel">
            <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-1.png')}}" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin();"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin();"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin();"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin();"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3" href="" onclick="RedirectToLogin();" data-destination="cart"><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end products section -->

<!-- services section -->
<section class="layout_padding-bottom team_section py-5">
    <div class="container">
      <div class="heading_container heading_center pb-5">
        <h2><hr> Our Services <hr></h2>
      </div>
      <div class="row g-5">
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-house display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Boarding</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-food display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Feeding</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-grooming display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Grooming</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-cat display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Training</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-dog display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Exercise</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-vaccine display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Treatment</h5>
                    <p>Kasd dolor no lorem sit tempor at justo rebum rebum stet justo elitr dolor amet sit</p>
                    <a class="text-primary text-uppercase" href="">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- end services section -->

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

<!-- gallery section -->

<div class="gallery_section ">
  <div class="container-fluid">
      <div class="heading_container heading_center">
          <h2>
              <hr>
              Gallery
              <hr>
          </h2>
      </div>
      <div class="row">
          <div class=" col-sm-8 col-md-6 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g1.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g1.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4 col-md-3 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g2.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g2.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-md-3 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g3.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g3.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-sm-6 col-md-3 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g4.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g4.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-sm-4 col-md-3 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g5.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g5.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
          <div class="col-sm-8 col-md-6 px-0">
              <div class="img-box">
                  <img src="{{asset('users/images/g6.jpg')}}" alt="">
                  <div class="btn-box">
                      <a href="{{asset('users/images/g6.jpg')}}" data-toggle="lightbox" class="btn-1">
                          <i class="fa fa-picture-o" aria-hidden="true"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<!-- end gallery section -->

<!-- client section -->

<section class="client_section layout_padding">
  <div class="client_bg_box">
      <img src="{{asset('users/images/client-bg.jpg')}}" alt="">
  </div>
  <div class="container ">
      <div class="heading_container heading_center">
          <h2>
              <hr>
              What Says Our Clients
              <hr>
          </h2>
      </div>
      <div class="row">
          <div class="col-md-7">
              <div class="box">
                  <div class="img-box">
                      <img src="{{asset('users/images/client1.jpg')}}" alt="" class="box-img">
                  </div>
                  <div class="detail-box">
                      <div class="client_id">
                          <div class="client_info">
                              <h6>
                                  Vernon Bourne
                              </h6>
                              <p>
                                  magna aliqua. Ut
                              </p>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                  </div>
              </div>
          </div>
          <div class="col-md-7 offset-md-5">
              <div class="box">
                  <div class="img-box">
                      <img src="{{asset('users/images/client2.jpg')}}" alt="" class="box-img">
                  </div>
                  <div class="detail-box">
                      <div class="client_id">
                          <div class="client_info">
                              <h6>
                                  Karina Carver
                              </h6>
                              <p>
                                  magna aliqua. Ut
                              </p>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                  </div>
              </div>
          </div>
          <div class="col-md-7">
              <div class="box">
                  <div class="img-box">
                      <img src="{{asset('users/images/client3.jpg')}}" alt="" class="box-img">
                  </div>
                  <div class="detail-box">
                      <div class="client_id">
                          <div class="client_info">
                              <h6>
                                  Sinead Klein
                              </h6>
                              <p>
                                  magna aliqua. Ut
                              </p>
                          </div>
                          <i class="fa fa-quote-left" aria-hidden="true"></i>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- end client section -->

<!-- contact section -->
{{-- 
<section class="contact_section layout_padding">
  <div class="container ">
      <div class="heading_container ">
          <h2 class="">
              Request A call Back
              <hr>
          </h2>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-6 ">
              <form action="#">
                  <div>
                      <input type="text" placeholder="Name" />
                  </div>
                  <div>
                      <input type="email" placeholder="Email" />
                  </div>
                  <div>
                      <input type="text" placeholder="Pone Number" />
                  </div>
                  <div>
                      <input type="text" class="message-box" placeholder="Message" />
                  </div>
                  <div class="btn-box">
                      <button>
                          SEND
                      </button>
                  </div>
              </form>
          </div>
          <div class="col-md-6 mb-3">
              <div class="map_container">
                  <div class="map">
                      <div id="googleMap"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section> --}}

<!-- end contact section -->
@endsection