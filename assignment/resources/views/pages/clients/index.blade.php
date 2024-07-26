@extends('layouts.layout-client')

@section('title', 'Home')


@section('content')
    <!-- hero big grid -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <!-- big grid 1 -->
            <div class="flex flex-row flex-wrap">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                    @foreach ($breakingNews->take(1) as $news)
                        @php
                            $category = DB::table('categories')
                                ->where('id', $news->category_id)
                                ->first();
                        @endphp
                        <div class="relative hover-img max-h-98 overflow-hidden">
                            <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                <img class="max-w-full w-full mx-auto h-auto" src="{{ $news->thumbnail }}" />
                            </a>
                            <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                    <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                        {{ $news->title }}
                                    </h2>
                                </a>
                                <p class="text-gray-100 hidden sm:inline-block new-content-limit">
                                    {{ $news->content }}
                                </p>
                                <div class="pt-2">
                                    <div class="text-gray-100">
                                        <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                        <a href="{{ route('category', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!--Start box news-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2">
                    <div class="box-one flex flex-row flex-wrap">
                        @foreach ($breakingNews->slice(1) as $news)
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $news->category_id)
                                    ->first();
                            @endphp
                            <article class="flex-shrink max-w-full w-full sm:w-1/2">
                                <div class="relative hover-img max-h-48 overflow-hidden">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto h-auto" src="{{ $news->thumbnail }}" />
                                    </a>
                                    <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                        <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                            <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">
                                                {{ $news->title }}
                                            </h2>
                                        </a>
                                        <div class="pt-1">
                                            <div class="text-gray-100">
                                                <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                                <a href="{{ route('category', $category->slug) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-white">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Kinh doanh
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($businessNews as $news)
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $news->category_id)
                                    ->first();
                            @endphp
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ $news->thumbnail }}"
                                            alt="alt title" />
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
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-gray-50 h-full">
                        <div class="text-sm py-6 sticky">
                            <div class="w-full text-center">
                                <a class="uppercase" href="#">Quảng cáo</a>
                                <a class="flex justify-center" href="{{ $ads[0]['link'] }}">
                                    <img src="{{ asset($ads[0]['image']) }}" class="px-14 py-1"
                                        alt="{{ $ads[0]['description'] }}" />
                                </a>
                            </div>
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
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Khoa học
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach ($scienceNews as $news)
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $news->category_id)
                                    ->first();
                            @endphp
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ $news->thumbnail }}" />
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
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Thể thao
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            @foreach ($sportNews->take(1) as $news)
                                @php
                                    $category = DB::table('categories')
                                        ->where('id', $news->category_id)
                                        ->first();
                                @endphp
                                <div class="relative hover-img max-h-98 overflow-hidden">
                                    <!--thumbnail-->
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto h-auto" src="{{ $news->thumbnail }}" />
                                    </a>
                                    <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                        <!--title-->
                                        <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                            <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                                {{ $news->title }}
                                            </h2>
                                        </a>
                                        <p class="text-gray-100 hidden sm:inline-block new-content-limit">
                                            {{ $news->content }}
                                        </p>
                                        <!-- author and date -->
                                        <div class="pt-2">
                                            <div class="text-gray-100">
                                                <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @foreach ($sportNews->slice(1)->take(6) as $news)
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $news->category_id)
                                    ->first();
                            @endphp
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ $news->thumbnail }}" />
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
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">
                                    Liên quan
                                </h2>
                            </div>

                            <ul class="post-number">
                                @foreach ($sportNews->slice(7) as $news)
                                    @php
                                        $category = DB::table('categories')
                                            ->where('id', $news->category_id)
                                            ->first();
                                    @endphp
                                    <li class="border-b border-gray-100 hover:bg-gray-50">
                                        <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                                            href="{{ route('post', [$category->slug, $news->slug]) }}">
                                            {{ $news->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Quảng cáo</a>
                            <a class="flex justify-center" href="{{ $ads[1]['link'] }}">
                                <img src="{{ asset($ads[1]['image']) }}" class="px-14 py-1"
                                    alt="{{ $ads[1]['description'] }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- post -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>
                            Tin mới nhất
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3 pb-5">
                            @foreach ($lastestNews->take(1) as $news)
                                @php
                                    $category = DB::table('categories')
                                        ->where('id', $news->category_id)
                                        ->first();
                                @endphp
                                <div class="relative hover-img max-h-98 overflow-hidden">
                                    <!--thumbnail-->
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto h-auto" src="{{ $news->thumbnail }}" />
                                    </a>
                                    <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                                        <!--title-->
                                        <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                            <h2 class="text-3xl font-bold capitalize text-white mb-3">
                                                {{ $news->title }}
                                            </h2>
                                        </a>
                                        <p class="text-gray-100 hidden sm:inline-block new-content-limit">
                                            {{ $news->content }}
                                        </p>
                                        <!-- author and date -->
                                        <div class="pt-2">
                                            <div class="text-gray-100">
                                                <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @foreach ($lastestNews->slice(1)->take(6) as $news)
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $news->category_id)
                                    ->first();
                            @endphp
                            <div
                                class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                                <div class="flex flex-row sm:block hover-img">
                                    <a href="{{ route('post', [$category->slug, $news->slug]) }}">
                                        <img class="max-w-full w-full mx-auto" src="{{ $news->thumbnail }}" />
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
                <!-- sidebar -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pr-8 lg:pt-14 lg:pb-8 order-first">
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">
                                    Liên quan
                                </h2>
                            </div>
                            <ul class="post-number">
                                @foreach ($lastestNews->slice(7) as $news)
                                    @php
                                        $category = DB::table('categories')
                                            ->where('id', $news->category_id)
                                            ->first();
                                    @endphp
                                    <li class="border-b border-gray-100 hover:bg-gray-50">
                                        <a class="text-lg font-bold px-6 py-3 flex flex-row items-center"
                                            href="{{ route('post', [$category->slug, $news->slug]) }}">
                                            {{ $news->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#">Quảng cáo</a>
                            <a class="flex justify-center" href="{{ $ads[2]['link'] }}">
                                <img src="{{ asset($ads[2]['image']) }}" class="px-14 py-1"
                                    alt="{{ $ads[2]['description'] }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
