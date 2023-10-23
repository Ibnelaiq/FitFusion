<?php

namespace App\Repositories;

use App\Models\V1\Customer;
use App\Models\V1\CustomerAuth;

class CustomerAuthRepository
{
    public function confirmPaymentAndAssignPassCode(Customer $customer, string $passCode) : bool {

        try{
            if(!$customer->auth){
                $auth = new CustomerAuth;
                $auth->customer_id = $customer->id;
                $auth->code        = $passCode;

                return true;
            }

            $customer->auth->code = $passCode;
            $customer->auth->save();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}
