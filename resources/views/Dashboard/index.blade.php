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
            <h1 class="text-3xl font-semibold mb-4">Sepatu Hypebeast BJIRR!!</h1>
            <div class=" ld:grid lg:grid-cols-3 lg:gap-3 md:grid md:grid-cols-2 md:gap-2 ">

            </div>
        </div>


    </div>
    @include('./Components/footer')
</body>

</html>
