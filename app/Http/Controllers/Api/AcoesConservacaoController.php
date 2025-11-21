<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAcoesConservacaoRequest;
use App\Http\Requests\UpdateAcoesConservacaoRequest;
use App\Models\AcoesConservacao;
use App\Http\Controllers\Controller;

class AcoesConservacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AcoesConservacao::all();
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
    public function store(StoreAcoesConservacaoRequest $request)
    {
        $acoesConservacao = $request->validated();
        return AcoesConservacao::create($acoesConservacao);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return AcoesConservacao::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcoesConservacao $acoesConservacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAcoesConservacaoRequest $request, AcoesConservacao $acoesConservacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcoesConservacao $acoesConservacao)
    {
        $acoesConservacao->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
