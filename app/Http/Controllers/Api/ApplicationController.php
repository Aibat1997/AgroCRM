<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRoleId;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Application\StoreApplicationRequest;
use App\Http\Requests\Api\Application\UpdateApplicationRequest;
use App\Http\Resources\Application\ApplicationCollection;
use App\Http\Resources\Application\ApplicationResource;
use App\Http\Resources\EmptyResource;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->role_id === UserRoleId::OWNER->value) {
            $applications = Application::with('author')->filter($request->all())->paginate(15);
        } else {
            $applications = Application::with('author')->where('author_id', $user->id)->paginate(15);
        }

        return new ApplicationCollection($applications);
    }

    public function store(StoreApplicationRequest $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $application = $user->applications()->create($request->validated());

        return new ApplicationResource($application->fresh());
    }

    public function show(Application $application)
    {
        return new ApplicationResource($application);
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());
        return new ApplicationResource($application->fresh());
    }

    public function destroy(Application $application)
    {
        $application->delete();
        return EmptyResource::success();
    }

    public function restore(Application $application)
    {
        //
    }
}
