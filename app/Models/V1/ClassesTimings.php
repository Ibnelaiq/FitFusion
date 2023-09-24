<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesTimings extends Model
{
    use HasFactory;
    public function slot(){
        return $this->hasOne(ClassesSlots::class, 'id', 'classes_slots_id');

    }
}
