<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $isvalidated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $isvalidated['name'],
            'email' => $isvalidated['email'],
            'password' => Hash::make($isvalidated['password']),
        ]);

        $token = JWTAuth::fromUser($user);
        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $creds = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        if (!$token = JWTAuth::attempt($creds)) {
            return response()->json(['error' => 'Unauthorized access, please authorize'], 401);
        }

        $user = auth()->user();
        $userId = $user->id;
        return response()->json(compact('token', 'userId'));
    }
}
