@extends('layouts.auth-master')

@section('content')
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="../plugins/images/admin-logo.png"></a>
            <div class="lg-content">
                <h2>THE ULTIMATE &amp; MULTIPURPOSE ADMIN TEMPLATE OF 2017</h2>
                <p class="text-muted">with this admin you can get 2000+ pages, 500+ ui component, 2000+ icons, different demos and many more... </p>
                <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> </a>
            </div>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <!-- <h3 class="box-title m-b-0">Password Recovery</h3> -->

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                    <h3>Recover Password</h3>
                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                    <input type="text" required="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Email">
                    </div>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't want to change password? <a href="/login" class="text-danger m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
     </div>  
</section>
@endsection
