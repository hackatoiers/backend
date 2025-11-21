<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreMateriaisRequest;
use App\Http\Requests\UpdateMateriaisRequest;
use App\Models\Materiais;
use App\Http\Controllers\Controller;

class MateriaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Materiais::all();
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
    public function store(StoreMateriaisRequest $request)
    {
        $materiais = $request->validated();
        return Materiais::create($materiais);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Materiais::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materiais $materiais)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateriaisRequest $request, Materiais $materiais)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiais $materiais)
    {
        $materiais->delete();
        return response()->json(['message' => 'Material deleted successfully.']);
    }
}
