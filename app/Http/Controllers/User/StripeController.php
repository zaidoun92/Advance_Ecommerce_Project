<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    //

    public function StripeOrder(Request $request) {

        \Stripe\Stripe::setApiKey('sk_test_51IIvICIfKjqdaZDVtB2ECfQWgpBWWeNvVGIKV8vkekNqU6trqjIoPN0fxlpSHmlInG993l3FBLyGwZgbBbTdk0VL00qnXZmxFG');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Easy Online Store',
            'source' => $token,
            'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);

    }
}
