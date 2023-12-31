<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassesTimings extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function slot(){
        return $this->hasOne(ClassesSlots::class, 'id', 'classes_slots_id');

    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'classes_id', 'id');
    }
}
