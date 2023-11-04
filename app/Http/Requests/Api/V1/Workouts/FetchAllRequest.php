<?php

namespace App\Http\Requests\Api\V1\Workouts;

use Illuminate\Foundation\Http\FormRequest;

class FetchAllRequest extends FormRequest
{
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
        return [
            // "activated_muscle" => "required_without:search_keyword|array",
            // "search_keyword" => "required_without:activated_muscle|string",
        ];
    }
}
