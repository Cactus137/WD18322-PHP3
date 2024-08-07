@extends('layouts.app')

@section('title', 'Profile')

@section('content')

    <div class="py-10 flex flex-col items-center justify-center">
        
        <div class="m-10 max-w-sm" style="width: 500px">
            <div class="rounded-lg border bg-white px-4 pt-8 pb-6 shadow-lg">
                <div class="relative mx-auto w-36 rounded-full">
                    <img class="mx-auto h-auto w-full rounded-full"
                        src="{{ asset('storage/avatars/' . $user->avatar) }}" />
                </div>
                <h1 class="my-1 text-center text-xl font-bold leading-8 text-gray-900">
                    {{ $user->fullname ? $user->fullname : '...' }}</h1>
                <h3 class="font-lg text-semibold text-center leading-6 text-gray-600">{{ '@' . $user->username }}</h3>
                <ul
                    class="mt-3 divide-y rounded bg-gray-100 py-2 px-3 text-gray-600 shadow-sm hover:text-gray-700 hover:shadow">
                    <li class="flex items-center py-3 text-sm">
                        <span>Status</span>
                        @if ($user->active == 1)
                            <span class="ml-auto"><span
                                    class="rounded-full bg-green-200 py-1 px-2 text-xs font-medium text-green-700">Active</span></span>
                        @else
                            <span class="ml-auto"><span
                                    class="rounded-full bg-red-200 py-1 px-2 text-xs font-medium text-red-700">Inactive</span></span>
                        @endif
                    </li>
                    <li class="flex items-center py-3 text-sm">
                        <span>Role</span>
                        @if ($user->role == 'admin')
                            <span class="ml-auto"><span
                                    class="rounded-full bg-blue-200 py-1 px-2 text-xs font-medium text-blue-700">Admin</span></span>
                        @else
                            <span class="ml-auto"><span
                                    class="rounded-full bg-yellow-200 py-1 px-2 text-xs font-medium text-yellow-700">User</span></span>
                        @endif
                    </li>
                    <li class="flex items-center py-3 text-sm">
                        <span>Email</span>
                        <span class="ml-auto">{{ $user->email }}</span>
                    </li>
                </ul>
                <a href="{{ route('changeProfile') }}"
                    class="mt-10 inline-flex w-full items-center justify-center rounded-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Cập nhật thông tin
                </a>
                <a href="{{ route('changePassword') }}"
                    class="mt-3 inline-flex w-full items-center justify-center rounded-lg text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    Đổi mật khẩu
                </a>
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('users') }}"
                            class="mt-3 inline-flex w-full items-center justify-center rounded-lg text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                            Danh sách người dùng
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
