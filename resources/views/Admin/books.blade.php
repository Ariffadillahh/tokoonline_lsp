<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="md:flex">
        @include('./Components/adminSideBar')
        <div class="mx-4 w-full">
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
            <nav class="flex mt-6 " aria-label="Breadcrumb">
                <ul class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 mr-1 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"> Daftar Buku

                            </span>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="mt-5">
                <div class="my-4">

                    <!-- Modal toggle -->
                    <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                        class="btn btn-primary btn-outline my-5" type="button">
                        Tambah Buku
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
                                        Static modal
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="staticModal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div>
                                    <form class=" mx-3 my-5" action={{ route('addbook') }} method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="first_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('judul') text-red-600 @enderror">Judul
                                                </label>
                                                <input type="text" id="first_name"
                                                    class="@error('judul') border-red-600 text-red-600 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ old('judul') }}" name="judul">
                                                @error('judul')
                                                    <p class="text-red-600 py-1">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div>
                                                <label for="last_name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('author')  text-red-600 @enderror">Author
                                                </label>
                                                <input type="text" id="last_name"
                                                    class=" @error('author') border-red-600 text-red-600 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ old('author') }}" name="author">
                                                @error('author')
                                                    <p class="text-red-600 py-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="company"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('deskripsi')  text-red-600 @enderror">Description</label>
                                                <input type="text" id="company"
                                                    class="@error('deskripsi') border-red-600 text-red-600 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    value="{{ old('deskripsi') }}" name="deskripsi">
                                                @error('deskripsi')
                                                    <p class="text-red-600 py-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="countries"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('jenis_buku') text-red-600 @enderror">Jenis
                                                    Buku</label>
                                                <select id="countries" name="jenis_buku"
                                                    class="@error('jenis_buku') text-red-600 border-red-600 @enderror bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option disabled selected
                                                        class="@error('jenis_buku') border-red-600 text-red-600 @enderror">
                                                        Pilih jenis buku</option>
                                                    @forelse ($jenisbuku as $item)
                                                        <option class="capitalize" value="{{ $item->jenis_buku }}">
                                                            {{ $item->jenis_buku }}
                                                        </option>
                                                    @empty
                                                        <option value="">tidak ada</option>
                                                    @endforelse


                                                </select>
                                                @error('jenis_buku')
                                                    <p class="text-red-600 py-1">{{ $message }}</p>
                                                @enderror
                                            </div>


                                        </div>
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('cover_buku') text-red-600 @enderror"
                                            for="file_input">Thumbnail</label>
                                        <input
                                            class=" @error('cover_buku') border-red-600 text-red-600 @enderror block w-full text-sm  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input" type="file" name="cover_buku">
                                        @error('cover_buku')
                                            <p class="text-red-600 py-1">{{ $message }}</p>
                                        @enderror

                                        <label
                                            class="block mb-2 text-sm font-medium mt-4 text-gray-900 dark:text-white @error('buku') text-red-600 @enderror"
                                            for="file_input">Buku</label>
                                        <input
                                            class=" @error('buku') border-red-600 text-red-600 @enderror block w-full text-sm  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            id="file_input" type="file" name="buku">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                            PDF, Docx, Doc, Rtf</p>
                                        @error('buku')
                                            <p class="text-red-600 py-1">{{ $message }}</p>
                                        @enderror
                                        <button type="submit" class="btn btn-primary w-full my-4">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Judul
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Author
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis Buku
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        thumbnail
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($buku as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $i++ }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->judul }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->author }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Str::limit($item->deskripsi, 35) }}

                                        </td>
                                        <td class="px-6 py-4 capitalize">
                                            {{ $item->jenis_buku }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img class="w-10 h-10 "
                                                src="{{ asset('storage/thumbnail/' . $item->cover_buku) }}"
                                                alt="user photo">
                                        </td>
                                        <td class="px-6 py-4 ">


                                            <!-- Modal toggle -->
                                            <button data-modal-target="edit{{ $item->id }}"
                                                data-modal-toggle="edit{{ $item->id }}"
                                                class="block text-blue-600 " type="button">
                                                Edit
                                            </button>

                                            <!-- Main modal -->
                                            <div id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="edit{{ $item->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="px-6 py-6 lg:px-8">
                                                            <h3
                                                                class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                                Edit Buku</h3>
                                                            <form class="space-y-6" action={{ route('updatebook') }}
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="flex gap-2">
                                                                    <div class="w-full">
                                                                        <label for="judul"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JUDUL</label>
                                                                        <input type="text" name="judul"
                                                                            id="judul"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            value="{{ $item->judul }}">
                                                                        <input type="hidden"
                                                                            value="{{ $item->id }}"
                                                                            name="id">
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <label for="author"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">AUTHOR</label>
                                                                        <input type="text" name="author"
                                                                            id="author"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            value="{{ $item->author }}">
                                                                    </div>
                                                                </div>
                                                                <div class="flex gap-2">
                                                                    <div class="w-full">
                                                                        <label for="deskripsi"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DESKRIPSI</label>
                                                                        <input type="text" name="deskripsi"
                                                                            id="deskripsi"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                            value="{{ $item->deskripsi }}">
                                                                    </div>
                                                                    <div class="w-full">
                                                                        <label for="jenis_buku"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JENIS
                                                                            BUKU</label>
                                                                        <select name="jenis_buku" id="jenis_buku"
                                                                            class="w-full rounded">
                                                                            <option>{{ $item->jenis_buku }}
                                                                            </option>
                                                                            @foreach ($jenisbuku as $itemz)
                                                                                <option
                                                                                    value="{{ $itemz->jenis_buku }}">
                                                                                    {{ $itemz->jenis_buku }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">THUMBNAIL
                                                                    </label>
                                                                    <img src="{{ asset('storage/thumbnail/' . $item->cover_buku) }}"
                                                                        class="w-1/2" alt="{{ $item->judul }}">
                                                                    <input type="file" name="cover"
                                                                        class="w-full border">
                                                                </div>
                                                                <div>
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BUKU
                                                                    </label>
                                                                    <input type="file" name="buku"
                                                                        class="w-full border">
                                                                </div>
                                                                <button
                                                                    class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-800">
                                                                    SUBMIT
                                                                </button>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button data-modal-target="{{ $item->id }}"
                                                data-modal-toggle="{{ $item->id }}" class="text-red-600"
                                                type="button">
                                                Hapus
                                            </button>
                                            <div id="{{ $item->id }}" tabindex="-1"
                                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                <div class="relative w-full max-w-md max-h-full">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-hide="{{ $item->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                        <div class="p-6 text-center">
                                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                            <h3
                                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                Are you
                                                                sure
                                                                you want to delete comment by
                                                                {{ $item->judul }}</h3>
                                                            <div class="flex justify-center">
                                                                <form action={{ route('hapusbook') }} method="post">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $item->id }}"
                                                                        name="id">
                                                                    <button type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </form>
                                                                <button data-modal-hide="{{ $item->id }}"
                                                                    type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                    cancel</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Tidak ada buku</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>
