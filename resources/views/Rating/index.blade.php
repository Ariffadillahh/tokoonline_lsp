@foreach ($boking as $item)
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rateing | {{ $item->judul }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @include('./Components/navbar')
        @if (session()->has('succses'))
            <div id="alert-3"
                class="flex mt-14 items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('succses') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="mt-16 mx-3 md:mx-10 lg:mx-20">
            <nav class="flex my-3" aria-label="Breadcrumb">
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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/pinjaman"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Pinjaman</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Rateing</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div tabindex="0" class="collapse collapse-arrow border border-pink-500 ">
                <div class="collapse-title text-xl font-medium ">
                    <h1>{{ $item->judul }}</h1>
                </div>
                <div class="collapse-content">
                    <p>{{ $item->deskripsi }}</p>
                    <p>Penulis : {{ $item->author }}</p>
                </div>
            </div>
            <h1 class="mt-7 mb-3 font-light text-3xl">Write a review</h1>
            <form action={{ route('rateaction') }} method="post">
                @csrf
                <div class="rating my-4">
                    <input type="radio" name="rating_2"
                        class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:border-orange-400"
                        value="1" />
                    <input type="radio" name="rating_2" class="mask mask-star-2 bg-orange-400 checked:bg-orange-400"
                        value="2" checked />
                    <input type="radio" name="rating_2" class="mask mask-star-2 bg-orange-400 checked:bg-orange-400"
                        value="3" />
                    <input type="radio" name="rating_2" class="mask mask-star-2 bg-orange-400 checked:bg-orange-400"
                        value="4" />
                    <input type="radio" name="rating_2" class="mask mask-star-2 bg-orange-400 checked:bg-orange-400"
                        value="5" />
                </div>
                <input type="hidden" value="{{ $item->id_b }}" name="id_boking">
                <textarea class="w-full rounded-md min-h-[160px] border border-pink-500" name="text" id=""
                    placeholder="What did you like or dislike about this "></textarea>
                <button class="btn btn-outline btn-secondary w-full" type="submit">Submit</button>
            </form>
            <h1 class="my-10 font-bold text-3xl">Your Reviewed</h1>

            @forelse ($rate as $items)
                <article>
                    <div class="flex items-center mb-4 space-x-4">
                        <div class="space-y-1 font-medium dark:text-white">
                            <p>{{ $items->nama_peminjam }}<time datetime="2014-08-16 19:00"
                                    class="block text-sm text-gray-500 dark:text-gray-400">Reviewed
                                    {{ \Carbon\Carbon::parse($items->waktu_rate)->diffForHumans() }}</time>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center mb-1">
                        @for ($i = 1; $i <= $items->start_rate; $i++)
                            {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                            <label class="star-rating-complete" title="text"><span
                                    class="hidden">{{ $i }}</span> <svg
                                    class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg> </label>
                        @endfor

                        {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                        @if ($items->start_rate == 1)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Bad</h3>
                        @endif
                        @if ($items->start_rate == 2)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Poor</h3>
                        @endif
                        @if ($items->start_rate == 3)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Average</h3>
                        @endif
                        @if ($items->start_rate == 4)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Great</h3>
                        @endif
                        @if ($items->start_rate == 5)
                            <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Excellent</h3>
                        @endif
                    </div>

                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                        {{ $items->komentar }}</p>

                    <div class="w-full h-[1px] bg-slate-400/30  my-5"></div>
                </article>
            @empty
                <p>Belum ada review</p>
            @endforelse
        </div>


        @include('./Components/footer')
    </body>

    </html>
@endforeach
