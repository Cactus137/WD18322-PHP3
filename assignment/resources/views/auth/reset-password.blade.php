<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @vite('resources/css/app.css')
    <!-- Title  -->
    <title>
        VnNews - @yield('title')
    </title>
    <meta name="description" content="Tailwind CSS News Template" />

    <!-- Development css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600;700&amp;display=swap"
        rel="stylesheet" />

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/img/favicon.jpg') }}" />

</head>

<body class="">
    <div class="">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div
                class="grid md:grid-cols-2 items-center gap-4 max-md:gap-8 max-w-6xl max-md:max-w-lg w-full p-4 m-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
                <div class="md:max-w-md w-full px-4 py-4">
                    <form>
                        <div class="mb-12">
                            <h3 class="text-gray-800 text-3xl font-extrabold">
                                Đặt lại mật khẩu
                            </h3>
                            <p class="text-sm mt-4 text-gray-800">

                            </p>
                        </div>

                        <div>
                            <label class="text-gray-800 text-xs block mb-2">Mật khẩu</label>
                            <div class="relative flex items-center">
                                <input name="password" type="password"
                                    class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Nhập Mật khẩu" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-8">
                            <label class="text-gray-800 text-xs block mb-2">
                                Nhập lại Mật khẩu
                            </label>
                            <div class="relative flex items-center">
                                <input name="re_password" type="password"
                                    class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Nhập lại Mật khẩu" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-9">
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-black p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                                Đặt lại mật khẩu
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
    </div>

    <!--Vendor js-->
    <script src="{{ asset('assets/vendors/hc-sticky/dist/hc-sticky.js') }}"></script>
    <script src="{{ asset('assets/vendors/glightbox/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/@splidejs/splide/dist/js/splide.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/@splidejs/splide-extension-video/dist/js/splide-extension-video.min.js') }}">
    </script>
    <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    <!-- Start development js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <!-- End development js -->
</body>

</html>
