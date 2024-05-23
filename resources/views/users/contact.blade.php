@extends('users.layouts.master')
@section('content')
  <!-- Offer Start -->
  <div class="container-fluid bg-offer py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-start">
            <div class="col-lg-7">
                <div class="border-start border-5 border-dark ps-5 mb-5">
                    <h1 class="display-4 text-uppercase text-white mb-0">Contact Us</h1>
                </div>
                <p class="text-white mb-4">Your go-to place for engaging discussions and community support. Join us to share ideas, ask questions, and connect with others who share your interests. Whether you're looking for advice, information, or friendly conversation, our forum is the perfect place to be heard and get involved</p>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->
<div class="sub_page">
  <!-- contact section -->
  
  <section class="contact_section layout_padding-bottom layout_padding2-top">
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
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
              <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d425292.8128541647!2d72.75644270054283!3d33.61567899586028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfbfd07891722f%3A0x6059515c3bdb02b6!2sIslamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1716376798865!5m2!1sen!2s" width="600" height="430" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- end contact section -->
</div> 
@endsection