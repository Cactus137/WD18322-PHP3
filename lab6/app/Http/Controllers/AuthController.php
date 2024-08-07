<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function register()
    {
        return view('auths.register');
    }

    public function loginPost(Request $request)
    {
        // Validate the form data
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu',
            ]
        );
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Check if user is active
            if ($user->active != 1) {
                auth()->logout(); // Logout the user immediately
                return redirect()->route('login')->with('error', 'Tài khoản của bạn đã bị khóa');
            }

            // Put the user in the session and redirect to profile
            session()->put('user', $user);
            return redirect()->route('profile');
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function registerPost(Request $request)
    {
        // Validate the form data
        $request->validate(
            [
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            ]
        );

        $data = $request->only('username', 'email', 'password');
        $data['password'] = bcrypt($data['password']);

        User::create($data);
        return redirect()->route('login');
    }

    public function forgot()
    {
        return view('auths.forgot-password');
    }

    public function logout()
    {
        auth()->logout();
        session()->forget('user');
        return redirect()->route('login');
    }
}
