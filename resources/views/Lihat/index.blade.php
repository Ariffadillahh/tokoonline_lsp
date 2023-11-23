<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Detail | {{ $buku->judul }}</title>
</head>

<body>
    @include('./Components/navbar')
    <div class="md:mx-10 mx-3 lg:mx-20 mt-20">
        @if (session()->has('delet'))
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
                    {{ session('delet') }}
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
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Detail buku
                            {{ $buku->judul }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="md:mx-10 mx-3 lg:mx-20 mt-7">

        <div class="">
            <div>
                <h1 class="text-5xl font-bold">{{ $buku->judul }}</h1>
                <p class="py-3">{{ $buku->deskripsi }}</p>
                <div class="justify-between flex pb-9">

                    <p class="badge badge-outline">Penulis : {{ $buku->author }}</p>
                    <p class="badge badge-outline">{{ $buku->jenis_buku }}</p>
                </div>

            </div>
            @if (Auth()->user()->level == 'admin')
                <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" type="button"
                    class="btn btn-primary cursor-not-allowed">
                    Boking Now</button>
                <div id="tooltip-bottom" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Admin tidak bisa pinjam buku
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            @else
                <a href="booking/{{ $buku->id }}">
                    <button class="btn btn-primary">Boking Now</button>
                </a>
            @endif

        </div>
    </div>

    <div class="md:mx-10 mx-3 lg:mx-20">
        <h1 class="my-10 font-bold text-3xl">Reviewed Honestly</h1>

        @forelse ($rate as $item)
            <div class="flex justify-between">
                <article class="w-full">
                    <div class="flex items-center mb-4 space-x-4">
                        <div class="space-y-1 font-medium dark:text-white">

                            <div class="flex justify-between">
                                @if ($item->image)
                                    <img class="w-10 h-10 rounded-full mr-3"
                                        src="{{ asset('storage/' . $item->image) }}" alt="user photo">
                                @else
                                    <img class="w-10 h-10 rounded-full mr-3 "
                                        src="{{ asset('storage/user_image/image.jpeg') }}" alt="user photo">
                                @endif
                                <p>{{ $item->nama_peminjam }}<time datetime="2014-08-16 19:00"
                                        class="block text-sm text-gray-500 dark:text-gray-400">Reviewed
                                        {{ \Carbon\Carbon::parse($item->waktu_rate)->diffForHumans() }}</time>
                                </p>

                            </div>

                        </div>
                    </div>
                    <div class="flex items-center mb-1">
                        @for ($i = 1; $i <= $item->start_rate; $i++)
                            {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                            <label class="star-rating-complete" title="text"><span
                                    class="hidden">{{ $i }}</span> <svg class="w-4 h-4 text-yellow-300 mr-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg> </label>
                        @endfor

                        {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                        @if ($item->start_rate == 1)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Bad</h3>
                        @endif
                        @if ($item->start_rate == 2)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Poor</h3>
                        @endif
                        @if ($item->start_rate == 3)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Average</h3>
                        @endif
                        @if ($item->start_rate == 4)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Great</h3>
                        @endif
                        @if ($item->start_rate == 5)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Excellent</h3>
                        @endif
                    </div>

                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        {{ $item->komentar }}</p>

                    <div class="w-full h-[1px] bg-slate-400/30  my-5"></div>
                </article>
                @if (Auth()->user()->level == 'admin')
                    <button data-modal-target="{{ $item->id_r }}" data-modal-toggle="{{ $item->id_r }}"
                        class="text-red-600" type="button">
                        Hapus
                    </button>

                    <div id="{{ $item->id_r }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="{{ $item->id_r }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                        sure
                                        you want to delete comment by {{ $item->nama_peminjam }}</h3>
                                    <div class="flex justify-center">
                                        <form action={{ route('delrate') }} method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id_r }}" name="id">
                                            <button type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                        <button data-modal-hide="{{ $item->id_r }}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        @empty
            <p>Belum ada riviw</p>
        @endforelse

    </div>





    @include('./Components/footer')
</body>

</html>
