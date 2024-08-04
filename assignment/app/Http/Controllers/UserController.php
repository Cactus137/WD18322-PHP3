<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use App\Models\UserGender;
use App\Models\UserRoles;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $currentRoute;

    public function __construct()
    {
        $this->currentRoute = 'admin.user';
        view()->share('currentRoute', $this->currentRoute);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admins.users.list', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $genders = UserGender::all();
        $roles = UserRoles::all();
        $statuses = UserStatus::all();
        return view('pages.admins.users.edit', compact('user', 'genders', 'roles', 'statuses'));
    }

    public function update(EditProfileRequest $request, $id)
    {
        $user = User::find($id);
        // dd($request->all());

        $data = $request->except('avatar');
        $data['avatar'] = $user->avatar;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/users'), $fileName);
            $data['avatar'] = $fileName;

            // Delete user's old avatar
            if ($user->avatar && file_exists(public_path('uploads/users/' . $user->avatar))) {
                unlink(public_path('uploads/users/' . $user->avatar));
            }
        }

        $user->update($data);
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);

        // Check if $user is the currently authenticated user
        if ($user->id === Auth::user()->id) {
            return redirect()->route('admin.users')->with('error', 'You cannot delete yourself');
        }
        if ($user->delete()) {
            // Delete user's avatar
            if ($user->avatar && file_exists(public_path('uploads/users/' . $user->avatar))) {
                unlink(public_path('uploads/users/' . $user->avatar));
            }
            return redirect()->route('admin.users')->with('success', 'User deleted successfully');
        }

        return redirect()->route('admin.users')->with('error', 'User could not be deleted');
    }
}
