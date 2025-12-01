<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = User::with(['company', 'role'])->filter($request->all())->paginate(15);
        return UserResource::collection($employees)->additional(['success' => true]);
    }

    public function store(StoreUserRequest $request)
    {
        $employee = User::create($request->validated());
        $employee->load('company');

        return $this->return_success(new UserResource($employee));
    }

    public function show(User $employee)
    {
        $employee->load('company');
        return $this->return_success(new UserResource($employee));
    }

    public function update(UpdateUserRequest $request, User $employee)
    {
        $data = array_filter($request->validated());
        $employee->update($data);
        $employee->load('company');

        return $this->return_success(new UserResource($employee));
    }

    public function destroy(User $employee)
    {
        $employee->delete();
        return $this->return_success();
    }

    public function restore(User $employee)
    {
        //
    }
}
