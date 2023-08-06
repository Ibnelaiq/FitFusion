<?php

namespace App\Http\Requests\Api\V1\Customer;
use Carbon\Carbon;
use App\Traits\TransformableRequestKeys;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Interfaces\FormRequestPassedValidationInterface;

class StoreCustomerRequest extends FormRequest
{
    use TransformableRequestKeys;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $this->setTransformTable(["identificationNumber" => "passport_or_id"]);
        // $this->setExceptColumns(["phoneNumber"]);

        return [
            "name" => "required|min:2",
            "surname" => "required",
            "identificationNumber" => "",
            "birthDate" => "required|date_format:Y-m-d|before:today",
            "phoneNumber" => "required",
            "gender" => Rule::in("M","F")
        ];
    }
}
