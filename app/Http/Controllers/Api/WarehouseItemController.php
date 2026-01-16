<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WarehouseItem\StoreWarehouseItemRequest;
use App\Http\Requests\Api\WarehouseItem\UpdateWarehouseItemRequest;
use App\Http\Resources\WarehouseItemResource;
use App\Models\WarehouseItem;
use Illuminate\Http\Request;

class WarehouseItemController extends Controller
{
    public function index(Request $request)
    {
        $warehouseItems = WarehouseItem::with(['warehouse', 'unit', 'currency'])->filter($request->all())->paginate(15);
        return WarehouseItemResource::collection($warehouseItems)->additional(['success' => true]);
    }

    public function store(StoreWarehouseItemRequest $request)
    {
        $warehouseItem = WarehouseItem::create($request->validated());
        $warehouseItem->load('warehouse');

        return $this->return_success(new WarehouseItemResource($warehouseItem));
    }

    public function show(WarehouseItem $warehouseItem)
    {
        $warehouseItem->load('warehouse');
        return $this->return_success(new WarehouseItemResource($warehouseItem));
    }

    public function update(UpdateWarehouseItemRequest $request, WarehouseItem $warehouseItem)
    {
        $warehouseItem->update($request->validated());
        $warehouseItem->load('warehouse');

        return $this->return_success(new WarehouseItemResource($warehouseItem));
    }

    public function destroy(WarehouseItem $warehouseItem)
    {
        $warehouseItem->delete();
        return $this->return_success();
    }

    public function restore(WarehouseItem $warehouseItem)
    {
        //
    }
}
