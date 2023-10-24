<?php

namespace App\Http\Controllers;

use App\Models\V1\ClassesSlots;
use Illuminate\Http\Request;

class SlotsController extends Controller
{
    public function index()
    {
        $slots = ClassesSlots::all();
        return view('dashboard.slots.index', compact('slots'));
    }

    public function create()
    {
        return view('dashboard.slots.create');
    }

    public function store(Request $request){
        $this->validate($request, [ "start"=> "required", "end" => "required"]);

        ClassesSlots::create([
            "start"=> $request->start,
            "end"=> $request->end
        ]);

        return redirect()->route("slots.index")->with("success","Slot Created");



    }

    public function edit(ClassesSlots $slot){

        return view("dashboard.slots.edit", compact("slot"));
    }

    public function update(Request $request, $id){

        $data = $this->validate($request, [
            "start"=> "required",
            "end" => "required",
        ]);
        $slot = ClassesSlots::find($id);
        $slot -> update($data);

        return redirect()->route("slots.index")->with("success","Slot Updated");

    }
    public function destroy(ClassesSlots $slot){

        $slot->timings()->delete();

        $slot->delete();

        return response()->json(["success"=>true], 200);
    }

}
