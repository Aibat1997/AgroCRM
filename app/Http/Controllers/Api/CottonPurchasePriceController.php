<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CottonPurchasePriceResource;
use App\Models\CottonPurchasePrice;
use Illuminate\Http\Request;

class CottonPurchasePriceController extends Controller
{
    public function index(Request $request)
    {
        $cottonPurchasePrice = CottonPurchasePrice::latest()->first();
        return $this->return_success(new CottonPurchasePriceResource($cottonPurchasePrice));
    }
}
