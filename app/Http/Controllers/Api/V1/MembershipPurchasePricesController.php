<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\MembershipPurchasePriceSetRequest;
use App\Models\V1\MembershipPurchasePrices;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipPurchasePricesRequest;
use App\Http\Requests\UpdateMembershipPurchasePricesRequest;
use App\Repositories\CustomerMembershipRepository;
use Illuminate\Http\Request;

class MembershipPurchasePricesController extends Controller
{
    protected $customerMembershipRepository;
    protected $customerAuthRepository;

    public function __construct(CustomerMembershipRepository $customerMembershipRepository)
    {
        $this->customerMembershipRepository = $customerMembershipRepository;
    }

    public function getPrice($days){

        $data = MembershipPurchasePrices::where(["duration_in_days" => $days])->first();

        if(!$data)
            return response()->json(null,  404);

        $response = [
            "data"  => $data
        ];

        return response()->json($response,  200);
    }

    public function setPrice(MembershipPurchasePriceSetRequest $request){


        if($request->get("selected_price_id") != 0){
            //Create Sale here add customer membership addition also
            return response()->json(200);
        }

        MembershipPurchasePrices::create([
            "duration_in_days" => $request->get("duration"),
            "price" => $request->get("selected_price"),
            "status" => 1
        ]);

        return response()->json(200);
    }
}
