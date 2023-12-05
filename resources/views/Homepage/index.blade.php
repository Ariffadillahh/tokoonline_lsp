<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <title>TokoGue</title>
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
            <h1 class="text-3xl font-semibold mb-4">Sepatu Hypebeast BJIRR!!</h1>
            <div class=" grid md:grid-cols-5 gap-5 grid-cols-2">
                @forelse ($product as $item)
                    <a href="{{ route('detail', $item->id_product) }}">
                        <div class="hover:text-[#969D43] hover:scale-105 duration-100 hover:transform hover:shadow-xl hover:rounded-md hover:cursor-pointer">
                            <div class="overflow-hidden ">
                                <img src={{asset('storage/product_images/' . $item->image_product)}} alt="{{$item->name_product}}" class="w-full   ">
                            </div>
                            <div class="p-4">
                                <h1 class="font-semibold text-lg font-mono ">{{$item->name_product}}</h1>
                                <p class="text-base font-mono ">Rp {{number_format($item->price_product,0,',','.')}}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div>
                        Not Product
                    </div>
                @endforelse
            </div>
        </div>


    </div>
    @include('./Components/footer')
</body>

</html>
