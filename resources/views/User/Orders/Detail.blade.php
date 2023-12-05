<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokoGue - Orders</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="px-3 md:px-14 shadow-md">
        <div class="flex justify-between py-4 ">
            <div class="flex gap-2">
                <a href="/">
                    <img class="w-14 h-14 " src="{{ asset('storage/images/logo.png') }}" alt="logo">
                </a>
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button"
                    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
            <aside id="default-sidebar"
                class="fixed h-[250px] w-full z-40 transform transition-transform -translate-y-full duration-300 ease-in-out"
                aria-label="Sidebar">
                <div class="w-full bg-white h-[250px] justify-between flex">
                    <div>
                        <input type="text">
                    </div>
                    <div>
                        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                            aria-controls="default-sidebar" type="button" class="uppercase border-l pl-2">
                            cancel
                        </button>
                    </div>
                </div>
            </aside>
            <div>
    
            </div>
        </div>
    </nav>
</body>

</html>
