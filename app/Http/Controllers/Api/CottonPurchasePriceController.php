<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CottonPurchasePriceResource;
use App\Models\CottonPurchasePrice;
use App\Services\CottonPurchasePriceCacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CottonPurchasePriceController extends Controller
{
    public function __construct(private readonly CottonPurchasePriceCacheService $cottonPurchasePriceCacheService) {}

    public function index(Request $request)
    {
        $cottonPurchasePrice = $this->cottonPurchasePriceCacheService->getLatestCottonPurchasePrice();
        return $this->return_success(new CottonPurchasePriceResource($cottonPurchasePrice));
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|integer|min:0',
        ]);

        $cottonPurchasePrice = CottonPurchasePrice::create([
            'user_id' => Auth::id(),
            'price' => $request->input('price'),
        ]);

        $this->cottonPurchasePriceCacheService->clearCache();
        $this->cottonPurchasePriceCacheService->warmupCache();

        return $this->return_success(new CottonPurchasePriceResource($cottonPurchasePrice));
    }
}
