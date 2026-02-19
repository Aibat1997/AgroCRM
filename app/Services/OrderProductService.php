<?php

namespace App\Services;

use App\Exceptions\InvalidOrderProductException;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\WarehouseItem;

class OrderProductService
{
    /**
     * @param list<array{ id: int, quantity: int, price: float }> $orderItems
     * @param Order $order
     * @return void
     */
    public function addProductsToOrder(array $orderItems, Order $order): void
    {
        $orderProducts = [];
        $warehouseItems = WarehouseItem::whereIn('id', array_column($orderItems, 'id'))->toBase()->get(['id', 'title', 'quantity', 'unit_price'])->keyBy('id');

        foreach ($orderItems as $orderItem) {
            $warehouseItem = $warehouseItems->get($orderItem['id']);

            if ($orderItem['price'] > $warehouseItem->unit_price) {
                throw InvalidOrderProductException::invalidPrice($warehouseItem->title, $orderItem['price']);
            }
            if ($orderItem['quantity'] > $warehouseItem->quantity) {
                throw InvalidOrderProductException::invalidQuantity($orderItem['quantity'], $warehouseItem->quantity, $warehouseItem->title);
            }

            $orderProducts[] = [
                'order_id' => $order->id,
                'warehouse_item_id' => $orderItem['id'],
                'unit_price' => $orderItem['price'],
                'quantity' => $orderItem['quantity'],
            ];
        }

        OrderProduct::upsert($orderProducts, ['order_id', 'warehouse_item_id'], ['unit_price', 'quantity']);
    }
}
