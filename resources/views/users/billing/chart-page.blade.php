@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Cart - Confirm and Proceed</h1>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-8 mb-5">
        <div class="card">
            <div class="card-header">
                Your selected Plan details
            </div>
            <div class="card-table table-responsive">
                <table class="table table-hover table-sm align-middle">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product Name</th>
                            <th class="text-center">Actions</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="profile-picture bg-gradient bg-primary d-flex mr-3">
                                        <img src="assets/img/profile-pic.jpg" width="44" height="44">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                    Converse Allstar Sneakers
                                </a>
                                <div>
                                    <small class="boldness-light">Color: Red; Size: 9;</small>
                                </div>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-secondary waves-effect waves-light" type="button" data-toggle="tooltip" data-original-title="Delete Item">
                                    <i class="batch-icon batch-icon-bin-alt-2"></i>
                                </button>
                            </td>
                            <td class="text-right">
                                $99
                            </td>
                            <td class="text-right">
                                $297
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body pt-0">
                <div class="float-left">
                    <a href="/users/pricing" class="btn btn-link">
                        <i class="batch-icon batch-icon-arrow-left"></i>
                        Return to pricing
                    </a>
              {{--  <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#coupon-code-block" aria-expanded="false" aria-controls="coupon-code-block">
                        Add Coupon
                    </button>
                    <div class="collapse" id="coupon-code-block">
                        <div class="my-2 no-waves-effect">
                            <div class="input-group">
                                <input type="text" class="form-control text-right" placeholder="Enter Your Coupon Code..." aria-label="Enter Your Coupon Code..." aria-describedby="add-coupon">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary waves-effect waves-light" type="button" data-toggle="tooltip" data-original-title="Delete Item">
                                        <i class="batch-icon batch-icon-add"></i> 
                                        Add Coupon
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                </div>
                <div class="float-right">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Your Total
            </div>
            <div class="card-table table-responsive">
                <table class="table table-hover align-middle">
                    <tbody>
                        <tr>
                            <td class="text-right">
                                <strong>Sub-Total:</strong>
                            </td>
                            <td class="text-right">$571</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <strong>Sales Tax (5%):</strong>
                            </td>
                            <td class="text-right">$28.55</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <strong>Total:</strong>
                            </td>
                            <td class="text-right">
                                <strong>$599.55</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body text-center  pt-0">
                    <a class="text-center" href="https://www.skrill.com/en/merchants/brand-centre/" target="_blank">
                        <img src="https://www.skrill.com/fileadmin/content/images/brand_centre/Pay_by_Skrill/skrill-payby-btn-purple_245x75.jpg" alt="Pay by Skrill Button 245x75 JPG" title="Use the Skrill Digital Wallet for all your online transactions.">
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
