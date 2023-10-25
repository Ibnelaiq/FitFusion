<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStocks extends Model
{
    protected $fillable = [
        "products_id",
        "quantity",
        "customer_id"
    ];

    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    use HasFactory;
}
