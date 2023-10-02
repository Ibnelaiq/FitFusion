<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\CustomerMembershipsController;
use App\Http\Controllers\Api\V1\ClassesController;
use App\Http\Controllers\Api\V1\CustomerMembershipAttendanceController;
use App\Http\Controllers\Api\V1\WorkoutsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/", function(){
    dd("asdasd");
});


Route::prefix("v1")->namespace("App\Http\Controllers\Api\V1")->group(function () {

    Route::post('/customers', [CustomerController::class, "store"]);

    Route::post("/customers/{id}/code", [CustomerController::class , "assignPassCode"]);
    Route::post("/customers/{id}/code/reset", [CustomerController::class , "resetPassCode"]);

    Route::middleware(["auth:sanctum"])->group(function(){

        Route::post("/customers/{id}/attendance", [CustomerMembershipAttendanceController::class , "store"]);

        Route::resource('customers', CustomerController::class)->except(["store"]);
        Route::resource('membership', CustomerMembershipsController::class);
        Route::resource('classes', ClassesController::class);
        Route::resource('workouts', WorkoutsController::class);
    });







});
