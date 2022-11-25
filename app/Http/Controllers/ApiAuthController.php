<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        $response = [
            'user' => $request->all(),
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $user = User::firstWhere('email', $request->email);
        if ($user != null && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('api-token')->plainTextToken;
            return response([
                'user' => $user->email,
                'token' => $token
            ]);
        }
        return "Invalid credentials!!";
    }

    public function logout()
    {
        auth('sanctum')->user()->tokens()->delete();
        return "Logged out!!";
    }
}
