@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="py-10 flex flex-col items-center justify-center">
        <div class="w-screen px-5 relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 my-5 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-4">
                            ID
                        </th>
                        <th scope="col" class="py-4">
                            Image
                        </th>
                        <th scope="col" class="py-4">
                            Username
                        </th>
                        <th scope="col" class="py-4">
                            Fullname
                        </th>
                        <th scope="col" class="py-4">
                            Email
                        </th>
                        <th scope="col" class="py-4">
                            Role
                        </th>
                        <th scope="col" class="py-4">
                            Status
                        </th>
                        <th scope="col" class="py-4">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th class="py-4">
                                {{ $user->id }}
                            </th>
                            <td class="py-4">
                                <div class="flex items center">
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                        alt="">
                                </div>
                            </td>
                            <td class="py-4">
                                {{ $user->username }}
                            </td>
                            <td class="py-4">
                                {{ $user->fullname }}
                            </td>
                            <td class="py-4">
                                {{ $user->email }}
                            </td>
                            <td class="py-4">
                                @if ($user->role == 'admin')
                                    <span
                                        class="rounded-full bg-blue-200 py-1 px-2 text-xs font-medium text-blue-700">Admin</span>
                                @else
                                    <span
                                        class="rounded-full bg-yellow-200 py-1 px-2 text-xs font-medium text-yellow-700">Member</span>
                                @endif
                            </td>
                            <td class="py-4">
                                @if ($user->active == 1)
                                    <span class="ml-auto"><span
                                            class="rounded-full bg-green-200 py-1 px-2 text-xs font-medium text-green-700">Active</span></span>
                                @else
                                    <span class="ml-auto"><span
                                            class="rounded-full bg-red-200 py-1 px-2 text-xs font-medium text-red-700">Inactive</span></span>
                                @endif
                            </td>
                            <td class="py-4" style="width: 300px">
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links(), ['pagination::tailwind'] }}
        </div>
    </div>
@endsection
