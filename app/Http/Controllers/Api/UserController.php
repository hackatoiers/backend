<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Orion\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $model = User::class;

    protected function storeRequest()
    {
        return UserRequest::class;
    }

    protected function updateRequest()
    {
        return UserRequest::class;
    }

    protected $searchable = ['name', 'email'];

    protected $fillable = ['name', 'email', 'password'];

    protected function beforeSave($request, $model)
    {
        if ($request->has('password')) {
            $model->password = bcrypt($request->password);
        }
    }
}
