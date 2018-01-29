
@extends('layouts.auth')


@section('css')

<style type="text/css">
  html { height: 100%; }
</style>

@endsection

@section('content')
<section style="height: 83vh;padding-bottom: 0px;margin-bottom: 0px;">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading bg-theme-colored2 text-white">Reset your password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-theme-colored btn-flat">
                                    Send Password Reset Link
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

<br clear="visible-xs"> <br class="visible-xs"><br clear="visible-xs"> <br class="visible-xs">

 

@endsection

