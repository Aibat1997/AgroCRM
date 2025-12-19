<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentFrequencyResource;
use App\Models\PaymentFrequency;
use Illuminate\Http\Request;

class PaymentFrequencyController extends Controller
{
    public function index(Request $request)
    {
        $paymentFrequencies = PaymentFrequency::all();
        return $this->return_success(PaymentFrequencyResource::collection($paymentFrequencies));
    }
}
