<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => 'required', 
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $validatedData['password'] = $request->password;

        User::create($validatedData);
        return response()->json(['message' => 'success']);

    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!$token = auth()->attempt($request->only('username','password')))
        {
            return response(null,401);
        }
        
        return response()->json(['token'=> $token]);
    }

    public function logout()
    {
        auth()->logout();
    }
}
