@extends('layouts.auth-master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="right-column sisu">
            <div class="row mx-0">
                <div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark">
                    <a class="signin-logo d-sm-block d-md-none" href="#">
                        <img src="img/logo-white.png" width="145" height="32.3" alt="QuillPro">
                    </a>
                    <h1 class="display-4">Sign In To get Started</h1>
                    <p class="lead mb-5">
                        Big data latte SpaceTeam unicorn cortado hacker physical computing paradigm.
                    </p>
                </div>
                <div class="col-md-5 order-md-1 signin-left-column bg-white px-5">
                    <a class="signin-logo d-sm-none d-md-block" href="#">
                        <img src="img/logo-dark.png" width="145" height="32.3" alt="QuillPro">
                    </a>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email" required autofocus>
                            <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
                            @if ($errors->has('email'))
                                <span class="help-block with-errors" >
                                    <p class="text-danger" >{{ $errors->first('email') }}</p>
                                </span>
                            @else
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>                            
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Password" required>
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
                            @if ($errors->has('password'))
                                <span class="help-block with-errors" >
                                    <p class="text-danger" >{{ $errors->first('password') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <!-- <input type="checkbox" class="custom-control-input" id="keep-signed-in"> -->
                            <input type="checkbox" name="remember" id="keep-signed-in" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="keep-signed-in">{{ __('Remember Me') }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-gradient btn-block">
                            <i class="batch-icon batch-icon-key"></i>
                            Sign In
                        </button>
                        <hr>
                        <p class="text-center">
                            Don't have an account? <a href="/register" class="text-primary m-l-5"><b>Sign Up</b></a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection

