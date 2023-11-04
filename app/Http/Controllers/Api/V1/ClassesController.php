<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SingleClass;
use App\Models\V1\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        dd($request);

        if($request->search_keyword){
            return new \App\Http\Resources\V1\Classes(Classes::where('name', 'like', "%". $request->search_keyword ."%")->where([
                "status" => Classes::STATUS_ACTIVE,
            ])->get());
        }
        return new \App\Http\Resources\V1\Classes(Classes::where([
            "status" => Classes::STATUS_ACTIVE
        ])->get());

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
    public function store(StoreClassesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $class = Classes::findOrFail($id);

        return new \App\Http\Resources\V1\SingleClass($class);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassesRequest $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
