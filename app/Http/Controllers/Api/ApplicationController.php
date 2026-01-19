<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Application\StoreApplicationRequest;
use App\Http\Requests\Api\Application\UpdateApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = Application::with('user')->filter($request->all())->paginate(15);
        return ApplicationResource::collection($applications)->additional(['success' => true]);
    }

    public function store(StoreApplicationRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $application = $user->applications()->create($request->validated());

        return $this->return_success(new ApplicationResource($application->fresh()));
    }

    public function show(Application $application)
    {
        return $this->return_success(new ApplicationResource($application));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());
        return $this->return_success(new ApplicationResource($application->fresh()));
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return $this->return_success();
    }

    public function restore(Application $application)
    {
        //
    }
}
