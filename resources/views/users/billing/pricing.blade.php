@extends('layouts.master')

@section('content')
<div class="row mb-5 pb-5 clearfix">
    <div class="col-md-12">
        <h2>Choose your plan</h2>
        <div class="card">
            <div class="card-price-list mt-5">
                <div class="pricing-plan">
                    <img src="https://s22.postimg.org/8mv5gn7w1/paper-plane.png" alt="" class="pricing-img">
                    <h2 class="pricing-header">Personal</h2>
                    <ul class="pricing-features">
                        <li class="pricing-features-item">Custom domains</li>
                        <li class="pricing-features-item">Sleeps after 30 mins of inactivity</li>
                    </ul>
                    <span class="pricing-price">Free</span>
                    <a href="/users/chart/1" class="btn btn-outline-primary">Sign up</a>
                </div>
                <div class="pricing-plan">
                    <img src="https://s28.postimg.org/ju5bnc3x9/plane.png" alt="" class="pricing-img">
                    <h2 class="pricing-header">Small team</h2>
                    <ul class="pricing-features">
                        <li class="pricing-features-item">Never sleeps</li>
                        <li class="pricing-features-item">Multiple workers for more powerful apps</li>
                    </ul>
                    <span class="pricing-price">$150</span>
                    <a href="/users/chart/1" class="btn btn-primary">Free trial</a>
                </div>
                <div class="pricing-plan">
                    <img src="https://s21.postimg.org/tpm0cge4n/space-ship.png" alt="" class="pricing-img">
                    <h2 class="pricing-header">Enterprise</h2>
                    <ul class="pricing-features">
                        <li class="pricing-features-item">Dedicated</li>
                        <li class="pricing-features-item">Simple horizontal scalability</li>
                    </ul>
                    <span class="pricing-price">$400</span>
                    <a href="/users/chart/1" class="btn btn-outline-primary">Free trial</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

