<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConservationAction;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ConservationAction\StoreConservationActionRequest;
use App\Http\Requests\Api\ConservationAction\UpdateConservationActionRequest;
use App\Http\Resources\Api\ConservationAction\ConservationActionResource;

class ConservationActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ConservationActionResource::collection(ConservationAction::paginate($this->resolvePerPage($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConservationActionRequest $request)
    {
        $conservationAction = ConservationAction::create($request->validated());
        return new ConservationActionResource($conservationAction);
    }

    /**
     * Display the specified resource.
     */
    public function show(ConservationAction $conservationAction)
    {
        return new ConservationActionResource($conservationAction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConservationActionRequest $request, ConservationAction $conservationAction)
    {
        $conservationAction->update($request->validated());
        return new ConservationActionResource($conservationAction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConservationAction $conservationAction)
    {
        $conservationAction->delete();
        return response()->noContent();
    }
}
