<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
                'required','integer',
            ],
            'nim' => [
                'required','string','max:255',Rule::unique('mahasiswa')->ignore($this->mahasiswa)
            ],
            'tahun_masuk' => [
                'required','integer',
            ],
            'jk' => [
                'required',
            ],
            'no_telp' => [
                'required','string','max:14',
            ],
            'alamat' => [
                'required','string', 'max:10000',
            ],
        ];
    }
}
