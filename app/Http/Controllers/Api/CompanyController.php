<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\StoreCompanyRequest;
use App\Http\Requests\Api\Company\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $parents_id = Company::whereNotNull('parent_id')->pluck('parent_id')->toArray();
        $companies = Company::whereNotIn('id', $parents_id)->get();

        return $this->return_success(CompanyResource::collection($companies));
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return $this->return_success(new CompanyResource($company));
    }

    public function show(Company $company)
    {
        return $this->return_success(new CompanyResource($company));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
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
