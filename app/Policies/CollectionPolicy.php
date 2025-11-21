<?php

namespace App\Policies;

use App\Models\Collecion;
use App\Models\User;

class CollectionPolicy
{
    public function index(?User $user)
    {
        return true;
    }

    public function store(?User $user)
    {
        return true;
    }

    public function update(?User $user)
    {
        return true;
    }

    public function delete(?User $user)
    {
        return true;
    }
}
