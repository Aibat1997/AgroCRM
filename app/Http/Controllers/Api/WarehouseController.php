<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Warehouse\StoreWarehouseRequest;
use App\Http\Requests\Api\Warehouse\UpdateWarehouseRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\Warehouse\WarehouseCollection;
use App\Http\Resources\Warehouse\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $warehouses = Warehouse::with('company')->filter($request->all())->get();
        return new WarehouseCollection($warehouses);
    }

    public function store(StoreWarehouseRequest $request)
    {
        $warehouse = Warehouse::create($request->validated());
        $warehouse->load('company');

        return new WarehouseResource($warehouse);
    }

    public function show(Warehouse $warehouse)
    {
        $warehouse->load('company');
        return new WarehouseResource($warehouse);
    }

    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->validated());
        $warehouse->load('company');

        return new WarehouseResource($warehouse);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return EmptyResource::success();
    }

    public function restore(Warehouse $warehouse)
    {
        //
    }
}
