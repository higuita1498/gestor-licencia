<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {

        $user = User::where('UserName', $request->UserName)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Las credenciales proporcionadas no son correctas',
            ], 422));
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }


    public function register(RegisterRequest $request)
    {
       
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
        return response()->json([
            'user' => $request->user(),
            'token' => $request->bearerToken(),
        ]);
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
