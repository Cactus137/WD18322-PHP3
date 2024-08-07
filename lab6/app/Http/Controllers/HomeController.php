<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('pages.profile', compact('user'));
    }

    public function changeProfile()
    {
        $user = auth()->user();
        return view('pages.change-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        // Validate unique email and username
        $request->validate(
            [
                'username' => 'required|unique:users,username,' . auth()->id(),
                'email' => 'required|email|unique:users,email,' . auth()->id(),
            ],
            [
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
            ]
        );

        $user = auth()->user();

        $data = $request->except('avatar');
        $data['avatar'] = $user->avatar;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            // time _ file name
            $fileName = time() . '_' . $file->getClientOriginalName();
            // move storage
            $file->storeAs('public/avatars', $fileName);
            $data['avatar'] = $fileName;
            // delete old avatar if exists
            if ($user->avatar && file_exists(storage_path('app/public/avatars/' . $user->avatar))) {
                unlink(storage_path('app/public/avatars/' . $user->avatar));
            }
        }

        $user->update($data);
        return redirect()->route('profile');
    }

    public function changePassword()
    {
        return view('pages.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|min:6',
            ],
            [
                'old_password.required' => 'Vui lòng nhập mật khẩu cũ',
                'password.required' => 'Vui lòng nhập mật khẩu mới',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'password.confirmed' => 'Mật khẩu xác nhận không đúng',
            ]
        );

        $user = auth()->user();
        if (password_verify($request->old_password, $user->password)) {
            $user->update(['password' => bcrypt($request->password)]);
            return back()->with('success', 'Đổi mật khẩu thành công');
        }

        return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
    }


}
