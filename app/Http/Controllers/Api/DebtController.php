<?php

namespace App\Http\Controllers\Api;

use App\DTO\DebtDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Debt\DebtRequest;
use App\Http\Resources\DebtResource;
use App\Models\Debt;
use App\Services\DebtService;
use Illuminate\Http\Request;

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
