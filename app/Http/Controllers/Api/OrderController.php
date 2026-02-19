<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with(['company', 'author', 'paymentMethod'])->filter($request->all())->latest()->paginate(15);
        return new OrderCollection($orders);
    }
}
