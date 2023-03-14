<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login authorized user
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\ResponseJson
     */
    public function login(Request $request)
    {
        $data = $request->validate(['email' => 'required', 'password' => 'required']);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            throw new \Illuminate\Auth\AuthenticationException;
        }
       
        return response()->json([
            'data' => $user,
            'token' => $user->createToken('*')->plainTextToken
        ]);
    }
}
