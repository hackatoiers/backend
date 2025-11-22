<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Item\ItemStoreRequest;
use App\Http\Requests\Api\Item\ItemUpdateRequest;
use App\Http\Resources\Api\ItemResources;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ItemController extends Controller
{
    public function __construct() {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ItemResources::item(Item::paginate($this->resolvePerPage($request)));
    }

    /**
     * Display a listing of the resource.
     *


     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
        $item = Item::create($request->validated());
        return new ItemResources($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return new ItemResources($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        $item->update($request->validated());
        return new ItemResources($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response()->noContent();
    }
}
