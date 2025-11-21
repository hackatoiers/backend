<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class UserRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function commonRules(): array
    {
        return [
            'email' => 'required'
        ];
    }

    public function storeRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'password' => 'required|min:8'
        ];
    }

    public function updateRules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $this->id,
            'password' => 'sometimes|nullable|min:8'
        ];
    }

}
