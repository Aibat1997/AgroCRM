<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionFormFieldResource;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionFormFieldController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'transaction_type_id' => 'required|integer|exists:transaction_types,id',
        ]);

        $transactionType = TransactionType::with('formFields')->find($request->input('transaction_type_id'));
        return $this->return_success(TransactionFormFieldResource::collection($transactionType->formFields));
    }
}
