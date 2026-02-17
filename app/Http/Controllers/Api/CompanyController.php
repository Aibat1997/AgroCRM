<?php

namespace App\Http\Controllers\Api;

use App\DTO\CompanyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\StoreCompanyRequest;
use App\Http\Requests\Api\Company\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyCollection;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\EmptyResource;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private readonly CompanyService $companyService) {}

    public function index(Request $request)
    {
        $companies = Company::with('childs')->whereNull('parent_id')->get();
        return new CompanyCollection($companies);
    }

    public function store(StoreCompanyRequest $request)
    {
        $dto = CompanyDTO::fromArray($request->validated());
        $company = $this->companyService->store($dto);

        return new CompanyResource($company);
    }

    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $dto = CompanyDTO::fromArray($request->validated());
        $this->companyService->update($dto, $company);

        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return EmptyResource::success();
    }

    public function restore(Company $company)
    {
        //
    }
}
