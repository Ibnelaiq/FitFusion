<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassesSlots extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        "start",
        "end"
    ];
    public function timings()
    {
        return $this->hasMany(ClassesTimings::class, 'classes_slots_id', 'id');
    }
}
