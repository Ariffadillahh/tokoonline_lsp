@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .brand::-webkit-scrollbar {
        display: none;
    }
</style>
@php
   $products = \App\Models\Product::take(4)->get();
@endphp
<nav class="px-3 md:px-14 shadow-sm">
    <div class="flex justify-between py-4 ">
        <div class="flex gap-5">
            <a href="/">
                <img class="w-10 h-10 " src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </a>
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="text-lg font-light text-gray-400 mt-2 border-l border-b pl-2 rounded-bl-xl hidden md:flex">
                <svg class="w-4 h-4 mt-1.5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <p class="ml-1 text-[15px]"> Search by brand and name</p>
            </button>
        </div>
        <div class="flex gap-5">
            @auth
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button" class="md:hidden">
                    <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
                <a href="/orders/dikemas" class="hidden md:flex">
                    <i class="fa-solid fa-box text-[25px] mt-2 text-primary"></i>
                </a>
                <a href="/favorite">
                    <i class="fa-solid fa-heart text-[25px] mt-2 text-primary"></i>
                </a>
                <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-delay="500"
                    data-dropdown-trigger="hover" type="button">
                    @if (Auth::user()->image)
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                            alt="user photo">
                    @else
                        <img class="w-10 h-10 rounded-full " src="{{ asset('storage/user_image/image.jpeg') }}"
                            alt="user photo">
                    @endif
                </button>
            @else
            <div class="flex mt-1.5 md:mt-0">
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button" class="md:hidden mr-3">
                    <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
                <a href="/login" class="btn-sm md:btn-md btn rounded-none border-primary bg-white text-primary hover:bg-white hover:border-primary rounded-tl-xl">
                    Login
                </a>
                <a href="/register" class="btn-sm md:btn-md btn rounded-none bg-primary text-white border-primary hover:bg-primary hover:text-white hover:border-primary rounded-br-xl">
                    Register
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>
<aside id="default-sidebar"
    class="fixed h-[250px] w-full z-40 transform transition-transform -translate-y-[500px] duration-300 ease-in-out"
    aria-label="Sidebar">
    <div class="w-full bg-white h-[280px] px-3 md:px-14 py-5">
        <div class="w-full flex justify-between ">
            <form class="w-full" id="searchForm" action="{{ route('search') }}" >
                
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative border-b border-black">
                    <button class="absolute inset-y-0 start-0 flex items-center ps-3 ">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                    <input type="search" id="slugInput" class="w-full p-4 pl-10 border-none focus:ring-0" name="q" autofocus autocomplete="off"
                        placeholder="Search by brand and name..." required>
                </div>
            </form>
            <div class="">
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button" class="uppercase border-l border-black border-b pb-3 pl-2 mt-5">
                    <i class="fa-solid fa-x px-2 mt-1"></i>
                </button>
            </div>
        </div>
        <div class="flex gap-3 my-3 brand overflow-auto">
            @foreach ($products as $item)
            <a href="{{ route('search', ['q' => $item->name_brand]) }}">
                <div class="rounded-md border border-black p-2">
                  {{$item->name_brand}} 
                </div>
                @endforeach
            </a>
        </div>
        <div >
            <p class="font-mono font-semibold">Top Product <span class="text-red-600"><i class="fa-solid fa-fire"></i></span></p>
            <div class="my-3 grid grid-rows-2 grid-flow-col gap-4" >
            @foreach ($products as $item)
                <a href="{{ route('search', ['q' => $item->name_product]) }}">
                    <li class="cursor-pointer" id="suggestions-container">
                        {{$item->name_product}} 
                    </li>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</aside>
<div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDelayButton">
        <li>
            <a href="/"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Homepage</a>
        </li>
        <li class="md:hidden">
            <a href="/orders/dikemas"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
        </li>
        <li>
            <a href="#"
                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
        </li>
        <li>
            <form action={{ route('logout') }} method="post" class="block px-4 py-2 hover:bg-gray-100 ">
                @csrf
                <button>
                    Sign out
                </button>
            </form>
        </li>
    </ul>
</div>


{{-- <nav class="bg-white/30 backdrop-blur-sm z-10 border-gray-200  top-0 w-full dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <img class="w-9 h-9 " src="{{ asset('storage/images/logo.png') }}" alt="logo">
            <span class="text-xl ml-2 font-semibold">TokoGue</span>
        </a>
        <div class="flex md:order-2">

            @auth
                <button type="button"
                    class="flex mr-1 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="dropdownDefaultButton" data-dropdown-toggle="dropdown" aria-expanded="false"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::user()->image)
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                            alt="user photo">
                    @else
                        <img class="w-10 h-10 rounded-full " src="{{ asset('storage/user_image/image.jpeg') }}"
                            alt="user photo">
                    @endif

                </button>
                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-5  hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        @if (Auth::user()->level == 'admin')
                            <li>
                                <a href="/admin"
                                    class="block px-4 py-2 hover:bg-gray-100">Admin</a>
                            </li>
                        @else
                            <li>
                                <a href="/orders/dikemas"
                                    class="block px-4 py-2 hover:bg-gray-100">Order</a>
                            </li>
                            <li>
                                <a href="/alamat"
                                    class="block px-4 py-2 hover:bg-gray-100">Alamat</a>
                            </li>
                            <li>
                                <a href="/favorite"
                                    class="block px-4 py-2 hover:bg-gray-100">Favorite</a>
                            </li>
                        @endif
                        <li>
                            <a href="/"
                                class="block px-4 py-2 hover:bg-gray-100 ">Homepage</a>
                        </li>
                        <li>
                            <form action={{ route('logout') }} method="post"
                                class="block px-4 py-2 hover:bg-gray-100 ">
                                @csrf
                                <button>
                                    Sign out
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            @else
                <a href={{ route('login') }}>
                    <button type="button"
                        class="text-white bg-[#969D43]  focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-4 py-2 text-center mr-1 md:mr-0 ">Login</button>
                </a>
            @endauth
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex ml-1 items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

        </div>
        <div class="items-center  justify-between hidden w-full md:hidden md:w-auto md:order-1 my-3 "
            id="navbar-sticky">
            <form class="flex items-center" action="/">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z" />
                        </svg>
                    </div>
                    <input type="text" name="search" id="voice-search" value="{{ request('search') }}"
                        class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-[#969D43] focus:border-[#969D43] block w-full pl-10 p-2.5  "
                        placeholder="Search books.." autocomplete="off">
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-[#C8D439] rounded-lg border ">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>Search
                </button>
            </form>
        </div>
        <div class=" justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <form class="flex items-center" action="/">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.15 5.6h.01m3.337 1.913h.01m-6.979 0h.01M5.541 11h.01M15 15h2.706a1.957 1.957 0 0 0 1.883-1.325A9 9 0 1 0 2.043 11.89 9.1 9.1 0 0 0 7.2 19.1a8.62 8.62 0 0 0 3.769.9A2.013 2.013 0 0 0 13 18v-.857A2.034 2.034 0 0 1 15 15Z" />
                        </svg>
                    </div>
                    <input type="text" id="voice-search" name="search" value="{{ request('search') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#969D43] focus:border-[#969D43] block w-full pl-10 p-2.5  "
                        placeholder="Search books.." autocomplete="off">
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-[#C8D439] rounded-lg border ">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>Search
                </button>
            </form>


        </div>
    </div>
</nav> --}}
