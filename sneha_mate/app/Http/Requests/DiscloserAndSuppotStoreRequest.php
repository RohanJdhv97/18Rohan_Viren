<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscloserAndSuppotStoreRequest extends FormRequest
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
            'share_about_yourself' => ['required', 'max:255', 'string'],
            'kind_of_support' => ['required', 'max:255', 'string'],
            'disclosing_sharing_status' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
