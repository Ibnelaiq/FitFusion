<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\V1\CustomerMemberships;
use App\Http\Requests\StoreCustomerMembershipsRequest;
use App\Http\Requests\UpdateCustomerMembershipsRequest;

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
        //
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
