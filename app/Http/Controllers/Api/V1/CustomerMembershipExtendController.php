<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class CustomerMembershipExtendController extends Controller
{
    public function capturePayment(Request $request){

        $amount = intval($request->input("amount")) * 100;

        $stripe = new StripeClient("sk_test_51KFd7HHjhOs2YctLJjPWRMLLEPI9bFcAWnhy8WGBfNnpJhY2jNMKQS62xznqdHeeGWACqBgUceKIAIwlSJGQgoOv00ELTk8nFR");


        $intent = $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => $request->input("currency")
        ]);

        return response()->json([ "secret" => $intent->client_secret]);

    }

}
