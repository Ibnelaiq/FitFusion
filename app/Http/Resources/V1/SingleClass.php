<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleClass extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            "name" => $this->name,
            "duration" => $this->duration,
            "price" => $this->price,
            "description" => $this->description,
            "timings" => new ClassTimings($this->timings),
            "rating"  => $this->rating
        ];
    }
}
