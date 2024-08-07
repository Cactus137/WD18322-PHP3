<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0 grid grid-cols-3">
            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $currentRoute === 'admin.dashboard' ? 'rounded-lg font-semibold text-slate-700 bg-blue-500/13' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $currentRoute === 'admin.user' ? 'rounded-lg font-semibold text-slate-700 bg-blue-500/13' : '' }}"
                    href="{{ route('admin.users') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-users"
                            style="color: #63E6BE;"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Users</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $currentRoute === 'admin.category' ? 'rounded-lg font-semibold text-slate-700 bg-blue-500/13' : '' }}"
                    href="{{ route('admin.categories') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500  fa-solid fa-layer-group"
                            style="color: #74C0FC;"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Categories</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $currentRoute === 'admin.post' ? 'rounded-lg font-semibold text-slate-700 bg-blue-500/13' : '' }}"
                    href="{{ route('admin.posts') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 fa-regular fa-newspaper"
                            style="color: #ffbb00;"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Posts</span>
                </a>
            </li>
        </ul>
        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="{{ route('logout') }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 fa-solid fa-right-from-bracket"
                            style="color: #FFD43B;"></i>

                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Log out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
