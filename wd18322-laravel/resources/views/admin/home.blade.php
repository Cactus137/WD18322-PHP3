@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <div class="bg-white py-24 sm:py-32">
        <div class="grid grid-cols-4 gap-4 content-center">
            @foreach ($posts as $post)
                <div class="max-w-sm mx-5 rounded overflow-hidden shadow-lg p-6 bg-white">
                    <img class="w-full h-48 object-cover" src="{{ $post->imageUrl }}" alt="Image">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 me-5">
                            {{ $post->title }}
                        </div>
                        <div class="items-center">
                            <i class="fa-solid fa-eye"></i> ({{ $post->views }})
                        </div>
                        <p class="text-yellow-700 text-sm mb-4">
                            {{ $post->category->name }}
                        </p>
                        <p class="text-gray-700 text-base">
                            {{ $post->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
