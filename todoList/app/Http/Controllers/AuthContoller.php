<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Http\Requests\LoginRequest;

class AuthContoller extends Controller
{
    public function login(LoginRequest $request){

        $input = $request -> validated();
        $credentials = [
            'email' => $input ['email'],
            'password' => $input ['password']
        ];

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);    }
}
