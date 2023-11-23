<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Pinjaman</title>
</head>

<body>
    @include('./Components/navbar')

    <div class="md:mx-10 mx-3 lg:mx-20 mt-20">
        @if (session()->has('success'))
            <div id="alert-1"
                class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="mx-3 md:mx-10 lg:mx-20">
            <nav class="flex mt-16" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Pinjaman</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div
                class="w-full bg-white border my-16  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                    id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="mr-2">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                            aria-controls="about" aria-selected="true"
                            class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Redy</button>
                    </li>
                    <li class="mr-2">
                        <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                            aria-controls="services" aria-selected="false"
                            class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Expired</button>
                    </li>

                </ul>
                <div id="defaultTabContent">
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                        aria-labelledby="about-tab">

                        <div
                            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Ready For
                                    Reading
                                </h5>

                                <!-- Modal toggle -->
                                <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                                    class="block text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                                    type="button">
                                    View all
                                </button>

                                <!-- Main modal -->
                                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Ready For Reading
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="staticModal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6 h-screen">
                                                @forelse ($bokingr as $bokingr)
                                                    @if ($bokingr->status == 'redy')
                                                        <ul role="list"
                                                            class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            <li class="py-3 sm:py-4">
                                                                <div class="flex items-center space-x-4">
                                                                    <div class="flex-shrink-0">
                                                                        <img class="w-8 h-8 rounded-full"
                                                                            src="https://cdn.popmama.com/content-images/post/20221209/cover-ilustrasi-dongeng-malin-kundang-compressed-56e5b71a672a73f02c1d0ae617264ec9_800x420.jpg"
                                                                            alt="Neil image">
                                                                    </div>
                                                                    <div class="md:flex-1 min-w-0">
                                                                        <p
                                                                            class="text-sm mr-2 font-medium text-gray-900 truncate dark:text-white">
                                                                            {{ $bokingr->judul }}

                                                                        </p>
                                                                        @php
                                                                            $waktuSekarang = $bokingr->tgl_pinjam;
                                                                            // Konversi tanggal string dari database ke objek Carbon
                                                                            $tanggalTentukan = $bokingr->tgl_balikin;
                                                                            // Hitung selisih waktu
                                                                            $selisih = \Carbon\Carbon::parse($tanggalTentukan)->diffForHumans($waktuSekarang);

                                                                        @endphp
                                                                        <span
                                                                            class="bg-blue-100 text-blue-800 text-xs truncate font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                                                            {{ $selisih }} akan expired</span>
                                                                        <p
                                                                            class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                            {{ $bokingr->deskripsi }}
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        @if ($now > $bokingr->tgl_balikin)
                                                                            @php
                                                                                DB::table('bokings')
                                                                                    ->where('id_b', $bokingr->id_b)
                                                                                    ->update([
                                                                                        'status' => 'expired',
                                                                                    ]);
                                                                            @endphp
                                                                        @else
                                                                        @endif
                                                                        <a href="{{ asset('storage/' . $bokingr->buku) }}"
                                                                            target="_blank">
                                                                            <button
                                                                                class="py-1.5 px-3 rounded-md border duration-200 border-green-600 text-green-600 hover:bg-green-600 hover:text-white">Baca</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                @empty
                                                    <P>Waktu Sewa Buku Anda Telah Habis</P>
                                                @endforelse
                                            </div>
                                            <!-- Modal footer -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="flow-root">
                                @forelse ($bokingrtake as $bokingrtake)
                                    @if ($bokingrtake->status == 'redy')
                                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <li class="py-3 sm:py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                        <img class="w-8 h-8 rounded-full"
                                                            src="https://cdn.popmama.com/content-images/post/20221209/cover-ilustrasi-dongeng-malin-kundang-compressed-56e5b71a672a73f02c1d0ae617264ec9_800x420.jpg"
                                                            alt="Neil image">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <div class="md:flex">
                                                            <p
                                                                class="text-sm mr-2 font-medium text-gray-900 truncate dark:text-white">
                                                                {{ $bokingrtake->judul }}

                                                            </p>
                                                            @php
                                                                $waktuSekarang = $bokingrtake->tgl_pinjam;
                                                                // Konversi tanggal string dari database ke objek Carbon
                                                                $tanggalTentukan = $bokingrtake->tgl_balikin;
                                                                // Hitung selisih waktu
                                                                $selisih = \Carbon\Carbon::parse($tanggalTentukan)->diffForHumans($waktuSekarang);

                                                            @endphp

                                                            <span
                                                                class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                                                {{ $selisih }} akan expired</span>
                                                        </div>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ $bokingrtake->deskripsi }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        @if ($now > $bokingrtake->tgl_balikin)
                                                            @php
                                                                DB::table('bokings')
                                                                    ->where('id_b', $bokingrtake->id_b)
                                                                    ->update([
                                                                        'status' => 'expired',
                                                                    ]);
                                                            @endphp
                                                        @else
                                                        @endif
                                                        <a href="{{ asset('storage/' . $bokingrtake->buku) }}"
                                                            target="_blank">
                                                            <button
                                                                class="py-1.5 px-3 rounded-md border duration-200 border-green-600 text-green-600 hover:bg-green-600 hover:text-white">Download</button>
                                                        </a>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                @empty
                                    <P>Waktu Sewa Buku Anda Telah Habis</P>
                                @endforelse
                            </div>
                        </div>

                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                        role="tabpanel" aria-labelledby="services-tab">
                        <div
                            class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Your Books
                                    Expired
                                </h5>
                                <button data-modal-target="staticModall" data-modal-toggle="staticModall"
                                    class="block text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
                                    type="button">
                                    View all
                                </button>
                                <div id="staticModall" data-modal-backdrop="static" tabindex="-1"
                                    aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Your Books Expired
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="staticModall">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6 h-screen">
                                                @forelse ($bokingx as $bokingx)
                                                    @if ($bokingx->status == 'expired')
                                                        <ul role="list"
                                                            class="divide-y divide-gray-200 dark:divide-gray-700">
                                                            <li class="py-3 sm:py-4">
                                                                <div class="flex items-center space-x-4">
                                                                    <div class="flex-shrink-0">
                                                                        <img class="w-8 h-8 rounded-full"
                                                                            src="https://cdn.popmama.com/content-images/post/20221209/cover-ilustrasi-dongeng-malin-kundang-compressed-56e5b71a672a73f02c1d0ae617264ec9_800x420.jpg"
                                                                            alt="Neil image">
                                                                    </div>
                                                                    <div class="flex-1 min-w-0">
                                                                        <p
                                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                                            {{ $bokingx->judul }}
                                                                        </p>
                                                                        <p
                                                                            class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                                            {{ $bokingx->deskripsi }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="flex">
                                                                        <button
                                                                            class="py-1.5 cursor-not-allowed px-3 rounded-md bg-red-600 text-white">Expired</button>

                                                                        <a href="pinjaman/rate/{{ $bokingx->id_b }}">
                                                                            <button
                                                                                class="block ml-2 text-blue-500 font-light">
                                                                                Rating
                                                                            </button>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    @else
                                                    @endif

                                                @empty
                                                    <P>Anda Belum Meminjam Buku</P>
                                                @endforelse
                                            </div>
                                            <!-- Modal footer -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flow-root">
                                @forelse ($bokingxtake as $bokingxtake)
                                    @if ($bokingxtake->status == 'expired')
                                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                            <li class="py-3 sm:py-4">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex-shrink-0">
                                                        <img class="w-8 h-8 rounded-full"
                                                            src="https://cdn.popmama.com/content-images/post/20221209/cover-ilustrasi-dongeng-malin-kundang-compressed-56e5b71a672a73f02c1d0ae617264ec9_800x420.jpg"
                                                            alt="Neil image">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{ $bokingxtake->judul }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ $bokingxtake->deskripsi }}
                                                        </p>
                                                    </div>
                                                    <div class="flex">
                                                        <button
                                                            class="py-1.5 cursor-not-allowed px-3 rounded-md bg-red-600 text-white">Expired</button>

                                                        <a href="pinjaman/rate/{{ $bokingxtake->id_b }}">
                                                            <button class="block ml-2 text-blue-500 font-light">
                                                                Rating
                                                            </button>
                                                        </a>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    @else
                                    @endif
                                @empty
                                    <P>Anda Belum Meminjam Buku</P>
                                @endforelse
                                <P class="text-red-600">Waktu sewa buku anda telah habis</P>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- resources/views/contoh.blade.php -->

        <div>
            {{-- @foreach ($pinjaman as $task)
            @php
                
                $waktuSekarang = $task->tgl_pinjam;
                // Konversi tanggal string dari database ke objek Carbon
                $tanggalTentukan = $task->tgl_balikin;
                // Hitung selisih waktu
                $selisih = \Carbon\Carbon::parse($tanggalTentukan)->diffForHumans($waktuSekarang);
                
            @endphp


            <p>Selisih waktu dari tanggal yang ditentukan adalah: {{ $selisih }}</p>
        @endforeach --}}
        </div>


        @include('./Components/footer')
</body>

</html>
