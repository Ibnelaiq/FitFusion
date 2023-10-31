<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GeneralSingleResource;
use App\Models\V1\FeaturedSlider;
use App\Models\V1\PromotionSlider;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function sliderImages(Request $request){

        // $slider_id = $request->id ?? "1";

        // $imagePath = public_path('images/slider'); // Path to the slider images directory
        // $imageFiles = glob($imagePath . '/*'); // Get all files in the directory

        // // Prepare image URLs to send to the mobile app
        // $imageUrls = [];
        // foreach ($imageFiles as $file) {

        //     $imageUrl = asset('images/slider/' . basename($file));
        //     // Check if the image URL is marked as featured in the database
        //     $isFeatured = FeaturedSlider::where(['image_url' => basename($file) , "slider_id" => $slider_id])->where('is_featured', true)->exists();

        //     if(!$isFeatured)
        //         continue;
        //     // Add is_featured status to the response
        //     $imageUrls[] = [
        //         'url' => $imageUrl,
        //     ];

        // }

        $slider = PromotionSlider::where([
            "status" => 1
        ])->select(["url"])->get();

        return new GeneralSingleResource($slider);
    }
}
