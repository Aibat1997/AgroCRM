<?php

namespace App\Http\Controllers\Api;

use App\DTO\WarehouseItemDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WarehouseItem\StoreWarehouseItemRequest;
use App\Http\Requests\Api\WarehouseItem\UpdateWarehouseItemRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\WarehouseItem\WarehouseItemCollection;
use App\Http\Resources\WarehouseItem\WarehouseItemResource;
use App\Models\WarehouseItem;
use App\Services\WarehouseItemService;
use Illuminate\Http\Request;

class WarehouseItemController extends Controller
{

    public function __construct(private readonly WarehouseItemService $warehouseItemService) {}

    public function index(Request $request)
    {
        $warehouseItems = WarehouseItem::with(['unit', 'currency'])->filter($request->all())->paginate(15);
        return new WarehouseItemCollection($warehouseItems);
    }

    public function store(StoreWarehouseItemRequest $request)
    {
        $dto = WarehouseItemDTO::fromArray($request->validated());
        $warehouseItem = $this->warehouseItemService->store($dto);

        return new WarehouseItemResource($warehouseItem);
    }

    public function show(WarehouseItem $warehouseItem)
    {
        return new WarehouseItemResource($warehouseItem);
    }

    public function update(UpdateWarehouseItemRequest $request, WarehouseItem $warehouseItem)
    {
        $dto = WarehouseItemDTO::fromArray($request->validated());
        $warehouseItem = $this->warehouseItemService->update($dto, $warehouseItem);

        return new WarehouseItemResource($warehouseItem);
    }

    public function destroy(WarehouseItem $warehouseItem)
    {
        $warehouseItem->delete();
        return EmptyResource::success();
    }

    public function restore(WarehouseItem $warehouseItem)
    {
        //
    }
}
