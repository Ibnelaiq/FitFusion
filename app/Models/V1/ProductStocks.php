<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStocks extends Model
{
    protected $fillable = [
        "products_id",
        "quantity"
    ];
    use HasFactory;
}
