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
                                anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the
                                Internet tend to repeat predefined chunks as necessary, making this the first true generator
                                on the Internetanything embarrassing hidden in the middle of text. All the Lorem Ipsum
                                generators on the Internet tend to repeat predefined chunks as necessary, making this the
                                first true generator on the Internetanything embarrassing hidden in the middle of text. All
                                the Lorem Ipsum generators on the Internet tend to repeat
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente reprehenderit nobis
                                doloribus blanditiis soluta aliquid ab, rem necessitatibus eveniet quis autem pariatur
                                maxime exercitationem vel, consequatur sed quasi commodi modi nam. Delectus sint nostrum
                                consequatur deleniti dignissimos fugit, illo fuga cum porro consectetur. Impedit, quas.
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
                    <p>
                        It is a long established fact that a reader will be distracted by
                        the readable content of a page when looking at its layout. The point
                        of using Lorem
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
                                    Pet Adoption
                                </h6>
                                <p>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                    The point of using Lorem
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
                                    Pet Care
                                </h6>
                                <p>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                    The point of using Lorem
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
                                    Pet Training
                                </h6>
                                <p>
                                    It is a long established fact that a reader will be distracted
                                    by the readable content of a page when looking at its layout.
                                    The point of using Lorem
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
