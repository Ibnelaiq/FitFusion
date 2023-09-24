<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\WorkoutResource;
use App\Models\V1\Workouts;
use App\Http\Requests\StoreWorkoutsRequest;
use App\Http\Requests\UpdateWorkoutsRequest;
use App\Http\Resources\V1\WorkoutsResource;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new WorkoutsResource(Workouts::all());
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
    public function store(StoreWorkoutsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $workout = Workouts::findOrFail($id);

        return new WorkoutResource($workout);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workouts $workouts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutsRequest $request, Workouts $workouts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workouts $workouts)
    {
        //
    }
}
