<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | TokoGue</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="md:mx-10 mx-3">
        <form action={{ route('add') }} method="post" enctype="multipart/form-data">
            @csrf
            <div class="md:flex gap-4">
                <div class="w-full">
                    <div class="relative">
                        <input type="text" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="name_product" value="{{ old('name_product') }}" />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Name
                            Product
                        </label>
                    </div>
                    @error('name_product')
                        <p class="text-red-600 w-full">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <div class="relative my-4 md:my-0 ">
                        <input type="text" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="desc_product" value="{{ old('desc_product') }}" />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Description
                            Product
                        </label>
                    </div>
                    @error('desc_product')
                        <p class="text-red-600 -mt-3 mb-3 md:mt-0 w-full">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="md:flex gap-4 md:my-5">
                <div class="w-full">
                    <div class="relative ">
                        <input type="number" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="stock_product" value="{{ old('stock_product') }}" />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Stock
                            Product
                        </label>
                    </div>
                    @error('stock_product')
                        <p class="text-red-600 w-full">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <div class="relative my-4 md:my-0 ">
                        <input type="text" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " name="name_brand" value="{{ old('name_brand') }}" />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Name
                            Brand
                        </label>
                    </div>
                    @error('name_brand')
                        <p class="text-red-600 -mt-3 mb-3 md:mt-0 w-full">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="md:flex gap-4">
                <div class="w-full">
                    <label for="images" class="font-semibold text-sm">Images</label>
                    <input type="file" name="images" id="images" class="w-full border rounded-md">
                    @error('images')
                        <p class="text-red-600 py-1 w-full">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="countries"
                        class="block my-5 md:my-0 mb-2 text-sm font-medium text-gray-900 dark:text-white md:pb-1">Status
                        Product</label>
                    <select id="countries" name="product_status"
                        class="bg-gray-50 border border-gray-300 mb-3 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>PILIH</option>
                        <option value="ready">Ready</option>
                        <option value="sold">Sold</option>
                    </select>
                    @error('product_status')
                        <p class="text-red-600 -mt-3 w-full">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <label for="images" class="font-semibold text-sm ">Size</label>
            <div
                class="w-full md:w-[350px] gap-2 grid grid-cols-5  @error('size') border p-3 rounded-md border-red-500  @enderror">

                @forelse ($chart as $item)
                    <div class="flex ">
                        <input type="checkbox" name="size[]" value="{{ $item->uk_chart }}" id="{{ $item->chart_id }}"
                            class="hidden peer">
                        <label for={{ $item->chart_id }}
                            class="inline-flex items-center justify-between w-[70px] p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                            <div class="block mx-auto">
                                {{ $item->uk_chart }}
                            </div>
                        </label>
                    </div>
                @empty
                    <h1>Empty Size</h1>
                @endforelse

            </div>
            @error('size')
                <p class="text-red-600 py-1 w-full">{{ $message }}</p>
            @enderror

            <button type="submit" class="my-4 w-full bg-blue-500 text-white py-2 rounded uppercase">Submit</button>
        </form>
    </div>

</body>

</html>
