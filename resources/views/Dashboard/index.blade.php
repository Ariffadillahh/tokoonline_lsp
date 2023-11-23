<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('./Components/navbar')
    <div class="md:my-10 mx-3 md:mx-5 lg:mx-10">
        <div class=" mt-12">
            <div class="">
                <div>
                    <h1 class="text-5xl font-bold">Box Office News!</h1>
                    <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                        exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>

                </div>
            </div>
        </div>
        <div class="">
            <h1 class="text-3xl font-semibold mb-4">Buku Terbaru</h1>
            <div class=" ld:grid lg:grid-cols-3 lg:gap-3 md:grid md:grid-cols-2 md:gap-2 ">
                @forelse ($daftarbuku as $db)
                    <a href="/detail/{{ $db->id }}">
                        <div class="card  md:max-w-1/2 lg:max-w-1/3 bg-base-100 shadow-xl mb-10 md:mb-0">
                            <figure class="h-[230px]"><img src="{{ 'storage/thumbnail/' . $db->cover_buku }}"
                                    alt="buku">
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    {{ $db->judul }}
                                    <span
                                        class="bg-pink-100 text-pink-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">{{ \Carbon\Carbon::parse($db['created_at'])->diffForHumans() }}</span>

                                </h2>
                                <p>{{ Str::limit($db->deskripsi, 95) }}</p>

                                <div class="card-actions justify-end mt-2">
                                    <div class="badge badge-outline">{{ $db->author }}</div>
                                    <div class="badge badge-outline">{{ $db->jenis_buku }}</div>
                                </div>
                            </div>
                        </div>
                    </a>

                @empty
                    <p>Tidak ada daftar buku</p>
                @endforelse
            </div>
        </div>


    </div>
    @include('./Components/footer')
</body>

</html>
