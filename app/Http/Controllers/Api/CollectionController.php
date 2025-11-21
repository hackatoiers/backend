<?php

namespace App\Http\Controllers\Api;

use App\Models\Collection;
use Orion\Http\Controllers\Controller;
use App\Policies\CollectionPolicy;
use Orion\Concerns\DisableAuthorization;

class CollectionController extends Controller
{
    use DisableAuthorization;


    protected $model = Collection::class;

    protected $policy = CollectionPolicy::class;
}