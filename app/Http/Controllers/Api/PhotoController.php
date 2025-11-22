<?php

namespace App\Http\Controllers\Api;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Photo\StorePhotoRequest;
use App\Http\Requests\Api\Photo\UpdatePhotoRequest;
use App\Http\Resources\Api\Photo\PhotoResource;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        $requestData = $request->validated();

        $logoPath = $request->file('photo')->store('items/photos');

        $photo = Photo::create(array_merge($requestData, ['photo_url' => $logoPath]));
        return new PhotoResource($photo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return new PhotoResource($photo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return response()->noContent();
    }
}
