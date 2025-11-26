<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserLoginRequest;
use App\Http\Requests\Api\Auth\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user_token = $user->createToken('User Personal Token')->accessToken;

        return $this->return_success(['user_token' => $user_token, 'user' => new UserResource($user)]);
    }

    public function login(UserLoginRequest $request)
    {
        $user = User::filter($request->only('phone'))->first();

        if (Hash::check($request->password, $user->password)) {
            $user_token = $user->createToken('User Personal Token')->accessToken;
            $user->update(['device_token' => $request->device_token]);

            return $this->return_success(['user_token' => $user_token, 'user' => new UserResource($user)]);
        }

        return $this->return_fail_message(trans('auth.failed'));
    }

    public function logout()
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update(['device_token' => null]);

        $user->tokens->each(function ($token) {
            $token->revoke();
        });

        return $this->return_success();
    }

    public function passwordReset(Request $request)
    {
        //
    }
}
