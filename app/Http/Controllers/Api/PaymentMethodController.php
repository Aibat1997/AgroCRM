<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentMethod\PaymentMethodCollection;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $paymentMethods = PaymentMethod::all();
        return new PaymentMethodCollection($paymentMethods);
    }
}
