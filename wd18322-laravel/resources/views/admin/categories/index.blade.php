@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td scope="row" class="text-center px-6 py-4">
                            {{ $category->id }}
                        </td>
                        <td class="text-center px-6 py-4 flex justify-center">
                            <img src="{{ $category->imageUrl }}" class="w-16 md:w-32 max-w-full max-h-full">
                        </td>
                        <td class="text-center px-6 py-4">
                            {{ $category->name }}
                        </td>
                        <td class="text-center px-6 py-4">
                            <a href="#"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</a>
                            <a href="#"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
