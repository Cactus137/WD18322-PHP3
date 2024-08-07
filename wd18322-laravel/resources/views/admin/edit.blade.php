@extends('layouts.admin')

@section('title', 'Edit')

@section('content')
    <!-- component -->
    <section class="container p-6 mx-auto bg-sky-400 rounded-md shadow-md dark:bg-gray-800 mt-20">
        <div class="my-5">
            @session('success')
                <div id="toast-success"
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
                    class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
                    <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
                </div>
            @endsession
        </div>
        <h1 class="text-xl font-bold text-white capitalize dark:text-white">Create Post</h1>
        <form class="container m-5 mx-auto" action="{{ route('admin.posts.update', $post->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-white dark:text-gray-200" for="title">Title</label>
                        <input name="title" type="text" id="title" value="{{ $post->title }}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @error('title')
                            <p class="mb-3 mt-1 text-red-700 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-white dark:text-gray-200" for="description">Description</label>
                        <input name="description" type="text" id="description" value="{{ $post->description }}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        @error('description')
                            <p class="mb-3 mt-1 text-red-700 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-white dark:text-gray-200" for="category_id">Category</label>
                        <select name="category_id" id="category_id"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <option disabled>-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mb-3 mt-1 text-red-700 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-white">
                            Image
                        </label>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span class="">Image</span>
                                        <input id="file-upload" name="imageUrl" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1 text-white">or drag and drop</p>
                                </div>
                                <p class="text-xs text-white">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                        @error('imageUrl')
                            <p class="mb-3 mt-1 text-red-700 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="text-white dark:text-gray-200" for="content">Content</label>
                    <textarea name="content" type="textarea" rows="7" id="content"
                        class="block w-full p-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                        {{ $post->content }}
                    </textarea>
                    @error('content')
                        <p class="mb-3 mt-1 text-red-700 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

            <div class="flex justify-end mt-6">
                <button type="submit"
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
@endsection
