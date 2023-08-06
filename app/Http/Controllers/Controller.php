<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use OpenApi\Attributes as OA;


#[OA\Info(title: "Fitfusion API", version: "1")]
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

}
