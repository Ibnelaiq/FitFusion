<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupons extends Model
{
    const FLAT_DISCOUNT_TYPE = 21;
    const PERCENTAGE_DISCOUNT_TYPE = 22;
    protected $fillable = [
        "code", "discount_type", "discount_amount", "status", "start_date", "end_date"
    ];
    use SoftDeletes;
    use HasFactory;

    public function policy(){
        return $this->HasOne(CopuonsPolicy::class);
    }

    public function discount_type(){
        return $this->discount_type == $this->FLAT_DISCOUNT_TYPE ? "Flat Discount" : "Percentage Discount";
    }
    public function usage_detail(){
        $data = "";

        $data .= "<p class='m-0 text-sm'>". "<span class='font-bold'>Usage: </span> " . $this->policy->use_type() . "\n" . "</p>";
        $data .= "<p class='m-0 text-sm'>". "<span class='font-bold'>Valid From: </span> ". $this->start_date . "\n" . "</p>";
        $data .= "<p class='m-0 text-sm'>". "<span class='font-bold'>Valid Until: </span> ". ($this->end_date == null ? " No Range <small class'text-muted'> (Unlimited) </small>" : $this->end_date ) . "\n" . "</p>";
        $data .= "<p class='m-0 text-sm'>". "<span class='font-bold'>Uses Left: </span> ". ($this->policy->max_uses == 0 ? "<span class='text-danger'> None </span>" : $this->policy->max_uses ). "\n" . "</p>";
        $data .= "<p class='m-0 text-sm'>". "<span class='font-bold'>User Specific: </span> ". ($this->policy->user_specific == null ? "<span class='text-danger'> No </span>" : $this->policy->user_specific) . "\n" . "</p>";

        return $data;

    }



}
