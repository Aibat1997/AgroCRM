<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionTypeResource;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function index(Request $request)
    {
        $transactionTypes = TransactionType::all();
        return $this->return_success(TransactionTypeResource::collection($transactionTypes));
    }
}
