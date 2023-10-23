<?php

namespace App\Http\Controllers;

use App\Models\V1\ClassesTimings;
use Illuminate\Http\Request;

class ClassesTimingsController extends Controller
{
    public function destroy(ClassesTimings $classesTiming)
    {

        $classesTiming->delete();
        return response()->json(["success"=>true], 200);

    }

    public function store(Request $request){

        $slot = ClassesTimings::where([
            "classes_id" => $request->get("class"),
            "classes_slots_id" => $request->input("slot")
        ])->whereNull('deleted_at')->first();

        if($slot){
            return redirect()->back()->with("error","Slot Already Exists");
        }

        ClassesTimings::create([
            "classes_id" => $request->get("class"),
            "classes_slots_id" => $request->input("slot")
        ]);

        return redirect()->back()->with("success","Slot Added Successfully");

    }
}
