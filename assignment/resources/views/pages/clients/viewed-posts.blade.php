@extends('layouts.layout-client')

@section('title', 'Tin tức đã xem')


@section('content')
    <!-- block news -->
    <div class="bg-white py-6 min-h-screen">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Tin đã xem
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($listPosts as $post) 
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$post->category->slug, $post->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ asset('uploads/posts/' . $post->thumbnail) }}" />
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a href="{{ route('post', [$post->category->slug, $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1 new-content-limit">
                                            {{ $post->content }}
                                        </p>
                                        <a class="text-gray-500" href="#">
                                            <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                            {{ $post->category->slug }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
