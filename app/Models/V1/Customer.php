<?php

namespace App\Models\V1;

use App\Traits\KeyTransformable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use OpenApi\Attributes as OAT;

/**
 * @OA\Schema()
 */
class Customer extends Model
{
    use HasFactory, SoftDeletes, HasApiTokens;


    protected $fillable = [
        "name",
        "surname",
        "phone_number",
        "passport_or_id",
        "birth_date",
        "gender",
    ];

}

