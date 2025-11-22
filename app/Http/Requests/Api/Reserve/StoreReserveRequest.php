<?php

namespace App\Http\Requests\Api\Reserve;

use Illuminate\Foundation\Http\FormRequest;

class StoreReserveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_email' => 'required|email',
            'item_id' => 'required|exists:items,id',
            'reserved_at' => 'required|date',
            'deadline_at' => 'nullable|date|after:reserved_at',
        ];
    }
}
