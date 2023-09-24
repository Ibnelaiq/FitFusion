<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    protected $genderResource = [
        "M" => "Male",
        "F" => "Female"
    ];
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surName' => $this->surname,
            'identificationNumber' => $this->passport_or_id,
            'phoneNumber' => $this->phone_number,
            'birthDate' => $this->birth_date,
            'gender' => $this->genderResource[$this->gender],
            'isActive' => $this->deleted_at == null,
            'activeMembership' => new CustomerActiveSubscription($this->activeSubscription)
        ];
    }
}
