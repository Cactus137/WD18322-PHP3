<div>
    <div id="login-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
        wire:ignore.self>
        <div id="login-popup" tabindex="-1"
            class="bg-black/50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative mt-32 bg-white rounded-lg shadow">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"
                        id="popup-close-login" data-modal-hide="login-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                cliprule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close popup</span>
                    </button>

                    <div class="p-5 form-login">
                        <h3 class="text-2xl mb-0.5 font-medium"></h3>
                        <p class="mb-4 text-sm font-normal text-gray-800"></p>

                        <div class="text-center">
                            <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                                Đăng nhập
                            </p>
                        </div>

                        <div class="mt-7 flex flex-col gap-2">

                            <button disabled
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                    src="https://s1.vnecdn.net/myvne/i/v296/ls/icons/facebook_ico.svg" alt="GitHub"
                                    class="h-[19px] w-[19px] ">
                                Đăng nhập bằng Facebook
                            </button>

                            <button disabled
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                    src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                    class="h-[18px] w-[18px] ">Đăng nhập bằng Google
                            </button>
                        </div>

                        <div class="flex w-full items-center gap-2 py-6 text-sm text-slate-600">
                            <div class="h-px w-full bg-slate-200"></div>
                            Hoặc
                            <div class="h-px w-full bg-slate-200"></div>
                        </div>


                        <form class="w-full" wire:submit.prevent="login">
                            <label for="email" class="sr-only">Email</label>
                            <input name="email" wire:model.defer="log_email" type="text" autocomplete="email"
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                                placeholder="Email" value="">
                            @error('log_email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="password" class="sr-only">Mật khẩu</label>
                            <input name="password" wire:model.defer="log_password" type="password"
                                autocomplete="current-password"
                                class="mt-2 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                                placeholder="Mật khẩu" value="">
                            @error('log_password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mb-3 mt-2 text-sm text-gray-500">
                                <a href="/forgot-password" class="text-blue-800 hover:text-blue-600">Lấy lại mật
                                    khẩu?</a>
                            </p>
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-black p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                                Đăng nhập
                            </button>
                        </form>

                        <div class="mt-6 text-center text-sm text-slate-600">
                            Bạn không có tài khoản
                            <button id="btn-register" class="font-medium text-[#4285f4]"
                                data-modal-target="register-modal" data-modal-toggle="register-modal">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="register-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
        wire:ignore.self>
        <div id="login-popup" tabindex="-1"
            class="bg-black/50 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <div class="relative mt-32 bg-white rounded-lg shadow">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center popup-close"
                        id="popup-close-register" data-modal-hide="register-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#c6c7c7" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                cliprule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close popup</span>
                    </button>
                    <div class="p-5 form-register">
                        <h3 class="text-2xl mb-0.5 font-medium"></h3>
                        <p class="mb-4 text-sm font-normal text-gray-800"></p>

                        <div class="text-center">
                            <p class="mb-3 text-2xl font-semibold leading-5 text-slate-900">
                                Đăng ký
                            </p>
                            @if (session('status'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 flash-message"
                                    role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>

                        <div class="mt-7 flex flex-col gap-2">

                            <button disabled
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                    src="https://s1.vnecdn.net/myvne/i/v296/ls/icons/facebook_ico.svg" alt="GitHub"
                                    class="h-[19px] w-[19px] ">
                                Đăng ký bằng Facebook
                            </button>

                            <button disabled
                                class="inline-flex h-10 w-full items-center justify-center gap-2 rounded border border-slate-300 bg-white p-2 text-sm font-medium text-black outline-none focus:ring-2 focus:ring-[#333] focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-60"><img
                                    src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                    class="h-[18px] w-[18px] ">Đăng ký bằng Google
                            </button>
                        </div>

                        <div class="flex w-full items-center gap-2 py-6 text-sm text-slate-600">
                            <div class="h-px w-full bg-slate-200"></div>
                            Hoặc
                            <div class="h-px w-full bg-slate-200"></div>
                        </div>

                        <form class="w-full" wire:submit.prevent="register">
                            <label for="email" class="sr-only">Email</label>
                            <input name="email" wire:model.defer="res_email" type="text" autocomplete="email"
                                class="block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                                placeholder="Nhập Email" value="">
                            @error('res_email')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <label for="password" class="sr-only">Mật khẩu</label>
                            <input name="password" wire:model.defer="res_password" type="password"
                                autocomplete="current-password"
                                class="mt-2 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm outline-none placeholder:text-gray-400 focus:ring-2 focus:ring-black focus:ring-offset-1"
                                placeholder="Tạo Mật Khẩu" value="">
                            @error('res_password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mb-3 mt-2 text-xs text-gray-500">
                            </p>
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-lg bg-black p-2 py-3 text-sm font-medium text-white outline-none focus:ring-2 focus:ring-black focus:ring-offset-1 disabled:bg-gray-400">
                                Đăng ký
                            </button>
                        </form>

                        <div class="mt-6 text-center text-sm text-slate-600">
                            Bạn đã có tài khoản
                            <button id="btn-login" class="font-medium text-[#4285f4]" data-modal-target="login-modal"
                                data-modal-toggle="login-modal">Đăng
                                nhập</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var btnLogin = document.getElementById('btn-login');
        var btnRegister = document.getElementById('btn-register');

        btnLogin.addEventListener('click', function() {
            document.getElementById('popup-close-register').click();
        });

        btnRegister.addEventListener('click', function() {
            document.getElementById('popup-close-login').click();
            // remove flash message
            var flashMessage = document.querySelector('.flash-message');
            if (flashMessage) {
                flashMessage.remove();
            }
        });

        window.addEventListener('hide-modal', event => {
            document.getElementById('popup-close-login').click();
        });
    </script>
</div>
