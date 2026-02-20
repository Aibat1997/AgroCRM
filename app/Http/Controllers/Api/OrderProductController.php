<?php

namespace App\Http\Controllers\Api;

use App\DTO\SaleProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderProduct\PurchaseProductRequest;
use App\Http\Requests\Api\OrderProduct\SaleProductRequest;
use App\Http\Resources\Order\OrderResource;
use App\Services\OrderProductService;
use App\Services\OrderService;
use Illuminate\Support\Facades\Auth;

class OrderProductController extends Controller
{
    public function __construct(
        private readonly OrderService $orderService,
        private readonly OrderProductService $orderProductService
    ) {}

    public function purchaseProducts(PurchaseProductRequest $request)
    {
        $user = Auth::user();
        $order = $this->orderService->getOrCreateActiveOrder($user, true);

        return new OrderResource($order);
    }

    public function saleProducts(SaleProductRequest $request)
    {
        $user = Auth::user();
        $dto = SaleProductDTO::fromArray($request->validated());
        $order = $this->orderService->getOrCreateActiveOrder($user, false);
        $this->orderProductService->addProductsToOrder($dto, $order);
        $order->load('products.warehouseItem');

        return new OrderResource($order);
    }
}
