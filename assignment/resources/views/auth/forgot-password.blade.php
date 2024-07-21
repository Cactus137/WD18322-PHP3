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
                                Quên mật khẩu
                            </h3>
                            <p class="text-sm mt-4 text-gray-800">
                                Vui lòng nhập số điện thoại hoặc địa chỉ email của bạn, chúng tôi sẽ gửi cho bạn một liên kết để khôi phục mật khẩu.
                            </p>
                        </div>

                        <div>
                            <label class="text-gray-800 text-xs block mb-2">Số điện thoại hoặc Địa chỉ Email</label>
                            <div class="relative flex items-center">
                                <input name="email" type="text"
                                    class="w-full text-gray-800 text-sm border-b border-gray-300 focus:border-blue-600 px-2 py-3 outline-none"
                                    placeholder="Nhập Email hoặc Số điện thoại" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                                    <defs>
                                        <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                            <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                        <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                            d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                            data-original="#000000"></path>
                                        <path
                                            d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                            data-original="#000000"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                                    fill="#1C64F2">
                                    <path fill-rule="evenodd"
                                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('auth.login') }}"
                                    class="text-blue-600 font-semibold text-sm hover:underline">Quay lại</a>

                            </div>
                            <div> 
                            </div>
                        </div>

                        <div class="mt-9">
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-black p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                                Khôi phục mật khẩu
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