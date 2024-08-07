<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credential)) {
            $request->session()->put('user', $credential);
            return back()->with('success', 'Login Successfully!');
        }

        return back()->with('error', 'Failed');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(RegisterRequest $request)
    {

        $dataCreate = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if (User::create($dataCreate)) {
            return back()->with('success', 'Register Successfully!');
        }

        return back()->with('error', 'Failed');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
