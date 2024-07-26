@extends('layouts.layout')

@section('title', $title)

@section('content')
    <div class="bg-white">
        <div>
            <main class="mx-auto max-w-2xl py-5 sm:py-10 lg:max-w-7xl">
                <div class="border-b border-gray-200 pb-5">
                </div>
                <div class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                    <aside>
                        <div class="hidden lg:block">
                            <div class="space-y-10 divide-y divide-gray-200">
                                <fieldset>
                                    <legend class="block text-base font-bold text-gray-900">Filter</legend>
                                    <div class="mt-2 relative z-10">
                                        <ul
                                            class="mt-2 mx-auto max-w-xs text-left font-medium text-lg leading-none border-blue-200 divide-y divide-blue-200">
                                            <li>
                                                <a class="py-3.5 w-full flex items-center text-black-500 hover:text-black-700 hover:bg-blue-50"
                                                    href="{{ route('8ps.highest') }}">
                                                    <span class="mr-2.5 w-1 h-7 bg-blue-500 rounded-r-md"></span>
                                                    8ps with the highest price
                                                </a>
                                            </li>
                                            <li>
                                                <a class="py-3.5 w-full flex items-center text-black-500 hover:text-black-700 hover:bg-blue-50"
                                                    href="{{ route('8ps.lowest') }}">
                                                    <span class="mr-2.5 w-1 h-7 bg-blue-500 rounded-r-md"></span>
                                                    8ps with the lowest
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="space-y-10 divide-y divide-gray-200 mt-5">
                                <fieldset>
                                    <legend class="block text-base font-bold text-gray-900">Category</legend>
                                    <div class="mt-2 relative z-10">
                                        <ul
                                            class="mt-2 mx-auto max-w-xs text-left font-medium text-lg leading-none border-blue-200 divide-y divide-blue-200">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a class="py-3.5 w-full flex items-center text-black-500 hover:text-black-700 hover:bg-blue-50"
                                                        href="{{ route('category', $category->id) }}">
                                                        <span class="mr-2.5 w-1 h-7 bg-blue-500 rounded-r-md"></span>
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </aside>
                    <!-- Product grid -->
                    <div class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                        <section id="Projects"
                            class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mb-5">
                            @foreach ($books as $book)
                                <div
                                    class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                                    <a href="{{ route('detail', $book->id) }}">
                                        <img src="{{ $book->thumbnail }}" alt="Product"
                                            class="h-80 w-72 object-cover rounded-t-xl" />
                                        <div class="px-4 py-3 w-72">
                                            <span class="text-gray-400 mr-3 uppercase text-xs">{{ $book->author }}</span>
                                            <p class="text-lg font-bold text-black truncate block capitalize">
                                                {{ $book->title }}</p>
                                            <div class="flex items-center">
                                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                                <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-bag-plus"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                                        <path
                                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                                    </svg></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
