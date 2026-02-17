<?php

namespace App\Http\Controllers\Api;

use App\DTO\CreditDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Credit\CreditRequest;
use App\Http\Resources\Credit\CreditCollection;
use App\Http\Resources\Credit\CreditResource;
use App\Http\Resources\EmptyResource;
use App\Models\Credit;
use App\Services\CreditService;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function __construct(private readonly CreditService $creditService) {}

    public function index(Request $request)
    {
        $credits = Credit::filter($request->all())->paginate(15);
        return new CreditCollection($credits);
    }

    public function store(CreditRequest $request)
    {
        $dto = CreditDTO::fromArray($request->validated());
        $credit = $this->creditService->store($dto);

        return new CreditResource($credit);
    }

    public function show(Credit $credit)
    {
        return new CreditResource($credit);
    }

    public function update(CreditRequest $request, Credit $credit)
    {
        //
    }

    public function destroy(Credit $credit)
    {
        $credit->delete();
        return EmptyResource::success();
    }

    public function restore(Credit $credit)
    {
        //
    }
}
