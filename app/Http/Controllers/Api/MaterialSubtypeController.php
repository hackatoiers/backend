<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubType;
use Illuminate\Http\Request;
use App\Http\Requests\Api\MaterialSubtype\StoreMaterialSubtypeRequest;
use App\Http\Requests\Api\MaterialSubtype\UpdateMaterialSubtypeRequest;
use App\Http\Resources\Api\MaterialSubtype\MaterialSubtypeResource;

class MaterialSubtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return MaterialSubtypeResource::collection(SubType::paginate($this->resolvePerPage($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialSubtypeRequest $request)
    {
        $subType = SubType::create($request->validated());
        return new MaterialSubtypeResource($subType);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubType $subType)
    {
        return new MaterialSubtypeResource($subType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubType $subType)
    {
        $subType->update($request->validated());
        return new MaterialSubtypeResource($subType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubType $subType)
    {
        $subType->delete();
        return response()->noContent();
    }
}
