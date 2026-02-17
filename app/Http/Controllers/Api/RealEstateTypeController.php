<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RealEstateType\RealEstateTypeCollection;
use App\Models\RealEstateType;
use Illuminate\Http\Request;

class RealEstateTypeController extends Controller
{
    public function index(Request $request)
    {
        $realEstateTypes = RealEstateType::all();
        return new RealEstateTypeCollection($realEstateTypes);
    }
}
