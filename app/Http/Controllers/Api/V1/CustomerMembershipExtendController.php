<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaptureExtendPaymentRequest;
use App\Models\V1\CustomerMembershipExtendPrices;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;

class CustomerMembershipExtendController extends Controller
{
    public function capturePayment(CaptureExtendPaymentRequest $request){

        $extend = CustomerMembershipExtendPrices::where(["id" => $request->get("extend_id")])->first();

        if(!$extend)
            return response("",404);


        $stripe = new StripeClient(env("STRIPE_SECRET_KEY"));


        $intent = $stripe->paymentIntents->create([
            'amount' => $extend->price,
            'currency' => "usd"
        ]);

        return response()->json([ "secret" => $intent->client_secret, "price" => $extend->price]);

    }

    public function extendPrices(){
        $prices = CustomerMembershipExtendPrices::where([
            "status" => CustomerMembershipExtendPrices::STATUS_ACTIVE,
        ])->get();
        return new \App\Http\Resources\V1\CustomerMembershipExtendPurchasePrices($prices);
    }

}
