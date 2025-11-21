<?php

namespace App\Http\Controllers\Api;

use App\Models\Photo;
use Orion\Http\Controllers\Controller;

class PhotoController extends Controller
{
    protected $model = Photo::class;
}