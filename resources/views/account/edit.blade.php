@extends('layouts.master')


@section('content')

    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
      <div class="container pt-120 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">My Account</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li class="active">My Account</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
      
    <!-- Section: Doctor Details -->
    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
              <form name="editprofile-form" method="post" action="/account/update">
                {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="fa fa-user"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">Edit Profile</h4>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" value="{{ old('name') ?: auth()->user()->name }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input name="email" class="form-control" type="email" value="{{ old('email') ?: auth()->user()->email }}">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">Update Details</button>
                </div>
              </form>
              
              <hr class="mt-70 mb-70">

              <form name="editprofile-form" method="post" action="/account/password/update">
                {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                    <i class="fa fa-key"></i>
                  </a>
                  <h4 class="text-gray pt-10 mt-0 mb-30">Change Password</h4>
                </div>
                <hr>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Choose Password</label>
                    <input name="password" class="form-control" type="password">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Re-enter Password</label>
                    <input name="password_confirmation"  class="form-control" type="password">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label>Old Password</label>
                    <input name="old_password" class="form-control" type="password">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-lg mt-15" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

 @endsection   