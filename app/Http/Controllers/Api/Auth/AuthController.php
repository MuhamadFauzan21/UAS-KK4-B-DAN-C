<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        $user->save();

        $tokenresult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User Berhasil Dibuat',
            'access_token' => $tokenresult,
        ], 201);
    }

    public function login (Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials',
            ], 401);
        }

        $tokenresult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'User Berhasil Login',
            'access_token' => $tokenresult,
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User Berhasil Logout',
        ], 200);
    }
}
