<?php

use App\Http\Controllers\Api\V1\MembershipPurchasePricesController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassesTimingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMembershipController;
use App\Http\Controllers\CustomerMembershipExtendPricesController;
use App\Http\Controllers\CustomMembershipExtendPricesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionSliderController;
use App\Http\Controllers\slotsController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\WorkoutsMusclesController;
use App\Models\CustomMembershipExtendPrices;
use App\Models\V1\ClassesTimings;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("/login");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::prefix('dashboard/')->group(function () {

        Route::get('/customer/payment/search', [CustomerController::class,'searchPayment'])->name('customer.searchPayment');
        Route::get('/customer/details/search', [CustomerController::class,'searchDetails'])->name('customer.searchDetails');

        Route::get("/customer/payment/{customer}", [CustomerController::class, "customerPayment"])->name("customer.payment");
        Route::get("/customer/details/{customer}", [CustomerController::class, "details"])->name("customer.details");

        Route::get("/customer/{customer}/subscriptions", [CustomerController::class, "subscription"])->name("customer.subscription");

        Route::get("/customer/{customer}/subscriptions/create", [CustomerMembershipController::class, "create"])->name("customer.membership.create");
        Route::post("/customer/{customer}/subscriptions/create", [CustomerMembershipController::class, "createMembership"])->name("customer.membership.create");


        Route::get("/customer/subscription/{membership}/extend", [CustomerMembershipController::class, "extend"])->name("customer.membership.extend");
        Route::post("/customer/subscription/{membership}/extend", [CustomerMembershipController::class, "extendMembership"])->name("customer.membership.extend");

        Route::get("/customer/subscription/{membership}/cancel", [CustomerMembershipController::class, "cancel"])->name("customer.membership.cancel");
        Route::post("/customer/subscription/{membership}/cancel", [CustomerMembershipController::class, "cancelMembership"])->name("customer.membership.cancel");

        Route::get("/customer/subscription/{membership}/pause", [CustomerMembershipController::class, "pause"])->name("customer.membership.pause");
        Route::post("/customer/subscription/{membership}/pause", [CustomerMembershipController::class, "pauseMembership"])->name("customer.membership.pause");

        Route::get("/customer/subscription/{membership}/resume", [CustomerMembershipController::class, "resume"])->name("customer.membership.resume");
        Route::post("/customer/subscription/{membership}/resume", [CustomerMembershipController::class, "resumeMembership"])->name("customer.membership.resume");


        Route::post("/customer/payment/{customer}", [CustomerController::class, "customerPaymentAssignCode"])->name("customer.payment");



        Route::resource('classes', ClassesController::class);

        Route::get("/classes/{class}/active", [ClassesController::class, "markActive"])->name("classes.active");
        Route::get("/classes/{class}/inactive", [ClassesController::class, "markInActive"])->name("classes.inactive");

        Route::resource('classesTimings', ClassesTimingsController::class);
        Route::resource('slots', slotsController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('workouts', WorkoutController::class);
        Route::resource('workoutsMuscles', WorkoutsMusclesController::class);
        Route::resource('slider', PromotionSliderController::class);
        Route::resource('extendPrices', CustomerMembershipExtendPricesController::class);

        Route::get('slider/{slider}/status', [PromotionSliderController::class,'changeStatus'])->name("slider.status");

        Route::get('sale', [ProductsController::class,'sale'])->name("products.sale.search");


        Route::get('createSale/{product}', [ProductsController::class,'createSale'])->name("products.sale");
        Route::put('createSale/{product}', [ProductsController::class,'storeSale'])->name("products.storeSale");

        Route::get('saleCustomer/{sale}', [ProductsController::class,'saleCustomer'])->name("products.sale.customer.search");
        Route::put('updateSale/{sale}', [ProductsController::class,'updateSale'])->name("products.updateSale");

        Route::prefix('api/')->group(function () {
            Route::get('membershipPrice/{days}', [MembershipPurchasePricesController::class,'getPrice']);
            Route::put('membershipPrice/{days}', [MembershipPurchasePricesController::class,'setPrice']);
        });


    });
});


require __DIR__.'/auth.php';
