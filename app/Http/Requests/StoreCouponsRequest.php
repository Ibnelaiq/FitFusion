<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCouponsRequest extends FormRequest
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
        "code" => "required|max:6",
        "discount_type" => "required|in:21,22",
        "use_type" => "required|in:13,12,11",
        "max_uses" => [
            Rule::when($this->input('use_type') == "12", ['required','min:2']),
        ],
        'discount_amount' => [
            'required',
            Rule::when($this->input('discount_type') == "22", ['max:100']),
        ],
        "user_email" => [
            "email",
            Rule::when($this->input('user_specific') == "1", ['required']),
        ],
        "dates" => [
            Rule::when(in_array($this->input('valid_type'), ["1","3"]), ['required']),
        ]
    ];
    }
}
