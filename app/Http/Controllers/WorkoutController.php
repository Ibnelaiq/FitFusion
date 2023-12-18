<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkoutStoreRequest;
use App\Models\V1\WorkoutActivatedMuscles;
use App\Models\V1\Workouts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workouts = Workouts::all();

        $workouts = $workouts->map(function ($workout) {
            $workout->description = Str::limit($workout->description, 100);
            return $workout;
        });

        return view("dashboard.workouts.index", compact("workouts"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.workouts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkoutStoreRequest $request)
    {

        $workout = Workouts::create($request->only([
            "name","description","video_url"
        ]));

        $imagePath = $request->file('image_url')->storeAs('/images/workouts', $workout->id. '.' . $request->file('image_url')->getClientOriginalExtension() ,'public');

        $workout->update([
            "image_url" => $imagePath
        ]);

        $i = 0;
        foreach ($request->file("details_images") as $file) {
            $file->storeAs('images/workouts/'.$workout->id, $workout->id. "-". $i++.".". $request->file('image_url')->getClientOriginalExtension() ,'public');
        }

        if($request->has("dropdownF")){

            $muscF = explode(',',$request->input("dropdownF"));

            foreach ($muscF as $key => $value) {
                WorkoutActivatedMuscles::create([
                    "workouts_id" => $workout->id,
                    "code"        => $value
                ]);
            }

        }

        if($request->has("dropdownB")){

            $muscF = explode(',',$request->input("dropdownB"));

            foreach ($muscF as $key => $value) {
                WorkoutActivatedMuscles::create([
                    "workouts_id" => $workout->id,
                    "code"        => $value
                ]);
            }

        }

        return redirect()->route("workouts.index")->with("success","Workout Created Successfully");



    }

    /**
     * Display the specified resource.
     */
    public function show(Workouts $workout)
    {

        return view("dashboard.workouts.show", compact("workout"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workouts $workout)
    {
        return view("dashboard.workouts.edit", compact("workout"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workouts $workout)
    {


        // $selectedMuscles = explode(",",$request->get("muscles"));
        // $previousMuscles = $workout->activatedMuscles->pluck('code')->toArray();

        // $inverseIntersection = array_diff($selectedMuscles, $previousMuscles);

        // foreach ($previousMuscles as $previousMuscle) {
        //     if(in_array($previousMuscle, $selectedMuscles)){
        //         continue;
        //     }
        //     WorkoutActivatedMuscles::where(["code" => $previousMuscles, "workouts_id" => $workout->id])->delete();
        // }

        // foreach ($inverseIntersection as $newMuscle) {
        //     WorkoutActivatedMuscles::create([
        //         "code" => $newMuscle,
        //         "workouts_id" => $workout->id
        //     ]);
        // }

        $selectedMuscles = explode(",", $request->get("muscles"));
        $previousMuscles = $workout->activatedMuscles->pluck('code')->toArray();

        $musclesToDelete = array_diff($previousMuscles, $selectedMuscles);

        foreach ($musclesToDelete as $muscleToDelete) {
            WorkoutActivatedMuscles::where(["code" => $muscleToDelete, "workouts_id" => $workout->id])->delete();
        }

        $musclesToAdd = array_diff($selectedMuscles, $previousMuscles);

        foreach ($musclesToAdd as $newMuscle) {
            WorkoutActivatedMuscles::create([
                "code" => $newMuscle,
                "workouts_id" => $workout->id
            ]);
        }


        $workout->update($request->only([
            "name","description","video_url"
        ]));

        return redirect()->route("workouts.index")->with("success","Workout Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
