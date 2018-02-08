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
                            <h1 class="title p-t-30">Career Opportunities</h1>
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
                        <div class="row wrap-feature-26 p-b-30">
                            <div class="col-md-6 align-self-center">
                                <div class="max-box">
                                    <h2 class="title ">Content Writer</h2>
                                    <p class="m-t-20 text-dark font-18">We are seeking for enthusiasts for Mathematics, Physics, Chemistry, Biology, Computer Science who can write and illustrate the concepts like we do.</p>
                                    <a href="#apply-modal" data-toggle="modal" class="btn btn-primary">Apply Now </a>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-5 ml-auto p-t-20"> <img src="/images/icons/blogging.png" style="width: 160px;" alt="wrapkit" class="img-responsive" /> </div>

                        </div>

                        <hr style="margin-bottom: 0;">

                        <div class="row wrap-feature-26 p-t-30 p-b-30">
                            <div class="col-md-5 p-t-30"> <img class="m-l-40 m-t-10" src="/images/icons/teacher.png" style="width: 240px;" alt="wrapkit" class="img-responsive" /> </div>
                            <div class="col-md-6 ml-auto align-self-center">
                                <h2 class="title ">Online/Offline Teacher</h2>
                                    <p class="m-t-20 text-dark font-18">We are seeking online/offline teachers for Mathematics, Physics, Chemistry, Biology, Computer Science who can teach for Olympiads, JEE/NEET, ISI/CMI(entrance exam), AMC-10, AMC-12, GMAT, SAT.</p><p class="m-t-20 text-dark font-18">For offline positions place in Nashik, Maharashtra, India. We prefer online teaching.</p>
                                    <a href="javascript:void(0)" class="btn btn-primary">Apply Now </a>
                            </div>
                        </div>
                         <hr style="margin-bottom: 0;">
                         <div class="row wrap-feature-26 p-t-30 p-b-30">
                            <div class="col-md-6 align-self-center">
                                <div class="max-box">
                                    <h2 class="title">Software Engineer and Designer</h2>
                                    <p class="m-t-20 text-dark font-18">We are seeking for a software engineer and designer for updation and maintainance of our website.</p>
                                    <a href="javascript:void(0)" class="btn btn-primary">Apply Now </a>
                                </div>
                            </div>
                            <div class="col-md-5 col-md-5 ml-auto p-t-20"> <img src="/images/icons/coder.png" style="width: 160px;" alt="wrapkit" class="img-responsive" /> </div>
                        </div>
                         <hr style="margin-bottom: 0;">
                        <div class="row wrap-feature-26 p-t-30">
                            <div class="col-md-5 p-t-30 p-l-40"> <img class="m-l-40" src="/images/icons/market.png" style="width: 160px;" alt="wrapkit" class="img-responsive" /> </div>
                            <div class="col-md-6 ml-auto align-self-center">
                                <h2 class="title">Sales and Online Marketing</h2>
                                    <p class="m-t-20 text-dark font-18">We require individuals who have a experience in sales and online marketing.</p>
                                    <a href="javascript:void(0)" class="btn btn-primary">Apply Now </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Feature 26 -->
                <!-- ============================================================== -->


                <div id="apply-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;background: rgba(0,0,0,0.7);">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Apply @ AEGIS</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                             <form class="text-dark" method="POST" action="/apply-job" enctype="multipart/form-data">
	                                            <div class="modal-body">
	                                               
	                                                    {{ csrf_field() }}
	                                                    <div class="form-group">
	                                                        <label for="recipient-name" class="control-label">Name:</label>
	                                                        <input type="text" class="form-control" name="name">
	                                                    </div>
	                                                    <div class="form-group">
	                                                        <label for="recipient-name" class="control-label">E-mail Address:</label>
	                                                        <input type="email" class="form-control" name="email">
	                                                    </div>
	                                                    <div class="form-group">
	                                                        <label for="recipient-name" class="control-label">Phone:</label>
	                                                        <input type="number" class="form-control" name="phone">
	                                                    </div>
	                                                    <div class="form-group">
	                                                        <label for="recipient-name" class="control-label">Post:</label>
	                                                        <select class="form-control" name="post">
	                                                        	<option value="Content Writer">Content Writer</option>
	                                                        	<option value="Online/Offline Teacher">Online/Offline Teacher</option>
	                                                        	<option value="Software Engineer">Software Engineer</option>
	                                                        	<option value="Marketing & Sales">Marketing &amp; Sales</option>
	                                                        </select>
	                                                    </div>

	                                                     <div class="form-group">
	                                                        <label for="recipient-name" class="control-label">Resume/CV:</label>
	                                                        <input type="file" class="form-control" name="resume">
	                                                    </div>
	                                                    
	                                               
	                                            </div>
	                                            <div class="modal-footer">
	                                                <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">Close</button>
	                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Send Application</button>
	                                               
	                                            </div>
                                              </form>
                                        </div>
                                    </div>
                                </div>




@endsection