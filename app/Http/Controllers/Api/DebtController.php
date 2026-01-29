<?php

namespace App\Http\Controllers\Api;

use App\DTO\DebtDTO;
use App\Enums\DebtStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Debt\DebtRequest;
use App\Http\Resources\DebtResource;
use App\Models\CottonPreparation;
use App\Models\Debt;
use App\Services\DebtService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DebtController extends Controller
{
    public function __construct(private readonly DebtService $debtService) {}

    public function index(Request $request)
    {
        $debts = Debt::with(['company', 'client'])->filter($request->all())->paginate(15);
        return DebtResource::collection($debts)->additional(['success' => true]);
    }

    public function store(DebtRequest $request)
    {
        $dto = DebtDTO::fromArray($request->validated());
        $debt = $this->debtService->store($dto);

        return $this->return_success(new DebtResource($debt));
    }

    public function show(Debt $debt)
    {
        return $this->return_success(new DebtResource($debt));
    }

    public function update(DebtRequest $request, Debt $debt)
    {
        $dto = DebtDTO::fromArray($request->validated());
        $this->debtService->update($dto, $debt);

        return $this->return_success(new DebtResource($debt));
    }

    public function updateStatus(Request $request, Debt $debt)
    {
        $request->validate([
            'status' => ['required', 'string', Rule::enum(DebtStatus::class)],
        ]);

        $debt->update(['status' => $request->input('status')]);

        return $this->return_success(new DebtResource($debt));
    }

    public function payingWithCotton(Request $request)
    {
        $request->validate([
            'cotton_preparation_id' => 'required|integer|exists:cotton_preparations,id',
        ]);

        $cottonPreparation = CottonPreparation::find($request->input('cotton_preparation_id'));
        $debtInfo = $this->debtService->getDebtPayingWithCottonInfo($cottonPreparation);

        return $this->return_success(['debtInfo' => $debtInfo]);
    }

    public function destroy(Debt $debt)
    {
        $debt->delete();
        return $this->return_success();
    }

    public function restore(Debt $debt)
    {
        //
    }
}
