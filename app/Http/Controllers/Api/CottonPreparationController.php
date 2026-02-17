<?php

namespace App\Http\Controllers\Api;

use App\DTO\CottonPreparationLaboratorianDTO;
use App\DTO\CottonPreparationWeigherDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CottonPreparation\StoreLaboratorianDataRequest;
use App\Http\Requests\Api\CottonPreparation\StoreWeigherDataRequest;
use App\Http\Resources\CottonPreparation\CottonPreparationCollection;
use App\Http\Resources\CottonPreparation\CottonPreparationResource;
use App\Models\CottonPreparation;
use App\Services\CottonPreparationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CottonPreparationController extends Controller
{
    public function __construct(private readonly CottonPreparationService $cottonPreparationService) {}

    public function index(Request $request)
    {
        $cottonPreparations = CottonPreparation::with(['weigher', 'laboratorian', 'client'])->filter($request->all())->paginate(15);
        return new CottonPreparationCollection($cottonPreparations);
    }

    public function storeWeigherData(StoreWeigherDataRequest $request)
    {
        $dto = CottonPreparationWeigherDTO::fromArray($request->validated());
        $weigherData = $this->cottonPreparationService->storeWeigherData($dto, Auth::id());

        return new CottonPreparationResource($weigherData);
    }

    public function storeLaboratorianData(StoreLaboratorianDataRequest $request, CottonPreparation $cottonPreparation)
    {
        $dto = CottonPreparationLaboratorianDTO::fromArray($request->validated());
        $laboratorianData = $this->cottonPreparationService->storeLaboratorianData($dto, $cottonPreparation, Auth::id());

        return new CottonPreparationResource($laboratorianData);
    }

    public function show(CottonPreparation $cottonPreparation)
    {
        return new CottonPreparationResource($cottonPreparation);
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
