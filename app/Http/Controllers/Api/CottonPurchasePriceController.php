<?php

namespace App\Http\Controllers\Api;

use App\Enums\CottonPurchasePriceType;
use App\Http\Controllers\Controller;
use App\Http\Resources\CottonPurchasePriceResource;
use App\Models\CottonPurchasePrice;
use App\Services\CottonPurchasePriceCacheService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CottonPurchasePriceController extends Controller
{
    public function __construct(private readonly CottonPurchasePriceCacheService $cottonPurchasePriceCacheService) {}

    public function index(Request $request)
    {
        $cottonPurchasePrices = $this->cottonPurchasePriceCacheService->getLatestCottonPurchasePrices();
        return $this->return_success(CottonPurchasePriceResource::collection($cottonPurchasePrices));
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|integer|min:0',
            'purchase_type' => ['required', 'string', Rule::enum(CottonPurchasePriceType::class)],
        ]);

        $cottonPurchasePrice = CottonPurchasePrice::create([
            'user_id' => Auth::id(),
            'price' => $request->input('price'),
            'purchase_type' => $request->input('purchase_type'),
        ]);

        $this->cottonPurchasePriceCacheService->clearCache();
        $this->cottonPurchasePriceCacheService->warmupCache();

        return $this->return_success(new CottonPurchasePriceResource($cottonPurchasePrice));
    }
}
