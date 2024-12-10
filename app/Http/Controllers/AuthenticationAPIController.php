<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;

class AuthenticationAPIController extends Controller
{
    function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Mail::to($request->email)->send(new WelcomeMail($request->name));

        return response('User registered succesfully', 201);
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'    
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check( $request->password, $user->password ) ) {
            return response('Invalid credentials, unable to login.', 400);
        }

        return response($user->createToken($user->email)->plainTextToken, 201);
    }

    function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response('Logout success', 201);
    }
}
