<template>
    <div>
        <section
            class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
        >
            <header
                class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
            >
                Admin Dashboard
            </header>

            <div class="w-full">
                <div class="text-gray-700">
                    <div class="min-h-full md:flex">
                        <div class="flex-none w-full md:max-w-xs border-r p-6">
                            <ul
                                class="md:flex-col md:min-w-full flex flex-col list-none"
                            >
                                <li class="items-center">
                                    <a
                                        href="/admin/dashboard"
                                        class="hover:text-gray-800 text-xs uppercase py-3 font-bold block"
                                        ><i
                                            class="fas fa-tv opacity-75 mr-2 text-sm"
                                        ></i>
                                        Products</a
                                    >
                                </li>
                                <li class="items-center">
                                    <a
                                        href="#/landing"
                                        class="text-gray-800 hover:text-gray-600 text-xs uppercase py-3 font-bold block"
                                        ><i
                                            class="fas fa-newspaper text-gray-500 mr-2 text-sm"
                                        ></i>
                                        Orders</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="flex-1 bg-blue">Main content area</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
