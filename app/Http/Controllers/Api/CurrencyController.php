<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Services\CurrencyCacheService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function __construct(private readonly CurrencyCacheService $currencyCacheService) {}

    public function index(Request $request)
    {
        $currencies = $this->currencyCacheService->getCurrencies();
        return $this->return_success(CurrencyResource::collection($currencies));
    }
}
