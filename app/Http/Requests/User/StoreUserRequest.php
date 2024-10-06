<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => [
                'required', 'string', 'max:255', 'unique:users',
            ],
            'email' => [
                'required', 'string', 'email', 'max:255', 'unique:users',
            ],
            'password' => [
               'string', 'min:6', 'mixedCase',
            ],
        ];
    }
}
