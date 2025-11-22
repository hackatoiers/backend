<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EthnicGroup;
use Illuminate\Http\Request;
use App\Http\Requests\Api\EthnicGroup\StoreEthnicGroupRequest;
use App\Http\Requests\Api\EthnicGroup\UpdateEthnicGroupRequest;
use App\Http\Resources\Api\EthnicGroup\EthnicGroupResource;

class EthnicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return EthnicGroupResource::collection(EthnicGroup::paginate($this->resolvePerPage($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEthnicGroupRequest $request)
    {
        $ethnicGroup = EthnicGroup::create($request->validated());
        return new EthnicGroupResource($ethnicGroup);
    }

    /**
     * Display the specified resource.
     */
    public function show(EthnicGroup $ethnicGroup)
    {
        return new EthnicGroupResource($ethnicGroup);   
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEthnicGroupRequest $request, EthnicGroup $ethnicGroup)
    {
        $ethnicGroup->update($request->validated());
        return new EthnicGroupResource($ethnicGroup);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EthnicGroup $ethnicGroup)
    {
        $ethnicGroup->delete();
        return response()->noContent();
    }
}
