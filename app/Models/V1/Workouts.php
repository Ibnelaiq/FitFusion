<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Workouts extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function activatedMuscles(){
        return $this->hasMany(WorkoutActivatedMuscles::class);
    }

    public function activatedMusclesCSV(){
        $csvString = '';
        foreach ($this->activatedMuscles->toArray() as $row) {
            $csvString .= ",".$row["code"];
        }
        return ltrim($csvString, ",");
    }

}
