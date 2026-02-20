<?php

namespace App\Services;

use App\DTO\OrderProductDTO;
use App\Exceptions\InvalidOrderProductException;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\WarehouseItem;
use Illuminate\Support\Facades\DB;

class OrderProductService
{
    /**
     * @param list<OrderProductDTO> $orderItems
     * @param Order $order
     * @return void
     */
    public function addProductsToOrder(array $orderItems, Order $order): void
    {
        $totalAmount = 0;
        $orderProducts = [];
        $warehouseItemIds = array_map(fn(OrderProductDTO $item) => $item->warehouse_item_id, $orderItems);
        $warehouseItems = WarehouseItem::whereIn('id', $warehouseItemIds)->toBase()->get(['id', 'title', 'quantity', 'unit_price'])->keyBy('id');

        foreach ($orderItems as $orderItem) {
            $warehouseItem = $warehouseItems->get($orderItem->warehouse_item_id);

            if ($orderItem->unit_price > $warehouseItem->unit_price) {
                throw InvalidOrderProductException::invalidPrice($warehouseItem->title, $orderItem->unit_price);
            }
            if ($orderItem->quantity > $warehouseItem->quantity) {
                throw InvalidOrderProductException::invalidQuantity($orderItem->quantity, $warehouseItem->quantity, $warehouseItem->title);
            }

            $orderProducts[] = [
                'order_id' => $order->id,
                'warehouse_item_id' => $orderItem->warehouse_item_id,
                'unit_price' => $orderItem->unit_price,
                'quantity' => $orderItem->quantity,
            ];

            $totalAmount += $orderItem->unit_price * $orderItem->quantity;
        }

        DB::transaction(function () use ($orderProducts, $order, $totalAmount) {
            OrderProduct::upsert($orderProducts, ['order_id', 'warehouse_item_id'], ['unit_price', 'quantity']);
            $order->update(['total_amount' => $totalAmount]);
        });
    }
}
