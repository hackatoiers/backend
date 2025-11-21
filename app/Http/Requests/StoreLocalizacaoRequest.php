<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocalizacaoRequest extends FormRequest
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
            'sitio' => 'required|string|max:255',
            'cidade' => 'string|max:255',
            'estado' => 'string|max:255',
            'pais' => 'string|max:255',
            'estante' => 'required|string|max:255',
            'prateleira' => 'required|string|max:255',
            'sala' => 'required|string|max:255',
        ];
    }
}
