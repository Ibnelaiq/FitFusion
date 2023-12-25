<?php

namespace App\Http\Controllers;

use App\Models\V1\Coupons;
use App\Http\Requests\StoreCouponsRequest;
use App\Http\Requests\UpdateCouponsRequest;
use App\Models\V1\CopuonsPolicy;
use App\Policies\CouponsPolicy;
use Carbon\Carbon;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupons::all();
        return view('dashboard.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(StoreCouponsRequest $request)
    {
        $date = $request->input("dates");
        switch ($request->input("valid_type")) {
            case "3":
                $dates = explode(" to ",$date);
                $start_date = Carbon::parse($dates[0]);
                if($start_date->isToday()){
                    $start_date = Carbon::parse($start_date)->setTimeFromTimeString(Carbon::now()->format('H:i:s'))->format('Y-m-d H:i:s');
                }else{
                    $start_date = $start_date->startOfDay()->format('Y-m-d H:i:s');

                }

                $end_date = Carbon::parse($dates[1])->endOfDay()->format('Y-m-d H:i:s');
                break;

            case "2":
                $start_date = Carbon::now()->endOfDay()->format('Y-m-d H:i:s');
                $end_date   = null;
                break;
            case "1":
                $start_date = Carbon::now()->format('Y-m-d H:i:s');
                break;

            default:
                dd("ERROR");
                break;
        }


        $coupon = Coupons::create([
            "code" => $request->input("code"),
            "discount_type" => intval($request->input("discount_type")),
            "discount_amount" => intval($request->input("discount_amount")),
            "status" => 1,
            "start_date" => $start_date,
            "end_date" => $end_date
        ]);

        $coupon_policy = CopuonsPolicy::create([
            "coupons_id" => $coupon->id,
            "use_type"   => intval($request->input("use_type")),
            "user_specific" => $request->input("user_email"),
            "max_uses" => $request->max_uses
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupons $coupons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponsRequest $request, Coupons $coupons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupons $coupons)
    {
        //
    }
}
