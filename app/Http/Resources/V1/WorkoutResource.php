<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
            "name" => $this->name,
            "description" => $this->description,
            "video_url" => $this->video_url,
            "activated_muscles" => new WorkoutActivatedMuscles($this->activatedMuscles)
       ];
    }
}
