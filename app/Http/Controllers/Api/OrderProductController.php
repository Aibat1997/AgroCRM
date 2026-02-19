<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderProduct\StoreOrderProductRequest;
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

    public function store(StoreOrderProductRequest $request)
    {
        $user = Auth::user();
        $order = $this->orderService->getOrCreateActiveOrder($user);
        $this->orderProductService->addProductsToOrder($request->validated()['products'], $order);

        return new OrderResource($order);
    }
}
