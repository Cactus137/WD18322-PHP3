<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('pages.users', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $statues = [
            [
                'id' => 0,
                'name' => 'Inactive'
            ], 
            [
                'id' => 1,
                'name' => 'Active'
            ]
        ];
        return view('pages.edit', compact('user', 'statues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->active = $request->active;

        if ($user->id == Auth::user()->id) {
            return back()->with('error', 'Bạn không thể cập nhật tài khoản của chính mình');
        }

        if ($user->save()) {
            return back()->with('success', 'Cập nhật tài khoản thành công');
        }
        return back()->with('error', 'Cập nhật tài khoản thất bại');
    }
}
