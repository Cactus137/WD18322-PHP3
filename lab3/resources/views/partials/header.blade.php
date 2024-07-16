<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-center items-center mx-auto max-w-screen-xl">
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('books.index') }}"
                            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">List
                            Books</a>

                    </li>
                    <li>
                        <a href="{{ route('books.create') }}"
                            class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create
                            Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
