@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="py-10 flex flex-col items-center justify-center">
        <div class="m-10 max-w-sm" style="width: 500px">
            @session('success')
                <div id="toast-success"
                    class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">
                        {{ session('success') }}
                    </div>
                </div>
            @endsession
            @session('error')
                <div id="toast-danger"
                    class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">
                        {{ session('error') }}
                    </div>
                </div>
            @endsession
            <div class="rounded-lg border bg-white px-4 pt-8 pb-6 shadow-lg">
                <div class="relative mx-auto w-36 rounded-full">
                    <img class="mx-auto h-auto w-full rounded-full" src="{{ asset('storage/avatars/' . $user->avatar) }}" />
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

                <form class="max-w-sm mx-auto mt-5" method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    <label for="active"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="active" name="active"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($statues as $status)
                            <option value="{{ $status['id'] }}" {{ $status['id'] == $user->active ? 'selected' : '' }}>
                                {{ $status['name'] }}</option>
                        @endforeach
                    </select>

                    <button type="submit"
                        class="mt-5 inline-flex w-full items-center justify-center rounded-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Cập nhật
                    </button>
                    <a href="{{ route('users') }}"
                        class="mt-5 inline-flex w-full items-center justify-center rounded-lg text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                        Hủy
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
