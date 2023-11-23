<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking | {{ $booking->judul }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('./Components/navbar')
    <div class="h-screen md:mx-10 mx-3 lg:mx-20">
        <div tabindex="0" class="collapse collapse-arrow border border-red-300  mt-14 ">
            <div class="collapse-title text-xl font-medium border-b border-red-300/30">
                {{ $booking->judul }}
            </div>
            <div class="collapse-content ">
                <p class="pt-2">{{ $booking->deskripsi }}</p>
                <P>Penulis : {{ $booking->author }}</P>
                <P>Tema : {{ $booking->jenis_buku }}</P>
            </div>
        </div>
        <h1 class="my-6 text-2xl font-bold">Data diri</h1>
        <form action={{ route('bokingaction') }} method="POST">
            @csrf
            <input type="hidden" value="{{ $booking->judul }}" name="buku">
            <input type="hidden" value="{{ Auth()->user()->id }}" name="id_user">
            <input type="hidden" value="{{ $booking->id }}" name="id_buku">
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="nama_peminjam" id="floating_password"
                    class="@error('nama_peminjam') border-red-600 text-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    value="{{ old('nama_peminjam') }}" />
                <label for="floating_password"
                    class="@error('nama_peminjam') text-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Peminjam</label>
                @error('nama_peminjam')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-6 group">

                <label for="underline_select" class="sr-only">Underline select</label>
                <select id="underline_select" name="nama_penjaga"
                    class="@error('nama_penjaga') border-red-600 text-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected disabled class="@error('nama_penjaga') text-red-600 @enderror">Penjaga Perpus
                    </option>
                    @forelse ($penjaga as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_penjaga }}</option>
                    @empty
                        <option value="" disabled>Tidak ada penjaga saat ini</option>
                    @endforelse
                </select>
                @error('nama_penjaga')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="date" name="tgl_pinjam" id="floating_first_name"
                        class="@error('tgl_pinjem') border-red-600 text-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_first_name"
                        class="@error('tgl_pinjam') text-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dari
                        tanggal</label>
                    @error('tgl_pinjam')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="date" name="tgl_balikin" id="floating_last_name"
                        class="@error('tgl_balikin') border-red-600 text-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label for="floating_last_name"
                        class="@error('tgl_balikin') text-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sampai
                        tanggal</label>
                    @error('tgl_balikin')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone"
                        class="block py-2.5 px-0 w-full text-sm cursor-not-allowed text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ Auth()->user()->email }}" required disabled />
                    <label for="floating_phone"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email address</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="no_hp" id="floating_company"
                        class="@error('no_hp') border-red-600 text-red-600 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ old('no_hp') }}" />
                    <label for="floating_company"
                        class="@error('no_hp') text-red-600 @enderror peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Phone</label>
                    @error('no_hp')
                        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="md:justify-between md:flex">
                <a href="/detail/{{ $booking->id }}">
                    <div class="btn btn-primary btn-outline w-full mb-2 md:mb-0">back</div>
                </a>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>


            </div>
        </form>


    </div>
    @include('./Components/footer')
</body>

</html>
