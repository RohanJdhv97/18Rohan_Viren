<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthUpdateRequest extends FormRequest
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
            'enough_medicines' => ['required', 'max:255', 'string'],
            'days_meds_missed' => ['required', 'numeric'],
            'cd4_count' => ['required', 'max:255', 'string'],
            'cd4_count_num' => ['required', 'max:255', 'string'],
            'viral_load_count' => ['required', 'max:255', 'string'],
            'viral_count_num' => ['required', 'max:255', 'string'],
            'fallen_sick' => ['required', 'max:255', 'string'],
            'share_health' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
