<?php

namespace App\Http\Controllers\Api;

use App\DTO\UserTaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserTask\StoreUserTaskRequest;
use App\Http\Requests\Api\UserTask\UpdateUserTaskRequest;
use App\Http\Resources\EmptyResource;
use App\Http\Resources\UserTask\UserTaskCollection;
use App\Http\Resources\UserTask\UserTaskResource;
use App\Models\UserTask;
use App\Services\UserTaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserTaskController extends Controller
{
    public function __construct(private readonly UserTaskService $userTaskService) {}

    public function index(Request $request)
    {
        $userTasks = UserTask::with(['author', 'executor'])->filter($request->all())->paginate(15);
        return new UserTaskCollection($userTasks);
    }

    public function store(StoreUserTaskRequest $request)
    {
        $dto = UserTaskDTO::fromArray($request->validated());
        $userTask = $this->userTaskService->store($dto, Auth::id());

        return new UserTaskResource($userTask);
    }

    public function show(UserTask $userTask)
    {
        return new UserTaskResource($userTask);
    }

    public function update(UpdateUserTaskRequest $request, UserTask $userTask)
    {
        Gate::authorize('update', $userTask);
        $dto = UserTaskDTO::fromArray($request->validated());
        $this->userTaskService->update($dto, $userTask);

        return new UserTaskResource($userTask);
    }

    public function destroy(UserTask $userTask)
    {
        Gate::authorize('delete', $userTask);
        $userTask->delete();

        return EmptyResource::success();
    }

    public function restore(UserTask $userTask)
    {
        //
    }
}
