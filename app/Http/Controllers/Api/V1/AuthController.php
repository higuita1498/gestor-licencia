<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('UserName', $request->UserName)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'UserName' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }


    public function register(Request $request)
    {
        $request->validate([
            'UserName' => 'required|string|unique:users,UserName',
            'UserContactNumber' => 'required|integer|unique:users,UserContactNumber',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'UserName' => $request->UserName,
            'UserContactNumber' => $request->UserContactNumber,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $request->user()->createToken('auth_token')->plainTextToken;
    }
}
