<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Reserve\StoreReserveRequest;
use App\Http\Requests\Api\Reserve\UpdateReserveRequest;
use App\Http\Resources\Api\Reserve\ReserveResource;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ReserveResource::collection(Reserve::paginate($this->resolvePerPage($request)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReserveRequest $request)
    {
        $reserve = Reserve::create($request->validated());
        return new ReserveResource($reserve);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReserveRequest $request, Reserve $reserve)
    {
        $reserve->update($request->validated());
        return new ReserveResource($reserve);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserve $reserve)
    {
        $reserve->delete();
        return response()->noContent();
    }
}
