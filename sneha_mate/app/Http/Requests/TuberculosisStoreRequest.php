<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TuberculosisStoreRequest extends FormRequest
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
            'TB_symptoms' => ['required', 'max:255', 'string'],
            'TB_positive' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
