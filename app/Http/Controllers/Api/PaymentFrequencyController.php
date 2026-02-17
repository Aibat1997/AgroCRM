<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentFrequency\PaymentFrequencyCollection;
use App\Models\PaymentFrequency;
use Illuminate\Http\Request;

class PaymentFrequencyController extends Controller
{
    public function index(Request $request)
    {
        $paymentFrequencies = PaymentFrequency::all();
        return new PaymentFrequencyCollection($paymentFrequencies);
    }
}
