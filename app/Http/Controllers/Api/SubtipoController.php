<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubtipoRequest;
use App\Http\Requests\UpdateSubtipoRequest;
use App\Models\Subtipo;

class SubtipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Subtipo::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubtipoRequest $request)
    {
        $subtype = $request->validated();
        return Subtipo::create($subtype);
    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {
        return Subtipo::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subtipo $subtipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubtipoRequest $request, Subtipo $subtipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subtipo $subtipo)
    {
        $subtipo->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
