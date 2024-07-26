<footer class="bg-black text-gray-400 flex flex-col space-y-10 justify-center py-10">
    <nav class="flex justify-center flex-wrap gap-6 text-gray-500 font-medium">

        @if (session('user'))
        <a class="text-gray-400 hover:text-gray-700" href="#">Tài khoản</a>
        <a class="text-gray-400 hover:text-gray-700" href="{{ route('auth.logout') }}">Đăng xuất</a>
            <a class="text-gray-400 hover:text-gray-700" href="#">Tin đã lưu</a>
            <a class="text-gray-400 hover:text-gray-700" href="{{ route('viewed-posts') }}">Tin đã xem</a>
        @else
            <button class="text-gray-400 hover:text-gray-700" data-modal-target="login-modal"
                data-modal-toggle="login-modal">Đăng nhập</button>
            -
            <a class="text-gray-400 hover:text-gray-700" href="{{ route('auth.login') }}">Đăng nhập</a>
        @endif
        <a class="text-gray-400 hover:text-gray-700" href="#">Về chúng tôi</a>
        <a class="text-gray-400 hover:text-gray-700" href="#">Dịch vụ</a>
        <a class="text-gray-400 hover:text-gray-700" href="#">Mạng xã hội</a>
        <a class="text-gray-400 hover:text-gray-700" href="#">Liên hệ</a>
    </nav>
    <p class="text-center text-gray-400 font-medium">&copy; 2022 Company Ltd. All rights reservered.</p>
</footer>

<!-- Main modal -->
<livewire:authen-modal />
