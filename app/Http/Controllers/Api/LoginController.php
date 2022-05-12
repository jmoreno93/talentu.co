<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:90',
            'password' => 'required|max:30',
        ]);
        if(Auth::attempt($request->only('email', 'password')))
        {
            return response()->json([
                'token' => $request->user()->createToken($request->email)->plainTextToken,
                'message' => 'Success',
            ], 200);
        }
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }
}
