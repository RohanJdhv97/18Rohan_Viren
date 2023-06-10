<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialNetworkUpdateRequest extends FormRequest
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
            'tb_positive' => ['required', 'max:255', 'string'],
            'hiv_friends' => ['required', 'max:255', 'string'],
            'friends_same_art' => ['required', 'max:255', 'string'],
            'where_met_friends' => ['required', 'max:255', 'string'],
            'attended_camp' => ['required', 'max:255', 'string'],
            'friends_in_camp' => ['required', 'max:255', 'string'],
            'topics_of_discussion' => ['required', 'max:255', 'string'],
            'likes_in_camp' => ['required', 'max:255', 'string'],
        ];
    }
}
