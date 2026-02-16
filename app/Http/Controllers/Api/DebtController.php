<?php

namespace App\Http\Controllers\Api;

use App\DTO\Debt\StoreDebtDTO;
use App\DTO\Debt\UpdateDebtDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Debt\StoreDebtRequest;
use App\Http\Requests\Api\Debt\UpdateDebtRequest;
use App\Http\Resources\DebtResource;
use App\Models\CottonPreparation;
use App\Models\Debt;
use App\Services\DebtService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DebtController extends Controller
{
    public function __construct(private readonly DebtService $debtService) {}

    public function index(Request $request)
    {
        $debts = Debt::with(['company', 'client'])->filter($request->all())->paginate(15);

        return DebtResource::collection($debts)->additional(['success' => true]);
    }

    public function store(StoreDebtRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto = StoreDebtDTO::fromArray($request->validated());
        $debt = $this->debtService->store($dto, $user);

        return $this->return_success(new DebtResource($debt));
    }

    public function show(Debt $debt)
    {
        return $this->return_success(new DebtResource($debt));
    }

    public function update(UpdateDebtRequest $request, Debt $debt)
    {
        Gate::authorize('update', $debt);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $dto = UpdateDebtDTO::fromArray($request->validated());
        $this->debtService->update($dto, $user, $debt);

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
