<?php

namespace App\Http\Controllers\Api;

use App\DTO\RealEstateDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RealEstate\StoreRealEstateRequest;
use App\Http\Requests\Api\RealEstate\UpdateRealEstateRequest;
use App\Http\Resources\RealEstateResource;
use App\Models\RealEstate;
use App\Services\RealEstateService;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function __construct(private readonly RealEstateService $realEstateService) {}

    public function index(Request $request)
    {
        $realEstates = RealEstate::filter($request->all())->paginate(15);
        return RealEstateResource::collection($realEstates)->additional(['success' => true]);
    }

    public function store(StoreRealEstateRequest $request)
    {
        $dto = RealEstateDTO::fromArray($request->validated());
        $realEstate = $this->realEstateService->store($dto);

        return $this->return_success(new RealEstateResource($realEstate));
    }

    public function show(RealEstate $realEstate)
    {
        return $this->return_success(new RealEstateResource($realEstate));
    }

    public function update(UpdateRealEstateRequest $request, RealEstate $realEstate)
    {
        $dto = RealEstateDTO::fromArray($request->validated());
        $this->realEstateService->update($dto, $realEstate);

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
