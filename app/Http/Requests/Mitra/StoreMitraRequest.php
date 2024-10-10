<?php

namespace App\Http\Requests\Mitra;

use Illuminate\Foundation\Http\FormRequest;

class StoreMitraRequest extends FormRequest
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
            'nama_mitra' => [
                'required', 'string', 'max:255',
            ],
            'alamat' => [
                'required', 'string', 'max:1000',
            ],
            'kontak' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
