<?php

namespace App\Repositories;

use App\Mail\CodeAssignedNewMembership;
use App\Mail\CodeAssignedNewMembershipMail;
use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class CustomerAuthRepository
{
    // public function confirmPaymentAndAssignPassCode(Customer $customer, string $passCode, string $email) : bool {


    //     try{


    //         $customer->update([
    //             "email" => $email
    //         ]);

    //         if(!$customer->auth){

    //             $auth = new CustomerAuth;
    //             $auth->customer_id = $customer->id;
    //             $auth->code        = $passCode;

    //             $auth->save();


    //             return true;
    //         }

    //         $customer->auth->code = $passCode;
    //         $customer->auth->save();

    //         $this->SendCodeViaEmail($email, $passCode);
    //         return true;
    //     } catch (\Exception $e) {
    //         return false;
    //     }

    // }

    public function SendCodeViaEmail(Customer $customer) : ?SentMessage {

    try{

        return Mail::to($customer)->send(new CodeAssignedNewMembershipMail($customer));

    }catch(\Exception $e){

        dd($e->getMessage());
    }
    }
}
