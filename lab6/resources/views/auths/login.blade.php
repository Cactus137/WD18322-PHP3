@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="py-10 flex flex-col items-center justify-center">
        <div
            class="grid md:grid-cols-2 items-center gap-4 max-md:gap-8 max-w-6xl max-md:max-w-lg w-full p-4 m-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
            <div class="md:max-w-md w-full px-4 py-4">
                <form action="{{ route('loginPost') }}" method="post">
                    @csrf
                    <div class="mb-12">
                        <h3 class="text-gray-800 text-3xl font-extrabold">Đăng nhập</h3>
                        <p class="text-sm mt-4 text-gray-800">Bạn chưa có tài khoản? <a href="{{ route('register') }}"
                                class="text-blue-600 font-semibold hover:underline whitespace-nowrap">Đăng
                                ký</a></p>
                    </div>

                    <div>
                        <label class="text-gray-800 text-xs block mb-2">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="text"
                                class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                placeholder="Email" />
                        </div>
                        @error('email')
                            <div class="text-red-500 mt-3">{{ $message }}</div>
                        @enderror
                        @session('error')
                            <div class="text-red-500 mt-3">{{ session('error') }}</div>
                        @endsession
                    </div>

                    <div class="mt-8">
                        <label class="text-gray-800 text-xs block mb-2">Mật khẩu</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password"
                                class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                placeholder="Mật khẩu" />
                        </div>
                        @error('password')
                            <div class="text-red-500 mt-3">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="mt-9">
                        <button type="submit"
                            class="inline-flex w-full items-center justify-center rounded-lg text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Đăng nhập
                        </button>
                    </div>

                </form>
            </div>

            <div class="md:h-full bg-[#000842] rounded-xl lg:p-12 p-8">
                <img src="https://readymadeui.com/signin-image.webp" class="w-full h-full object-contain"
                    alt="login-image" />
            </div>
        </div>
    </div>
@endsection
