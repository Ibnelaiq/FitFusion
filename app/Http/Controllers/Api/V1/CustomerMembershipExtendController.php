<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class CustomerMembershipExtendController extends Controller
{
    public function capturePayment(Request $request){
        $stripe = new StripeClient("sk_test_51KFd7HHjhOs2YctLJjPWRMLLEPI9bFcAWnhy8WGBfNnpJhY2jNMKQS62xznqdHeeGWACqBgUceKIAIwlSJGQgoOv00ELTk8nFR");


        $intent = $stripe->paymentIntents->create([
            'amount' => 1000,
            'currency' => 'usd',

        ]);

        // $stripe->paymentIntents->confirm(
        //     $intent->client_secret,
        //     [
        //         'payment_method' => $method->id,
        //     ]
        // );

        return response()->json($intent);

    }

}
