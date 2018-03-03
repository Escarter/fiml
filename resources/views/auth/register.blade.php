@extends('layouts.auth-master')

@section('content')
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="../plugins/images/admin-logo.png"></a>
            <div class="lg-content">
                <h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
                <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p> <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> </div>
        </div>
    </div>
    <div class="new-login-box" style="margin-top:3%;">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign In to FIML</h3> 
            <small>Enter your details below</small>
            @foreach ($errors->all() as $message)
                <p>{{$message}}</p>
            @endforeach
            <form class="form-horizontal new-lg-form" id="loginform" method="POST" action="{{ route('register') }}">
               @csrf
                <div class="form-group row">
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="text"  name="first_name" value="{{ old('first_name') }}" required="" placeholder="First Name" autofocus> 
                        @if ($errors->has('first_name'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('first_name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="text"  name="last_name"  value="{{ old('last_name') }}" required="" placeholder="Last Name"> 
                        @if ($errors->has('last_name'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('last_name') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="text"  name="location" value="{{ old('location') }}" required="" placeholder="Country"> 
                        @if ($errors->has('location'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('location') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="text"  name="phone" value="{{ old('phone') }}" required="" placeholder="Phone"> 
                        @if ($errors->has('phone'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-6 col-xs-12">
                        <select name="sex" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @if ($errors->has('sex'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('sex') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="email"  name="email" value="{{ old('email') }}" required="" placeholder="Email Address"> 
                        @if ($errors->has('email'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="password"  name="password" required="" placeholder="Password"> 
                        @if ($errors->has('password'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('password') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <input class="form-control" type="password"  name="password_confirmation" required="" placeholder="Confirm Password"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="/login" class="text-danger m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
