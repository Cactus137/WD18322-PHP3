@extends('layouts.layout')

@section('title', 'Detail')
@section('content')
    <div class="bg-white">
        <main class="mx-auto max-w-2xl py-5 sm:py-10 lg:max-w-7xl">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="{{ $book->thumbnail }}">
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-5">{{ $book->title }}</h2>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Author: </span>{{ $book->author }}
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Publisher:
                        </span>{{ $book->publisher }}
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Date:
                        </span>{{ $book->publication }}
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Quantity:
                        </span>{{ $book->quantity }}
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Category:
                        </span>
                        @php
                            $category = DB::select('select * from categories where id = ?', [$book->category_id])[0];
                        @endphp
                        {{ $category->name }}
                    </div>
                    <div class="mb-2">
                        <span class="font-bold text-gray-700 dark:text-gray-300 pe-3">Price:
                        </span>
                        ${{ $book->price }}
                    </div>
                    <div class="flex -mx-2 mb-4 mt-10">
                        <div class="w-1/2 px-2">
                            <button
                                class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add
                                to Cart</button>
                        </div>
                        <div class="w-1/2 px-2">
                            <button
                                class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add
                                to Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
            <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
                <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-md text-center">
                        <h2 class="font-serif text-2xl font-bold sm:text-3xl">
                            Related Books
                        </h2>
                    </div>

                    <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-16">
                        @foreach ($relatedBooks as $book)
                            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
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
                    </div>
                </div>
            </section>
        </main>
    </div>

@endsection
