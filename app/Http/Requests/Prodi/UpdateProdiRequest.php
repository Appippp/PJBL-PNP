<?php

namespace App\Http\Requests\Prodi;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProdiRequest extends FormRequest
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
            'kode_prodi' => [
                'required', 'string', 'max:255',Rule::unique('prodi')->ignore($this->prodi)
            ],
            'nama_prodi' => [
                'required', 'string', 'max:255',
            ],
        ];
    }
}
