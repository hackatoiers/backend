<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class UserRequest extends Request
{
    public function authorize()
    {
	return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'password' => $this->isMethod('post')
                ? 'required|min:6'
                : 'sometimes|min:6'
        ];
    }
}
