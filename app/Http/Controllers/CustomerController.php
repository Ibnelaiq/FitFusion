<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assign5DigitCodeCustomerRequest;
use App\Http\Requests\CreateNewMembershipRequest;
use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;
use App\Repositories\CustomerAuthRepository;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerAuthRepository;

    public function __construct(CustomerAuthRepository $customerAuthRepository)
    {
        $this->customerAuthRepository = $customerAuthRepository;
    }


    public function searchPayment(Request $request){

        $searchQuery = $request->input('search');
        $customers = [];

        if($searchQuery){
           $customers =Customer::where('name', 'like', "%$searchQuery%")->get();
        }


        return view('dashboard.customer.payment.search', ['customers' => $customers]);

    }

    public function customerPayment(Customer $customer){
        return view("dashboard.customer.payment.payment" , compact("customer"));
    }

    public function searchDetails(Request $request){

        $phoneQuery = $request->input('phone_number');
        $birthDateQuery = $request->input('birth_date');
        $nameQuery = $request->input('name');
        $surnameQuery = $request->input('surname');
        $passportOrIdQuery = $request->input('passport_or_id');

        $customers = Customer::query();

        if ($nameQuery) {
            $customers->where('name', 'like', "%$nameQuery%");
        }

        if ($surnameQuery) {
            $customers->where('surname', 'like', "%$surnameQuery%");
        }

        if ($phoneQuery) {
            $customers->where('phone_number', 'like', "%$phoneQuery%");
        }

        if ($birthDateQuery) {
            $customers->where('birth_date', 'like', "%$birthDateQuery%");
        }

        if ($passportOrIdQuery) {
            $customers->where('passport_or_id', 'like', "%$passportOrIdQuery%");
        }

        if ($nameQuery || $surnameQuery || $phoneQuery || $birthDateQuery || $passportOrIdQuery) {
            $results = $customers->get();
        } else {
            // No search criteria provided, return an empty result
            $results = [];
        }

        return view('dashboard.customer.details.search', ['customers' => $results]);
    }

    public function details(Customer $customer){
        return view("dashboard.customer.details.details", compact("customer"));
    }
    public function subscription(Customer $customer){
        $memberships = $customer->memberships;

        return view("dashboard.customer.subscription.details", compact("memberships"));
    }

    public function customerPaymentAssignCode(Assign5DigitCodeCustomerRequest $request,Customer $customer){


        $res = $this->customerAuthRepository->confirmPaymentAndAssignPassCode($customer,$request->code);

        if($res){
            return redirect()->route('dashboard')->with('successMessage', "Code Set Successfully");
        }

        return redirect()->route('dashboard')->with('errorMessage', "Unknown Error Occured");
    }



}
