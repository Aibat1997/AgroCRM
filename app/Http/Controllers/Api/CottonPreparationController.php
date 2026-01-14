<?php

namespace App\Http\Controllers\Api;

use App\DTO\CottonPreparationLaboratorianDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CottonPreparation\StoreLaboratorianDataRequest;
use App\Http\Requests\Api\CottonPreparation\StoreWeigherDataRequest;
use App\Http\Resources\CottonPreparationResource;
use App\Models\CottonPreparation;
use App\Services\CottonPreparationService;
use Illuminate\Http\Request;

class CottonPreparationController extends Controller
{
    public function index(Request $request)
    {
        $cottonPreparations = CottonPreparation::with(['weigher', 'laboratorian'])->filter($request->all())->paginate(15);
        return CottonPreparationResource::collection($cottonPreparations)->additional(['success' => true]);
    }

    public function storeWeigherData(StoreWeigherDataRequest $request)
    {
        $dto = CottonPreparationWeigherDTO::fromArray($request->validated());
        $weigherData = CottonPreparationService::storeWeigherData($dto);

        return $this->return_success(new CottonPreparationResource($weigherData));
    }

    public function storeLaboratorianData(StoreLaboratorianDataRequest $request, CottonPreparation $cottonPreparation)
    {
        $dto = CottonPreparationLaboratorianDTO::fromArray($request->validated());
        $laboratorianData = CottonPreparationService::storeLaboratorianData($dto, $cottonPreparation);

        return $this->return_success(new CottonPreparationResource($laboratorianData));
    }

    public function show(CottonPreparation $cottonPreparation)
    {
        return $this->return_success(new CottonPreparationResource($cottonPreparation));
    }

    public function update(Request $request, CottonPreparation $cottonPreparation)
    {
        //
    }

    public function destroy(CottonPreparation $cottonPreparation)
    {
        //
    }
}
