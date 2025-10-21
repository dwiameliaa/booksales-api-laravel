<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        // 2. cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 4. cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user,
            ], 201);
        }

        // 5. cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation failed'
        ], 409); // 409 artinya terjadi conflict
    }

    // login
    public function login(Request $request)
    {
        // 1. setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. get kredensial dari request
        $credentials = $request->only('email', 'password');

        // 4. cek isFailed
        if (!$token = auth()->guard('api')->attempt($credentials)) { // auth()->guard('api'), ini dari confid auth.php
            return response()->json([
                'success' => false,
                'message' => 'Your Email or Password is incorrect!!'
            ], 401);
        }

        // 5. cek isSuccess
        return response()->json([
            'success' => true,
            'message' => 'Login successfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
    }
}
