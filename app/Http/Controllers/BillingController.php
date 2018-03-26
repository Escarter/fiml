<?php

namespace App\Http\Controllers;

/**
 * BillingConttoller.
 */
class BillingController extends Controller
{
    /**
     * Shows the Pricing page.
     */
    public function index()
    {
        //display Billing page

        return view('users.billing.pricing');
    }

    /**
     * Shows the checkout page based on the plan selected.
     *
     * @param [string] $plan_id
     */
    public function chart($plan_id)
    {
        // search for the plan by Id

        //Redirect to the chart page with the apprioprate plan

        return view('users.billing.chart-page');
    }
}
