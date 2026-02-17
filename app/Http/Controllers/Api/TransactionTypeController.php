<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionType\TransactionTypeCollection;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        $transactionTypes = TransactionType::all();
        return new TransactionTypeCollection($transactionTypes);
    }
}
