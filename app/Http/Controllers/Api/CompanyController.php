<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
