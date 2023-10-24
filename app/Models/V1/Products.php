<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "name",
        "description",
        "image_url"
    ];


    public function stock(){
        return $this->hasMany(ProductStocks::class, 'products_id', 'id')
        ->selectRaw('sum(quantity) as total_quantity')
        ->groupBy('products_id')
        ->value('total_quantity');
    }
    use HasFactory;
}
