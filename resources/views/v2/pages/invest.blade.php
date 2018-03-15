@extends('v2.layouts.master')



@section('content')

<!-- ============================================================== -->
            <!-- Static Slider 10  -->
            <!-- ============================================================== -->
            <div class="banner-innerpage" style="background: url('/images/bg/bg-pattern.png'); background-size: cover;height: 300px;padding: 0;">
            	 <div class="overlay" style="height: 300px;background: rgba(0, 173, 10, 0.7);">
                <div class="container">
                    <!-- Row  -->
                    <div class="row justify-content-center ">
                        <!-- Column -->
                        <div class="col-md-6 align-self-center text-center m-t-40" data-aos="fade-down" data-aos-duration="1200">
                            <h1 class="title p-t-30">Invest in Us</h1>
                            <h6 class="subtitle font-medium">We are a Team of Creative People working together</h6> </div>
                        <!-- Column -->
                    </div>
                </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Static Slider 10  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Feature 26 -->
                <!-- ============================================================== -->
                <div class="spacer feature26">
                    <div class="container">
                        <div class="row wrap-feature-26 p-b-0">
                            <div class="col-md-12 align-self-center">
                                <div class="max-box">
                                    <h2 class="title ">Why is AEGIS ?</h2>
                                    <p class="m-t-20 text-dark font-18">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    
                                </div>
                            </div>
                            

                              <div class="col-md-12 align-self-center m-t-20">
                                <div class="max-box">
                                    <h2 class="title ">How we work ?</h2>
                                    <p class="m-t-20 text-dark font-18">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum./p>
                                    
                                </div>
                            </div>


                             <div class="col-md-12 align-self-center m-t-20">
                                <div class="max-box">
                                    <h2 class="title ">Why invest in AEGIS ?</h2>
                                    <p class="m-t-20 text-dark font-18">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    
                                </div>
                            </div>


                            

                        </div>

                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Feature 26 -->
                <!-- ============================================================== -->

                <div class="contact4 mini-spacer" style="margin-top: 140px;background: rgba(0, 173, 10, 0.7);">
                    <!-- Row  -->
                    <div class="row">
                        <div class="container">
                            <div class="col-lg-6 contact-box">
                                <div class="aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200"> 
                                    <h1 class="title font-bold text-white m-t-10">Contact Us</h1>
                                    <form class="m-t-30 aos-init aos-animate" method="POST" action="/send-mail" data-aos="fade-left" data-aos-duration="1200">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group m-t-15">
                                                    <input class="form-control" name="name" type="text" placeholder="name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group m-t-15">
                                                    <input class="form-control" name="email" type="email" placeholder="email address">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group m-t-15">
                                                    <textarea class="form-control" name="message" rows="3" placeholder="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex no-block m-t-20">
                                                <button type="submit" class="btn bg-white text-inverse">Submit</span></button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 right-image p-r-0 hidden-md-down"> 
                        
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113911.06895074832!2d80.87247304382487!3d26.84882791060741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C+Uttar+Pradesh!5e0!3m2!1sen!2sin!4v1518373507146" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen="" data-aos="fade-left" data-aos-duration="3000" class="aos-init aos-animate"></iframe>
                        </div>    
                    </div>
                </div>


            </div>
               



@endsection