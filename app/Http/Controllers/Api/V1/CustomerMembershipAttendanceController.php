<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GeneralSingleErrorResource;
use App\Http\Resources\V1\GeneralSingleResource;
use App\Models\V1\CustomerMembershipAttendance;
use App\Http\Requests\Api\V1\Customer\StoreCustomerMembershipAttendanceRequest;
use App\Http\Requests\UpdateCustomerMembershipAttendanceRequest;

class CustomerMembershipAttendanceController extends Controller
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
    public function store(StoreCustomerMembershipAttendanceRequest $request, $id)
    {
        $customer = $request->user();

        if($id != $customer->id){
            return new GeneralSingleErrorResource(["error" => "Invalid User ID"]);
        }

        if($customer->activeSubscription->todaysAttendance){
            return new GeneralSingleErrorResource(["error" => "Attendance Marked Before"]);
        }


        $attendance = new CustomerMembershipAttendance;
        $attendance->status = 1;
        $attendance->customer_membership_id = $customer->activeSubscription->id;

        return new GeneralSingleResource(["message" => "Attendance marked"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerMembershipAttendance $customerMembershipAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerMembershipAttendance $customerMembershipAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerMembershipAttendanceRequest $request, CustomerMembershipAttendance $customerMembershipAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerMembershipAttendance $customerMembershipAttendance)
    {
        //
    }
}
