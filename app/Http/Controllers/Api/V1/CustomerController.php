<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\Customer\AssignCustomerCodeRequest;
use App\Http\Requests\Api\V1\Customer\ResetCustomerCodeRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Models\V1\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Customer\StoreCustomerRequest;
use App\Http\Requests\Api\V1\Customer\StoreCustomerMembershipAttendanceRequest;
use App\Http\Resources\V1\CustomerActiveSubscription;
use App\Http\Resources\V1\GeneralSingleErrorResource;
use App\Http\Resources\V1\GeneralSingleResource;
use App\Models\V1\CustomerAuth;
use Illuminate\Http\Request;
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

    public function markAttendance(StoreCustomerMembershipAttendanceRequest $request, $id){

        // $customer = Customer::find($id);
        // if(!$customer){
        //     return new GeneralSingleErrorResource(["error" => "No User Found"]);
        // }

        dd($request->user());


    }

    public function assignPassCode(AssignCustomerCodeRequest $request, $id){

        $customer = Customer::find($id);
        if(!$customer){
            return new GeneralSingleErrorResource(["error" => "No User Found"]);
        }

        $code = $request->code;

        $customer->tokens()->delete();

        if( count($customer->tokens) > 0 ){
            return new GeneralSingleErrorResource(["error" => "Token Already Exists"]);
        }

        $auth = new CustomerAuth;

        $auth->customer_id = $customer->id;
        $auth->code = $code;

        $auth->save();

        $token     = $customer->createToken('auth-token')->plainTextToken;

        return new GeneralSingleResource(["token" => $token]);
    }

    // Reset password
    // Delete all tokens issue a new one
    public function resetPassCode(ResetCustomerCodeRequest $request, $id){
        $customer = Customer::find($id);
        if(!$customer){
            return new GeneralSingleErrorResource(["error" => "No User Found  w"]);
        }
        $code = $request->code;


        $customer->tokens()->delete();

        $auth = CustomerAuth::where(["customer_id" => $id , "code" => $request->prev_code])->first();

        if(!$auth)
            return new GeneralSingleErrorResource(["error" => "No User Found"]);


        $auth->code = $request->new_code;
        $auth->save();

        $token     = $customer->createToken('auth-token')->plainTextToken;

        return new GeneralSingleResource(["token" => $token]);
    }

    public function store(StoreCustomerRequest $request)
    {

        // all() but it is validated and merged
        // Observer adding 1 month by default
        $customer  = Customer::create($request->all());

        // $token     = $customer->createToken('auth-token')->plainTextToken;
        // >additional([
        //     'token' => $token
        // ]

        return (new CustomerResource($customer));
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
