@extends('layouts.layout-client')

@section('title', $category->name)
@section('content')
    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            {{ $category->name }}
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($listNews->take(6) as $news)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ asset('uploads/posts/' . $news->thumbnail) }}" />
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                                {{ $news->title }}
                                            </a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1 new-content-limit">
                                            {{ $news->content }}
                                        </p>
                                        <a class="text-gray-500" href="{{ route('category', $category->slug) }}"><span
                                                class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $category->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Quảng cáo</a>
                            @foreach ($ads as $item)
                                <a href="{{ $item->link }}">
                                    <img class="mx-auto px-14 py-1" src="{{ asset($item->image) }}"
                                        alt="{{ $item->description }}" />
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($listNews->slice(6) as $news)
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ asset('uploads/posts/' . $news->thumbnail) }}" />
                                    </a>
                                    <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                        <h3 class="text-lg font-bold leading-tight mb-2">
                                            <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                                {{ $news->title }}
                                            </a>
                                        </h3>
                                        <p class="hidden md:block text-gray-600 leading-tight mb-1 new-content-limit">
                                            {{ $news->content }}
                                        </p>
                                        <a class="text-gray-500" href="#">
                                            <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $listNews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
