<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\CustomerResource;
use App\Models\V1\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Customer\StoreCustomerRequest;
use App\Http\Resources\V1\CustomerActiveSubscription;
use OpenApi\Attributes as OA;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new CustomerResource(Customer::all()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(StoreCustomerRequest $request)
    {

        // all() but it is validated and merged
        $customer  = Customer::create($request->all());

        $token     = $customer->createToken('auth-token')->plainTextToken;

        return (new CustomerResource($customer))->additional([
            'token' => $token,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
