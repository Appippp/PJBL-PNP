<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
            'user_id' => [
                'required','integer',
            ],
            'prodi_id' => [
                'required','in:1,2',
            ],
            'nim' => [
                'required','string','max:255','unique:mahasiswa'
            ],
            'tahun_masuk' => [
                'required','integer',
            ],
            'jk' => [
                'required',
            ],
            'no_telp' => [
                'nullable','string','max:14',
            ],
            'alamat' => [
                'nullable','string', 'max:10000',
            ],
        ];
    }
}
