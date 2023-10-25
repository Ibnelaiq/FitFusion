<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeActivatedMuscle;
use App\Models\V1\WorkoutActivatedMuscles;
use App\Models\V1\Workouts;
use Illuminate\Http\Request;

class WorkoutsMusclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeActivatedMuscle $request)
    {

        if($request->has("dropdownF")){
            WorkoutActivatedMuscles::create([
                "workouts_id" => $request->input("workout"),
                "code" => $request->input("dropdownF")
            ]);
        }

        if($request->has("dropdownB")){
            WorkoutActivatedMuscles::create([
                "workouts_id" => $request->input("workout"),
                "code" => $request->input("dropdownB")
            ]);
        }

        return redirect()->route("workouts.edit", ["workout" => $request->input("workout") ])->with("success","Workout Updated");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkoutActivatedMuscles $workoutsMuscle)
    {
        $workoutsMuscle->delete();
        return response()->json(['success'=> 'true']);
    }
}
