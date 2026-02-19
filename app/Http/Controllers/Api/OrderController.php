<?php

namespace App\Http\Controllers\Api;

use App\DTO\ConfirmSaleOrderDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\ConfirmSaleOrderRequest;
use App\Http\Resources\Order\OrderCollection;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private readonly OrderService $orderService) {}

    public function index(Request $request)
    {
        $orders = Order::with(['company', 'author', 'paymentMethod'])->filter($request->all())->latest()->paginate(15);
        return new OrderCollection($orders);
    }

    public function show(Order $order)
    {
        $order->load('products');
        return new OrderResource($order);
    }

    public function confirmSaleOrder(ConfirmSaleOrderRequest $request, Order $order)
    {
        $order->load('products.warehouseItem');
        $dto = ConfirmSaleOrderDTO::fromArray($request->validated());
        $this->orderService->confirmSaleOrder($dto, $order);

        return new OrderResource($order);
    }
}
