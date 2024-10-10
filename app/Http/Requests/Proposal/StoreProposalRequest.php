<?php

namespace App\Http\Requests\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class StoreProposalRequest extends FormRequest
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
            'mahasiswa_id' => [
                'required', 'integer',
            ],

            'judul_proposal' =>[
                'required', 'string', 'max:255',
            ],

            'file_proposal' => [
                 'required','mimes:pdf','max:10000',
            ],
        ];
    }
}
