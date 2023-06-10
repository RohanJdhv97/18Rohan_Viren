<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivelyhoodAndJobSearchStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'livelihood_training_program' => ['required', 'max:255', 'string'],
            'sibling_job' => ['required', 'max:255', 'string'],
            'travel_to_art_center_program' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
