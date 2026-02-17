<?php

namespace App\Http\Controllers\Api;

use App\DTO\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Requests\Api\User\UpdateUserRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(private readonly UserService $userService) {}

    public function index(Request $request)
    {
        $employees = User::with(['company', 'role'])->filter($request->all())->paginate(15);
        return new UserCollection($employees);
    }

    public function store(StoreUserRequest $request)
    {
        $dto = UserDTO::fromArray($request->validated());
        $employee = $this->userService->store($dto);
        $employee->load('company');

        return new UserResource($employee);
    }

    public function show(User $employee)
    {
        $employee->load('company');
        return new UserResource($employee);
    }

    public function update(UpdateUserRequest $request, User $employee)
    {
        $dto = UserDTO::fromArray($request->validated());
        $this->userService->update($dto, $employee);
        $employee->load('company');

        return new UserResource($employee);
    }

    public function destroy(User $employee)
    {
        $employee->delete();
        return EmptyResource::success();
    }

    public function restore(User $employee)
    {
        //
    }
}
