<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackWorkout_Workouts extends Model
{
    protected $table = "track_workout_workouts";
    protected $guarded = [];

    use HasFactory;

    public function workout(){
        return $this->hasOne(Workouts::class, foreignKey: "id",localKey: "workouts_id");
    }
}
