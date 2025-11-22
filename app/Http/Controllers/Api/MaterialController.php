<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Material\StoreMaterialRequest;
use App\Http\Requests\Api\Material\UpdateMaterialRequest;
use App\Http\Resources\Api\Material\MaterialResource;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return MaterialResource::collection(Material::paginate($this->resolvePerPage($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        $material = Material::create($request->validated());
        return new MaterialResource($material);
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return new MaterialResource($material);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $material->update($request->validated());
        return new MaterialResource($material);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return response()->noContent();
    }
}
