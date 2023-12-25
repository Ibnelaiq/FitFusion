<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CopuonsPolicy extends Model
{
    protected $table = "coupon_policy";
    protected $guarded = [];


    const SINGLUAR_USE_TYPE = 11;
    const MULTIPLE_USE_TYPE = 12;
    const UNLIMITED_USE_TYPE = 13;



    use SoftDeletes;
    use HasFactory;

    public function use_type(){
        return ($this->use_type == $this->SINGLUAR_USE_TYPE ? "Single" : ($this->MULTIPLE_USE_TYPE ? "Multiple" : "Unlimited"));
    }
}
