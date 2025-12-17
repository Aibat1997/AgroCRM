<?php

namespace App\Http\Controllers\Api;

use App\DTO\LaboratoryCalculationDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Laboratory\LaboratoryCalculationRequest;
use App\Http\Resources\LaboratoryCalculationResource;
use App\Models\LaboratoryCalculation;
use App\Services\LaboratoryCalculationService;
use Illuminate\Http\Request;

class LaboratoryCalculationController extends Controller
{
    public function index(Request $request)
    {
        $laboratoryCalculations = LaboratoryCalculation::with('user')->filter($request->all())->paginate(15);
        return LaboratoryCalculationResource::collection($laboratoryCalculations)->additional(['success' => true]);
    }

    public function store(LaboratoryCalculationRequest $request)
    {
        $dto = LaboratoryCalculationDTO::fromArray($request->validated());
        $laboratoryCalculation = LaboratoryCalculationService::storeCalculation($dto);

        return $this->return_success(new LaboratoryCalculationResource($laboratoryCalculation));
    }

    public function show(LaboratoryCalculation $laboratoryCalculation)
    {
        return $this->return_success(new LaboratoryCalculationResource($laboratoryCalculation));
    }

    public function update(LaboratoryCalculationRequest $request, LaboratoryCalculation $laboratoryCalculation)
    {
        $dto = LaboratoryCalculationDTO::fromArray($request->validated());
        $laboratoryCalculation = LaboratoryCalculationService::updateCalculation($dto, $laboratoryCalculation);

        return $this->return_success(new LaboratoryCalculationResource($laboratoryCalculation));
    }

    public function destroy(LaboratoryCalculation $laboratoryCalculation)
    {
        $laboratoryCalculation->delete();
        return $this->return_success();
    }

    public function restore(LaboratoryCalculation $laboratoryCalculation)
    {
        //
    }
}
