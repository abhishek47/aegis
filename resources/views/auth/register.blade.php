@extends('layouts.master')

@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading bg-theme-colored2 text-white">Create New Account</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-theme-colored btn-flat">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


    <!-- Divider: Features -->
    <section class="divider bg-silver-deep">
      <div class="container pt-50 pb-60">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/online.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Online Courses</h3>
                <p>Enroll into our curated courses</p>
                <a href="/courses" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/book.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Wiki of the Day</h3>
                <p>Read our daily wiki pages to sharpen your knowledge</p>
                <a href="/wiki" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="feature-box text-center">
              <div class="feature-icon">
                <img src="images/icons/graduate.png" alt="">
              </div>
              <div class="feature-title">
                <h3>Offline Courses</h3>
                <p>Join our institute for more effective learning.</p>
                <a href="/about" class="read-more font-roboto-slab text-theme-colored2">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
