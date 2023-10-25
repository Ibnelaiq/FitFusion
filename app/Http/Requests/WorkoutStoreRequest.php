<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutStoreRequest extends FormRequest
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
            "name" => "required",
            "description" => "required",
            "video_url" => "required|url",
            "dropdownF" => "required_without:dropdownB",
            "dropdownB" => "required_without:dropdownF",
            "image" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
