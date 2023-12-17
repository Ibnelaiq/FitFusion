<?php

namespace App\Http\Controllers;

use App\Models\V1\TrackWorkout;
use App\Http\Requests\StoreTrackWorkoutRequest;
use App\Http\Requests\UpdateTrackWorkoutRequest;
use App\Http\Requests\V1\Customer\TrackWorkout\TrackWorkoutPostRequest;
use App\Models\V1\TrackWorkout_Workouts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrackWorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function trackWorkout(TrackWorkoutPostRequest $request){

        $track_workout = TrackWorkout::create([
            "customer_id" =>  $request->user()->id
        ]);

        foreach ($request->get("data") as $key => $value) {

            $instruction = $value["instructions"];
            $workout_id  = $value["id"];

            TrackWorkout_Workouts::create([
                "workouts_id" => $workout_id,
                "track_workout_id" => $track_workout->id,
                "instructions" => $instruction,
                "rep_info" => json_encode($value["track_info"])
            ]);

        }

        return response(status: 204);

    }

    public function getTracking(Request $request){
        $workouts = TrackWorkout::where([
            "customer_id" => $request->user()->id
        ])->limit(7)->get();
        $finalArray = [];

        foreach ($workouts as $key => $value) {

            $trackArray = [];
            foreach($value->workouts as $val){
                $trackArray[] = [
                    "name" =>  $val->workout->name,
                    "created_at" =>  $this->customDateFormat($value->created_at),
                    "instruction" => $val->instructions,
                    "rep_info" => json_decode($val->rep_info)
                ];
            }
            $finalArray[] = $trackArray;
        }


        return response()->json($finalArray, 200);
    }

    function customDateFormat($timestamp)
    {

        $carbonTimestamp = \Illuminate\Support\Carbon::parse($timestamp);

        // Check if the timestamp is today
        if ($carbonTimestamp->isToday()) {
            return 'today';
        }

        // If not today, format the date without the time
        return $carbonTimestamp->toDateString();
    }


}
