@extends('layouts.auth-master')

@section('content')
<div class="container-fluid">
		<div class="row">
			<div class="right-column sisu">
				<div class="row mx-0">
					<div class="col-md-7 order-md-2 signin-right-column px-5 bg-dark">
						<a class="signin-logo d-sm-block d-md-none" href="#">
							<img src="assets/img/logo-white.png" width="145" height="32.3" alt="QuillPro">
						</a>
						<h1 class="display-4">Sign Up For An Account Today</h1>
						<p class="lead mb-5">
							Big data latte SpaceTeam unicorn cortado hacker physical computing paradigm.
						</p>
					</div>
					<div class="col-md-5 order-md-1 signin-left-column bg-white px-5">
						<a class="signin-logo d-sm-none d-md-block" href="#">
							<img src="assets/img/logo-dark.png" width="145" height="32.3" alt="QuillPro">
						</a>
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
                                        <option value="0">Select gender</option>
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
                                    <input class="form-control datepicker" type="text"  name="dob" value="{{ old('dob') }}" required="" placeholder="Date of Birth"> 
                                    @if ($errors->has('dob'))
                                        <span class="help-block with-errors" >
                                            <p class="text-danger" >{{ $errors->first('dob') }}</p>
                                        </span>
                                    @endif
                                </div> 
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12 col-xs-12">
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
                            <hr>
                            <p class="text-center">
                                Already have an account? <a href="/login" class="text-primary m-l-5"><b>Sign In</b></a>
                            </p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
