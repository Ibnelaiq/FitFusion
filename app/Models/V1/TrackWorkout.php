<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackWorkout extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function workouts(){
        return $this->hasMany(TrackWorkout_Workouts::class);
    }

}
