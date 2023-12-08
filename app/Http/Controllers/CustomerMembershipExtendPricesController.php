<?php

namespace App\Http\Controllers;

use App\Models\V1\CustomerMembershipExtendPrices;
use App\Http\Requests\StoreCustomerMembershipExtendPricesRequest;
use App\Http\Requests\UpdateCustomerMembershipExtendPricesRequest;

class CustomerMembershipExtendPricesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = CustomerMembershipExtendPrices::all();
        return view('dashboard.extendPrices.index', compact('prices'));
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
    public function store(StoreCustomerMembershipExtendPricesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerMembershipExtendPrices $customerMembershipExtendPrices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerMembershipExtendPrices $customerMembershipExtendPrices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerMembershipExtendPricesRequest $request, CustomerMembershipExtendPrices $customerMembershipExtendPrices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerMembershipExtendPrices $customerMembershipExtendPrices)
    {
        //
    }
}
