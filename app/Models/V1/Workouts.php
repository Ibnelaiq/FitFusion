<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workouts extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function activatedMuscles(){
        return $this->hasMany(WorkoutActivatedMuscles::class);
    }


}
