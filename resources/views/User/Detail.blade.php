<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ $product->name_product }} - TokoGue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .size::-webkit-scrollbar {
        display: none;
    }
</style>

<body>
    @include('../Components/navbar')
    <div class="mx-3 md:mx-16 mt-10">
        @if (session('success'))
            <div class="mt-5">
                <div id="alert-3"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
              <span class="font-medium">Gagal membuat orders:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
              </ul>
            </div>
          </div>
        @endif
        <div class="my-10">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#969D43] ">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Homepage
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->name_product }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="md:grid md:grid-cols-2 gap-5 my-5">
                <div>
                    <img src={{ asset('storage/product_images/' . $product->image_product) }}
                        alt="{{ $product->name_product }}" class="w-full">
                </div>
                <div class="pt-5 md:pt-10 md:px-5">
                    <h1 class="text-lg md:text-xl lg:text-3xl font-mono">{{ $product->name_product }}</h1>
                    <h1 class="font-mono md:text-lg">{{ $product->name_brand }}</h1>
                    <h1 class="text-base md:text-lg lg:text-xl my-2 font-mono">Rp
                        {{ number_format($product->price_product, 0, ',', '.') }}</h1>
                    <div class="my-6">
                        <p class="font-mono ">Select Size</p>

                        <form action={{ route('buy') }} method="post">
                            @csrf
                            <div class="flex gap-4 py-2 overflow-x-auto size">
                                @foreach ($size as $item)
                                    <div>
                                        <input type="radio" name="size" value="{{ $item->uk_size }}"
                                            id="{{ $item->id_size }}" class="hidden peer">
                                        <label for={{ $item->id_size }}
                                            class="inline-flex items-center justify-between w-[70px] p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-[#969D43] hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                            <div class="block mx-auto">
                                                {{ $item->uk_size }}
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div id="default-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Confrim Your Order
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="default-modal">
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
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="border-b pb-3">
                                                @if (count($alamat) != 0)
                                                <p class="font-mono mb-2">Pilih alamat anda</p>
                                                @endif
                                                @if (count($alamat) == 0)
                                                    <p class="font-mono">Anda belum memiliki alamat, <a href="/alamat" class="text-blue-600 hover:underline">Tamabah alamat</a></p>
                                                @endif
                                                <div class="grid grid-cols-3 gap-4">
                                                    @foreach ($alamat as $alamats)
                                                    <div>
                                                        <input type="radio" name="alamat"
                                                        value="{{ $alamats->id_alamat }}" id="{{ $alamats->id_alamat }}"
                                                        class="hidden peer">
                                                    <label for={{ $alamats->id_alamat }}
                                                        class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-[#969D43] hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                                        <div class="">
                                                            <h1 class="font-mono font-semibold">{{ $alamats->name_penerima }}</h1>
                                                            <p class="font-mono text-gray-400">{{ $alamats->no_hp }}</p>
                                                            <p class="font-mono text-gray-400"> {{ Str::limit($alamats->alamat_detail, 10, '...') }}</p>
                                                        </div>
                                                    </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_product" value="{{$product->id_product}}">
                                            <input type="hidden" name="harga" value="{{$product->price_product}}">
                                            <input type="hidden" name="pembayaran" value="cod">

                                            <div class="border-b pb-3">
                                                <p class="font-mono"> Jumlah Pesanan</p>
                                                <div class="flex gap-3 w-full my-3">
                                                    <div class="w-[10%] cursor-pointer text-2xl font-bold  flex justify-center items-center" onclick="decrease()">-</div>
                                                     <input type="number" id="counterInput" name="qty" min="1" value="1" max="{{$product->stock_product}}" class="w-[80%]">
                                                    <div class="w-[10%] cursor-pointer text-2xl font-bold  flex justify-center items-center" onclick="increase()">+</div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-mono">Metode Pembayaran</p>
                                                <h1 class="w-full border p-3 rounded border-[#969D43] mt-1 cursor-pointer">
                                                    COD ( Cash on Delivery )
                                                </h1>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="mx-5 pb-3">
                                            @if (count($alamat) == 0)
                                            <button class="btn btn-success w-full " disabled >Orders</button>
                                            @else
                                                <button class="btn btn-success w-full " >Orders</button>
                                            @endif
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="flex gap-3 my-5">
                            <div data-modal-target="default-modal" data-modal-toggle="default-modal"
                                class="btn md:w-[90%] hover:bg-[#969D43] text-white bg-[#C8D439] duration-150 w-3/4">
                                Buy
                                Now</div>

                            @if (empty($pav))
                                <form action={{ route('addPav') }} method="post" class="md:w-[10%] w-1/4">
                                    @csrf
                                    <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                                    <button type="submit"
                                        class="btn  text-red-600 btn-outline hover:bg-red-600 hover:border-white w-full"><i
                                            class="fa-sharp fa-regular fa-heart text-lg"></i></button>
                                </form>
                            @else
                                <form action={{ route('unPav') }} method="post" class="md:w-[10%] w-1/4">
                                    @csrf
                                    <input type="hidden" name="idPav" value="{{ $pav->id_pavpro }}">
                                    <button data-tooltip-target="tooltip-light" data-tooltip-style="light"
                                        type="submit"
                                        class="btn  text-red-600 btn-outline hover:bg-red-600 hover:border-white w-full"><i
                                            class="fa-solid fa-heart text-lg"></i>
                                    </button>
                                    <div id="tooltip-light" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                        Hapus Favorite
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                </form>
                            @endif

                        </div>
                        <div>
                            <div id="accordion-flush" data-accordion="collapse"
                                data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                                data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-2">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                        data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                        aria-controls="accordion-flush-body-2">
                                        <span>Description</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-2" class="hidden"
                                    aria-labelledby="accordion-flush-heading-2">
                                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $product->desc_product }}
                                        </p>
                                    </div>
                                </div>
                                <h2 id="accordion-flush-heading-3">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-[#969D43] border-b border-gray-200 gap-3"
                                        data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                        aria-controls="accordion-flush-body-3">
                                        <span>Authentic. Trusted. Best Price.</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-3" class="hidden"
                                    aria-labelledby="accordion-flush-heading-3">
                                    <div class="py-5 border-b border-gray-200 ">
                                        <p class="mb-2 text-gray-500 ">Dengan prosedur yang tepat, seluruh produk telah
                                            melalui proses pemeriksaan yang teliti dan mempunyai standar kualitas
                                            terpercaya pada setiap produk yang dijual. Berlakunya garansi dimulai dari
                                            produk diterima hingga satu minggu kedepan. Jika memiliki keluhan tentang
                                            produk yang kamu beli bisa langsung hubungi customer service kami.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Modal Buy --}}

                <!-- Main modal -->


                {{-- Akhir --}}
            </div>
            <div class="border-t">
                <p class="text-center py-2 font-mono">Similiar Product</p>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    @foreach ($sameProduct as $item)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('../Components/footer')



    <script>
        function increase() {
            // Mendapatkan elemen input
            
            var inputElement = document.getElementById('counterInput');

            // Mendapatkan nilai saat ini dan menambahkannya
            var currentValue = parseInt(inputElement.value);
            inputElement.value = currentValue + 1;
        }

        function decrease() {
            // Mendapatkan elemen input
           
            var inputElement = document.getElementById('counterInput');

            // Mendapatkan nilai saat ini dan mengurangkannya, tetapi tidak kurang dari 1
            var currentValue = parseInt(inputElement.value);
            inputElement.value = Math.max(currentValue - 1, 1);
        }
    </script>
</body>

</html>
