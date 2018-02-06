@extends('v2.layouts.master')


@section('content')

   
    <!-- Section: Doctor Details -->
    <section class="bg-light mini-spacer" style="min-height: 1000px;">
      <div class="container">
        <div class="section-content">
          <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="card card-shadow">
             <div class="card-body text-dark font-medium">
              <form name="editprofile-form" method="post" action="/account/update">
                {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                 
                  <h4 class="text-gray pt-10 0 font-bold">Edit Profile</h4>
                </div>
                <hr>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Name</label>
                    <input name="name" class="form-control" type="text" value="{{ old('name') ?: auth()->user()->name }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Email</label>
                    <input name="email" readonly="true" class="form-control" type="email" value="{{ old('email') ?: auth()->user()->email }}">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-success " type="submit">Update Details</button>
                </div>
              </form>
              </div>
              </div>

              <div class="card card-shadow">
             <div class="card-body text-dark font-medium">
              <form name="editprofile-form" method="post" action="/account/password/update">
                {{ csrf_field() }}
                <div class="icon-box mb-0 p-0">
                  
                  <h4 class="text-gray pt-10 mt-0 mb-30 font-bold">Change Password</h4>
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
                  <button class="btn btn-dark  " type="submit">Update</button>
                </div>
              </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 @endsection   