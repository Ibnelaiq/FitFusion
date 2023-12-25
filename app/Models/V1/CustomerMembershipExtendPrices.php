<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerMembershipExtendPrices extends Model
{

    use HasFactory;
    use SoftDeletes;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    protected $guarded = [];
    protected $table = "membership_extend_prices";

}
