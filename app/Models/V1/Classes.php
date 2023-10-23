<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","duration", "description", "price"];
    public function timings(){
        return $this->hasMany(ClassesTimings::class);
    }
}
