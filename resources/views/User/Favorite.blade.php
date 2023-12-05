<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>TokoGue - Favorite</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('../Components/navbar')
    <div class="mx-3 md:mx-14">
        @if (count($fav) == 0)
            <div class="h-[70vh] flex justify-center items-center capitalize font-mono">tidak ada product favorite</div>
        @endif
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @foreach ($fav as $item)
            <div class="relative">
                <div class="absolute top-0 right-0 ">
                    <form action={{ route('unPav') }} method="post" class="">
                        @csrf
                        <input type="hidden" name="idPav" value="{{ $item->id_pavpro }}">
                        <button
                            type="submit"
                            class="p-3 text-red-600 btn-outline hover:bg-red-600 hover:border-white w-full"><i
                                class="fa-solid fa-heart text-lg"></i>
                        </button>
                        
                    </form>
                </div>
                <a href="{{ route('detail', $item->id_product) }}">
                    <div class="hover:text-[#969D43] duration-150 cursor-pointer ">
                        <div class="overflow-hidden ">
                            <img src={{ asset('storage/product_images/' . $item->image_product) }}
                                alt="{{ $item->name_product }}" class="w-full   ">
                        </div>
                        <div class="p-4">
                            <h1 class="font-semibold text-lg font-mono ">{{ $item->name_product }}</h1>
                            <h1 class="font-light text-sm font-mono ">{{ $item->name_brand }}</h1>
                            <p class="text-base font-mono ">Rp
                                {{ number_format($item->price_product, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @include('../Components/footer')
</body>
</html>