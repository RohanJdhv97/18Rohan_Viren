<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationUpdateRequest extends FormRequest
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
            'current_qualification' => ['required', 'max:255', 'string'],
            'orphan_status' => ['required', 'max:255', 'string'],
            'future_education' => ['required', 'boolean'],
            'desired_field_of_study' => ['required', 'max:255', 'string'],
            'dropout_status' => ['required', 'boolean'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
