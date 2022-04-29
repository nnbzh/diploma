<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Traits\IssuesToken;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use IssuesToken;

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->create($data);

        return new UserResource($user);
    }

    public function login(LoginRequest $request)
    {
        $tokens = $this->issueToken($request);
        $tokens = $this->decodeResponse($tokens);

        return new TokenResource($tokens);
    }

    public function logout(Request $request)
    {
        $user   = $request->user();
        $token  = $user->currentAccessToken();
        $token->revoke();
        app('Laravel\Passport\RefreshTokenRepository')->revokeRefreshTokensByAccessTokenId($token->id);

        return response()->noContent();
    }
}
