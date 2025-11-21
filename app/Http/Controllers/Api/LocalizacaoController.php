<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreLocalizacaoRequest;
use App\Http\Requests\UpdateLocalizacaoRequest;
use App\Models\Localizacao;

class LocalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Localizacao::all();
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
    public function store(StoreLocalizacaoRequest $request)
    {
        $locations = $request->validated();
        return Localizacao::create($locations);
    }

    /**
     * Display the specified resource.
     */
    public function show(Localizacao $localizacao)
    {
        return Localizacao::findOrFail($localizacao->id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Localizacao $localizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocalizacaoRequest $request, Localizacao $localizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Localizacao $localizacao)
    {
        $localizacao->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
