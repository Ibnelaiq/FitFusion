<?php

namespace App\Http\Controllers;

use App\Models\V1\Classes;
use App\Models\V1\ClassesSlots;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('dashboard.classes.index', compact('classes'));
    }

    public function show(Classes $class){

        return view("dashboard.classes.show", compact("class"));
    }

    public function create()
    {
        return view('dashboard.classes.create');
    }

    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'rating' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image file
            'video_url' => 'required|url'
        ]);

        $class = Classes::create($request->all());

        $imagePath = $request->file('image')->storeAs('images/classes', $class->id. '.' . $request->file('image')->getClientOriginalExtension() ,'public'); // 'images' is the storage path, adjust as needed

        $class->update([
            "image_url" => $imagePath
        ]);

        // Create a new class


        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit(Classes $class)
    {
        // same slots
        $classSlots = $class->timings;


        $classesSlots = ClassesSlots::all();
        return view('dashboard.classes.edit', compact('class','classesSlots'));
    }

    public function update(Request $request, Classes $class)
    {

        // Validate the request
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'duration'    => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'video_url'   => 'required|url'
        ]);

        // Update the class
        $class->update($data);

        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(Classes $class)
    {
        $class->delete();
        return response()->json(["success"=>true], 200);
    }

    public function markActive(Classes $class)
    {
        $class->update([
            "status" => Classes::STATUS_ACTIVE
        ]);
        return redirect()->route('classes.index')->with('success', 'Class updated "Active" successfully.');
    }

    public function markInActive(Classes $class)
    {
        $class->update([
            "status" => Classes::STATUS_INACTIVE
        ]);
        return redirect()->route('classes.index')->with('success', 'Class updated "InActive" successfully.');
    }

}
