<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewMembershipRequest;
use App\Http\Requests\CustomerMembershipExtendRequest;
use App\Http\Requests\PauseCustomerMembershipRequest;
use App\Models\V1\Customer;
use App\Models\V1\CustomerMemberships;
use App\Repositories\CustomerMembershipRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerMembershipController extends Controller
{

    protected $customerMembershipRepository;

    public function __construct(CustomerMembershipRepository $customerMembershipRepository)
    {
        $this->customerMembershipRepository = $customerMembershipRepository;
    }

    public function extend(CustomerMemberships $membership){
        return view("dashboard.customer.subscription.extend", compact("membership"));
    }

    public function extendMembership(CustomerMemberships $membership, CustomerMembershipExtendRequest $request){
        try{
            $this->customerMembershipRepository->extendMembership($membership, $request->days_to_extend);
            return redirect()->route('dashboard')->with('successMessage', "Membership Extend Successfully! Enjoy");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }
    }

    public function cancel(CustomerMemberships $membership){

        return view("dashboard.customer.subscription.cancel", compact("membership"));
    }

    public function cancelMembership(CustomerMemberships $membership){
        try{
            $this->customerMembershipRepository->cancelMembership($membership);
            return redirect()->route('dashboard')->with('successMessage', "Membership Cancelled Successfully");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }
    }

    public function pause(CustomerMemberships $membership){

        $membership->expiry_date = Carbon::createFromFormat('Y-m-d', $membership->expiry_date);

        return view("dashboard.customer.subscription.pause", compact("membership"));

    }

    public function pauseMembership(PauseCustomerMembershipRequest $request, CustomerMemberships $membership){


        try{
            $this->customerMembershipRepository->pauseMembership($membership,$request->pause_date, $request->reason);
            return redirect()->route('dashboard')->with('successMessage', "Membership Paused Action Added Successfully");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }
    }

    public function create(Customer $customer){
        return view("dashboard.customer.subscription.create", compact("customer"));
    }
    public function createMembership(Customer $customer, CreateNewMembershipRequest $request){

        if($customer->activeSubscription){
            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }

        try{
            $this->customerMembershipRepository->createMembership($customer,$request->membership_duration);
            return redirect()->route('dashboard')->with('successMessage', "Membership Paused Action Added Successfully");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }

    }


}
