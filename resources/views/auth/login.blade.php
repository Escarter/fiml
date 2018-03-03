@extends('layouts.auth-master')

@section('content')
<section id="wrapper" class="new-login-register" >
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="{{asset('plugins/images/admin-logo.png')}}"></a>
            <div class="lg-content">
                <h2>THE ULTIMATE & MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
                <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p>
                <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> </a>
            </div>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign In to FIML</h3>
            <small>Enter your details below</small>
            <br>
            <!-- @include('layouts.partials.normal-notifications') -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal new-lg-form" id="loginform" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <input type="text" name="email" placeholder="Email Address" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"  value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block with-errors" >
                                <p class="text-danger" >{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" name="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}"  required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block with-errors" >
                            <p class="text-danger" >{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    <div class="checkbox checkbox-info pull-left p-t-0">
                        <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup"> Remember me </label>
                    </div>
                    <a href="{{ route('password.request')}}"  class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="/register" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>    
        </div>
    </div>  
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.notification').alert()
    });
</script>
@endsection

