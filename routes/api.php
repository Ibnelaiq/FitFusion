<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\CustomerMembershipsController;
use App\Http\Controllers\Api\V1\ClassesController;
use App\Http\Controllers\Api\V1\CustomerMembershipAttendanceController;
use App\Http\Controllers\Api\V1\FrontPageController;
use App\Http\Controllers\Api\V1\WorkoutsController;
use App\Models\V1\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

// Route::get("/create-user-dev", function(){
//     User::create([
//         "name"=> "wahab",
//         "email" => "wahab@fitfusion.com",
//         "password" =>  Hash::make("password"),
//         "role" => 1
//     ]);
//     User::create([
//         "name"=> "ahmed",
//         "email" => "ahmed@fitfusion.com",
//         "password" =>  Hash::make("password"),
//         "role" => 1
//     ]);
// });


Route::prefix("v1")->namespace("App\Http\Controllers\Api\V1")->group(function () {



    Route::post('/customers', [CustomerController::class, "store"]);

    Route::put("/customers/{id}/code", [CustomerController::class , "assignPassCode"]);
    Route::post("/customers/code", [CustomerController::class , "loginPassCode"]);
    Route::post("/customers/{id}/code/reset", [CustomerController::class , "resetPassCode"]);

    Route::middleware(["auth:sanctum"])->group(function(){

        Route::post("/customers/{id}/attendance", [CustomerMembershipAttendanceController::class , "store"]);

        Route::resource('customers', CustomerController::class)->except(["store"]);
        Route::resource('membership', CustomerMembershipsController::class);
        Route::resource('classes', ClassesController::class);
        Route::resource('workouts', WorkoutsController::class);
    });

    Route::get("/slider", [FrontPageController::class, "sliderImages"]);







});


Route::get('/sendmail', function (Request $request) {

    Mail::raw('Hi user, a new login into your account from the IP Address: ', function ($message) {
        $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $message->to('abdulwahabfaiz@gmail.com', 'Ahmed Ali');
    });

});
