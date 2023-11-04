<?php

namespace App\Repositories;

use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class CustomerAuthRepository
{
    public function confirmPaymentAndAssignPassCode(Customer $customer, string $passCode, string $email) : bool {


        try{


            $customer->update([
                "email" => $email
            ]);

            if(!$customer->auth){

                $auth = new CustomerAuth;
                $auth->customer_id = $customer->id;
                $auth->code        = $passCode;

                $auth->save();


                return true;
            }

            $customer->auth->code = $passCode;
            $customer->auth->save();

            $this->SendCodeViaEmail($email, $passCode);
            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    public function SendCodeViaEmail(string $email, string $passCode) : SentMessage {

    try{

        $res = Mail::raw('Hi user, your login code is: '. $passCode, function ($message) use ($email) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->to($email, 'Ahmed Ali');
        });


        return $res;

        }catch(\Exception $e){

            return false;
        }
    }
}
