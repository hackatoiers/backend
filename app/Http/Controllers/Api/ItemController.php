<?php

namespace App\Http\Controllers\Api;

use App\Models\Item;
use Orion\Http\Controllers\Controller;

class ItemController extends Controller
{
    protected $model = Item::class;

    protected function buildFetchAllQuery($query)
    {
        return $query->with('fotos');
    }

    protected function buildFetchOneQuery($query)
    {
        return $query->with('fotos');
    }
}