<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTiketRequest extends FormRequest
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
            'idProyek' => 'nullable',
            'judul' => 'nullable',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable',
            'prioritas' => 'nullable',
            'severity' => 'nullable',
            'picRs' => 'nullable',
            'alasanPermintaan' => 'nullable',
            'dampak' => 'nullable',
            'mandays' => 'nullable',
            'label' => 'nullable',
            'assignTo' => 'nullable',
            'plAviat' => 'nullable',
            'persetujuan' => 'nullable',
            'tglPersetujuan' => 'nullable',
            'tag' => 'nullable',
            'tglDikerjakan' => 'nullable',
            'dueDate' => 'nullable',
            'tglSelesai' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
