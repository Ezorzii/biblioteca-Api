<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        try {
            $user = User::query()->where('email', $request['email'])->first();
            $token = $user->createToken($user->name);
            return response()->json($token, 200);
        } catch (Exception $e) {
            return response()->json([], 400);
        }
    }

    public function logout(): JsonResponse
    {
        current_user()->tokens()->delete();
        return response()->json([], 200);
    }
}
