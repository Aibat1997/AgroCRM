<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseResource;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(Request $request)
    {
        $warehouses = Warehouse::with('company')->filter($request->all())->get();
        return $this->return_success(WarehouseResource::collection($warehouses));
    }
}
