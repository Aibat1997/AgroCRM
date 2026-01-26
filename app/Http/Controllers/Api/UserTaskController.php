<?php

namespace App\Http\Controllers\Api;

use App\DTO\UserTaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserTask\StoreUserTaskRequest;
use App\Http\Requests\Api\UserTask\UpdateUserTaskRequest;
use App\Http\Resources\UserTaskResource;
use App\Models\UserTask;
use App\Services\UserTaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTaskController extends Controller
{
    public function __construct(private readonly UserTaskService $userTaskService) {}

    public function index(Request $request)
    {
        $userTasks = UserTask::with(['author', 'user'])->filter($request->all())->paginate(15);
        return UserTaskResource::collection($userTasks)->additional(['success' => true]);
    }

    public function store(StoreUserTaskRequest $request)
    {
        $dto = UserTaskDTO::fromArray($request->validated());
        $userTask = $this->userTaskService->store($dto, Auth::id());

        return $this->return_success(new UserTaskResource($userTask));
    }

    public function show(UserTask $userTask)
    {
        return $this->return_success(new UserTaskResource($userTask));
    }

    public function update(UpdateUserTaskRequest $request, UserTask $userTask)
    {
        $dto = UserTaskDTO::fromArray($request->validated());
        $this->userTaskService->update($dto, $userTask);

        return $this->return_success(new UserTaskResource($userTask));
    }

    public function destroy(UserTask $userTask)
    {
        $userTask->delete();
        return $this->return_success();
    }

    public function restore(UserTask $userTask)
    {
        //
    }
}
