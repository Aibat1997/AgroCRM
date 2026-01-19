<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RealEstate\StoreRealEstateRequest;
use App\Http\Requests\Api\RealEstate\UpdateRealEstateRequest;
use App\Http\Resources\RealEstateResource;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function index(Request $request)
    {
        $realEstates = RealEstate::filter($request->all())->paginate(15);
        return RealEstateResource::collection($realEstates)->additional(['success' => true]);
    }

    public function store(StoreRealEstateRequest $request)
    {
        $realEstate = RealEstate::create($request->validated());
        return $this->return_success(new RealEstateResource($realEstate));
    }

    public function show(RealEstate $realEstate)
    {
        return $this->return_success(new RealEstateResource($realEstate));
    }

    public function update(UpdateRealEstateRequest $request, RealEstate $realEstate)
    {
        $realEstate->update($request->validated());
        return $this->return_success(new RealEstateResource($realEstate));
    }

    public function destroy(RealEstate $realEstate)
    {
        $realEstate->delete();
        return $this->return_success();
    }

    public function restore(RealEstate $realEstate)
    {
        //
    }
}
