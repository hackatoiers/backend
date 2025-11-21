<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreColecaoRequest;
use App\Http\Requests\UpdateColecaoRequest;
use App\Models\Colecao;
use App\Http\Controllers\Controller;


class ColecaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Colecao::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColecaoRequest $request)
    {
        $colections = $request->validated();
        return Colecao::create($colections);
    }

    /**
     * Display the specified resource.
     */
    public function show(Colecao $colecao)
    {
        return Colecao::findOrFail($colecao->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colecao $colecao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColecaoRequest $request, Colecao $colecao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colecao $colecao)
    {
        $colecao->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
