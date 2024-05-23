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
                                    Once you've found the perfect pet, just add them to your cart and proceed to checkout! Keep track of your pet's health and behavior with our pet history feature, and stay updated on upcoming events in the pet community.
                                  </p>
                                  <div class="btn-box">
                                      <a href="{{Route('about')}}" class="btn-1">
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
                                     You can shop for pets in our marketplace, . Once you've found the perfect pet, just add them to your cart and proceed to checkout! Keep track of your pet's health and behavior with our pet history feature, and stay updated on upcoming events in the pet community
                                  </p>
                                  <div class="btn-box">
                                      <a href="{{Route('about')}}" class="btn-1">
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
                                      About Our Pet Shop
                                      <br> Pharmacy 
                                  </h1>
                                  <p>
                                    Offers a wide range of medications and healthcare services. We provide online prescription refills, home delivery, and expert consultations. Our goal is to make healthcare simple, accessible, and reliable for you."
                                  </p>
                                  <div class="btn-box">
                                      <a href="{{Route('pharmacy')}}" class="btn-1">
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
                                      About Our Pet Shop <br>
                                      <span>Services & Accessories</span>
                                  </h1>
                                  <p>
                                    Offers a variety of high-quality pet accessories to keep your furry friends happy and healthy. From cozy beds and stylish collars to fun toys and nutritious treats, we have everything you need for your pets. Shop with us for affordable, reliable, and stylish pet products.
                                  </p>
                                  <div class="btn-box">
                                      <a href="{{Route('accessory.food')}}" class="btn-1">
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
                                      About Our <br>
                                      <span>Discussion Forum</span>
                                  </h1>
                                  <p>
                                    Your go-to place for engaging discussions and community support. Join us to share ideas, ask questions, and connect with others who share your interests. Whether you're looking for advice, information, or friendly conversation, our forum is the perfect place to be...
                                  </p>
                                  <div class="btn-box">
                                      <a href="{{Route('discussion.forum')}}" class="btn-1">
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
            @foreach ($products as $product)
                <div class="pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{ asset('storage/'. $product->image) }}" alt="product">
                        <h6 class="text-uppercase">{{$product->name}}</h6>
                        <h5 class="text-primary mb-0 text-uppercase">{{$product->currency}} {{$product->price}}</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer"
                                onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{ Route('product.details', $product->pet_shop_products_id) }}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>  
            @endforeach
            {{-- <div class="pb-5">
                <div class="product-item position-relative bg-light d-flex flex-column text-center">
                    <img class="img-fluid mb-4" src="{{asset('users/template/img/product-1.png')}}" alt="">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary mb-0">$199.00</h5>
                    <div class="btn-action d-flex justify-content-center">
                        <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer" onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer" onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer" onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer" onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
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
                        <a class="btn btn-primary py-2 px-3 redirect-to-cart text-white cursor-pointer" onclick="RedirectToLogin('cart');"><i class="bi bi-cart"></i></a>
                        <a class="btn btn-primary py-2 px-3" href="{{Route('product.details')}}"><i class="bi bi-eye"></i></a>
                    </div>
                </div>
            </div> --}}
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
                    <h5 class="text-uppercase mb-3">Pet Training</h5>
                    <p>"Transform your pet's behavior with our expert training guidance! Learn positive ...</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-food display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Feeding</h5>
                    <p>Offers a wide selection of premium pet food to keep your furry friends healthy and happy...</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-grooming display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Grooming</h5>
                    <p>Provides top-notch pet grooming services to keep your furry friends looking and feeling their best...</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-cat display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet care</h5>
                    <p>One-stop resource for all things pet care! We understand the importance of providing..</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-dog display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Aboption</h5>
                    <p>Is dedicated to helping animals find loving homes through our pet adoption services...</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="service-item bg-light d-flex p-4">
                <i class="flaticon-vaccine display-1 text-primary mr-4"></i>
                <div>
                    <h5 class="text-uppercase mb-3">Pet Treatment</h5>
                    <p>Offers a wide range of medications and healthcare services. We provide...</p>
                    <a class="text-primary text-uppercase" href="{{Route('about')}}">Read More<i class="bi bi-chevron-right"></i></a>
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
@endsection