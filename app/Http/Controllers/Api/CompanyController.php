<?php

namespace App\Http\Controllers\Api;

use App\DTO\CompanyDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\StoreCompanyRequest;
use App\Http\Requests\Api\Company\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private readonly CompanyService $companyService) {}

    public function index(Request $request)
    {
        $companies = Company::with('childs')->whereNull('parent_id')->get();
        return $this->return_success(CompanyResource::collection($companies));
    }

    public function store(StoreCompanyRequest $request)
    {
        $dto = CompanyDTO::fromArray($request->validated());
        $company = $this->companyService->store($dto);

        return $this->return_success(new CompanyResource($company));
    }

    public function show(Company $company)
    {
        return $this->return_success(new CompanyResource($company));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $dto = CompanyDTO::fromArray($request->validated());
        $this->companyService->update($dto, $company);

        return $this->return_success(new CompanyResource($company));
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return $this->return_success();
    }

    public function restore(Company $company)
    {
        //
    }
}
