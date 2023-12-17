<?php

namespace App\Http\Requests\V1\Customer\TrackWorkout;

use Illuminate\Foundation\Http\FormRequest;

class TrackWorkoutPostRequest extends FormRequest
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
            'data' => 'required|array',
            'data.*' => 'required|array',
            'data.*.id' => 'required|integer', // Assuming id is an integer
            'data.*.instructions' => 'required|string',
            'data.*.track_info' => 'required|array',
            'data.*.track_info.*.kg' => 'required|numeric',
            'data.*.track_info.*.reps' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'data.required' => 'The data field is required.',
            'data.array' => 'The data must be an array.',
            'data.*.required' => 'Each item in the data array must be an array.',
            'data.*.id.required' => 'The id field is required for each item in the data array.',
            'data.*.id.integer' => 'The id must be an integer.',
            'data.*.instructions.required' => 'The instructions field is required for each item in the data array.',
            'data.*.instructions.string' => 'The instructions must be a string.',
            'data.*.track_info.required' => 'The track_info field is required for each item in the data array.',
            'data.*.track_info.array' => 'The track_info must be an array.',
            'data.*.track_info.*.kg.required' => 'The kg field is required for each item in the track_info array.',
            'data.*.track_info.*.kg.numeric' => 'The kg must be a number.',
            'data.*.track_info.*.reps.required' => 'The reps field is required for each item in the track_info array.',
            'data.*.track_info.*.reps.integer' => 'The reps must be an integer.',
        ];
    }
}
