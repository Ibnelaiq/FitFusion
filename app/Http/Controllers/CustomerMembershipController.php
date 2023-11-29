<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewMembershipRequest;
use App\Http\Requests\CustomerMembershipExtendRequest;
use App\Http\Requests\PauseCustomerMembershipRequest;
use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;
use App\Models\V1\CustomerMemberships;
use App\Repositories\CustomerAuthRepository;
use App\Repositories\CustomerMembershipRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerMembershipController extends Controller
{

    protected $customerMembershipRepository;
    protected $customerAuthRepository;

    public function __construct(CustomerMembershipRepository $customerMembershipRepository, CustomerAuthRepository $customerAuthRepository)
    {
        $this->customerMembershipRepository = $customerMembershipRepository;
        $this->customerAuthRepository = $customerAuthRepository;
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


        if($customer->pausedSubscription){
            return redirect()->route("customer.subscription", ["customer" => $customer])->with("error","This user has PAUSED membership, Kindly continue or cancel that membership.");
        }
        if($customer->activeSubscription){
            return redirect()->route("customer.subscription", ["customer" => $customer])->with("error","This user already has active membership.");
        }


        return view("dashboard.customer.subscription.create", compact("customer"));
    }
    public function createMembership(Customer $customer, CreateNewMembershipRequest $request){


        // First time
        if(!$customer->email){
            $customer->update(["email"=> $request->email]);
        }

        dd($this->customerAuthRepository->SendCodeViaEmail($customer));

        if($customer->activeSubscription){
            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }

        try{

            if(!$this->customerMembershipRepository->createMembership($customer,$request->membership_duration))
                return;

            $code = rand(pow(10, 5-1), pow(10, 5)-1);

            if($customer->auth){
                $customer->auth->update([
                    "code" => $code
                ]);
            }else{

                $auth = new CustomerAuth;

                $auth->customer_id = $customer->id;
                $auth->code = $code;

                $auth->save();
            }

            $this->customerAuthRepository->SendCodeViaEmail($customer);


            return redirect()->route('dashboard')->with('successMessage', "Membership Paused Action Added Successfully");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
        }

    }

    public function resume(CustomerMemberships $membership){

        if($membership->status != CustomerMemberships::STATUS_PAUSED){
            return redirect()->route("dashboard")->with("error", "Unknown error occured");
        }

        return view("dashboard.customer.subscription.resume", compact("membership"));

    }

    public function resumeMembership(Request $request, CustomerMemberships $membership){


        if($membership->status != CustomerMemberships::STATUS_PAUSED){
            return redirect()->route("dashboard")->with("error", "Unknown error occured");
        }

        try{
            $this->customerMembershipRepository->resumeMembership($membership);
            return redirect()->route('dashboard')->with('successMessage', "Membership UN-Paused Successfully");

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");

        }
    }


}
