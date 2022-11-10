<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function success()
    {
        return view('kalaadar.payment_success');
    }
    //
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('kalaadar.stripe');
    }
    
    public function checkout()
    {
        $email = Auth::user()->email;
        $stripe = new \Stripe\StripeClient('sk_test_51M2AJsA1RBAP0jcaXCP0fL5Puyij7JuNnSgxmCXSW8FwF7uXXeGy9073gHmxm1JR1d1NEEH5EphXZMzYgXtwDXUy00z7amQNys');

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
            ],
            'quantity' => 1,
        ]],
        "customer_email" => $email,
        'mode' => 'payment',
        'success_url' => 'https://kalaadar.test/success',
        'cancel_url' => 'https://kalaadar.test/cancel',
        ]);

        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Customer::create(array(
                "address" => [
                    "line1" => "Virani Chowk",
                    "postal_code" => "390008",
                    "city" => "Vadodara",
                    "state" => "GJ",
                    "country" => "IN",
                ],
                "email" => "demo@gmail.com",
                "name" => "Nitin Pujari",
                "source" => $request->stripeToken
            ));
        Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Test payment from LaravelTus.com.",
                "shipping" => [
                    "name" => "Jenny Rosen",
                    "address" => [
                        "line1" => "510 Townsend St",
                        "postal_code" => "98140",
                        "city" => "San Francisco",
                        "state" => "CA",
                        "country" => "US",
                    ],
                ]
        ]); 
        Session::flash('success', 'Payment successful!');
        return back();
    }
}