@extends('layouts.master')



@section('content')

	<!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Contact Us</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li class="active">Contact</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
      <div class="container pt-50 pb-70">
        <div class="row pt-10">
          <div class="col-md-5">
            <h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Find Our Location</h4>
            <!-- Google Map HTML Codes -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59990.65887208493!2d73.76846144556879!3d19.991040271901912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1508123275428" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="col-md-7">
            <h4 class="mt-0 mb-30 line-bottom-theme-colored-2">Interested in discussing?</h4>
            <!-- Contact Form -->
            <form id="contact_form" name="contact_form" class="" action="#" method="post">

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group mb-30">
                    <input id="form_name" name="name" class="form-control" type="text" placeholder="Enter Name" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-30">
                    <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email">
                  </div>
                </div>
              </div>                
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group mb-30">
                    <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-30">
                    <input id="form_phone" name="phone" class="form-control" type="text" placeholder="Enter Phone">
                  </div>
                </div>
              </div>

              <div class="row">
               <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Attach a file"  name="file" required="" class="form-control" aria-required="true" type="file">
                </div>
              </div>
              </div>

              <div class="form-group mb-30">
                <textarea id="form_message" name="message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
              </div>
              <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-flat bg-theme-colored mr-5 text-white" data-loading-text="Please wait...">Send your message</button>
                <button type="reset" class="btn btn-flat btn-theme-colored2 bg-hover-theme-colored">Reset</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-60">
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
              <i class="fa fa-phone font-36 mb-10 text-theme-colored2"></i>
              <h4>Call Us</h4>
              <h6 class="text-gray">Phone: (+91) 8800106866</h6>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
              <i class="fa fa-map-marker font-36 mb-10 text-theme-colored2"></i>
              <h4>Address</h4>
              <h6 class="text-gray">Nashik, Maharashtra, India</h6>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center bg-silver-light border-1px pt-60 pb-60">
              <i class="fa fa-envelope font-36 mb-10 text-theme-colored2"></i>
              <h4>Email</h4>
              <h6 class="text-gray">info@aegisinstitute.co.in</h6>
            </div>
          </div>
          
        </div>
      </div>
    </section>
	

@endsection