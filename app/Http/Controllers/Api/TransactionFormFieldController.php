<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionFormFieldResource;
use App\Services\TransactionFormFieldCacheService;
use Illuminate\Http\Request;

class TransactionFormFieldController extends Controller
{
    public function __construct(private readonly TransactionFormFieldCacheService $transactionFormFieldCacheService) {}

    public function index(Request $request)
    {
        $request->validate([
            'transaction_type_id' => 'required|integer|exists:transaction_types,id',
        ]);

        $transactionFormFields = $this->transactionFormFieldCacheService->getTransactionFormFieldByTypeId($request->input('transaction_type_id'));
        return $this->return_success(TransactionFormFieldResource::collection($transactionFormFields));
    }
}
