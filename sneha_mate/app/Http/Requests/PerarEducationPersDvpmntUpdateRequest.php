<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerarEducationPersDvpmntUpdateRequest extends FormRequest
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
            'understanding_life_choices' => ['required', 'max:255', 'string'],
            'qualities_for_pe' => ['required', 'max:255', 'string'],
            'focus_for_independent_And_sustainable_life' => [
                'required',
                'max:255',
                'string',
            ],
            'pe_help_future' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
