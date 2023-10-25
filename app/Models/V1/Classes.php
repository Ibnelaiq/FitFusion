<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "name","duration", "description", "price", "rating", "image_url"];
    public function timings(){
        return $this->hasMany(ClassesTimings::class);
    }
}
