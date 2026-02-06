<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionFormFieldResource;
use App\Models\TransactionFormField;
use Illuminate\Http\Request;

class TransactionFormFieldController extends Controller
{
    public function index(Request $request)
    {
        $transactionFormFields = TransactionFormField::filter($request->all())->orderBy('sort_num')->get();
        return $this->return_success(TransactionFormFieldResource::collection($transactionFormFields));
    }
}
