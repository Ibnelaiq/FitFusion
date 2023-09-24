<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Customer\StoreCustomerMembershipsRequest;
use App\Http\Resources\V1\CustomerActiveSubscription;
use App\Models\V1\CustomerMemberships;
use Carbon\Carbon;
use Illuminate\Http\Request;



class CustomerMembershipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerMembershipsRequest $request)
    {
        if($request->user()->activeSubscription){

            $request->user()->extendActiveMembership($request->duration);

            return new CustomerActiveSubscription($request->user()->activeSubscription);

        }else{
            CustomerMemberships::create([
                'customer_id' => $request->user()->id,
                'expiry_date' => Carbon::today()->addDays($request->duration),
                'status'      => 1,
            ]);

            return new CustomerActiveSubscription($request->user()->activeSubscription);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerMemberships $customerMemberships)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerMemberships $customerMemberships)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerMembershipsRequest $request, CustomerMemberships $customerMemberships)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerMemberships $customerMemberships)
    {
        //
    }
}
