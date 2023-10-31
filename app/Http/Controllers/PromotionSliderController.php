<?php

namespace App\Http\Controllers;

use App\Models\V1\PromotionSlider;
use App\Http\Requests\StorePromotionSliderRequest;
use App\Http\Requests\UpdatePromotionSliderRequest;
use App\Models\V1\PromotionSlider as V1PromotionSlider;
use Illuminate\Http\Request;

class PromotionSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = PromotionSlider::all();
        return view("dashboard.slider.index", compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromotionSliderRequest $request)
    {
        $slider = PromotionSlider::create([
            "url" => "",
            "status" => 1,
        ]);

        $imagePath = $request->file('image')->storeAs('images/promotionSlider', $slider->id . '.' . $request->file('image')->getClientOriginalExtension(), 'public');

        $slider->update([
            "url" => "/storage/".$imagePath
        ]);

        return redirect()->route("slider.index")->with("success","Promotion Slider Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(PromotionSlider $promotionSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromotionSlider $promotionSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionSliderRequest $request, PromotionSlider $promotionSlider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function changeStatus(PromotionSlider $slider, Request $request)
    {

        $slider->update([
           "status" => $request->get("flag")
        ]);

        return redirect()->route("slider.index")->with("success","Status Updated Successfully");
    }

}
