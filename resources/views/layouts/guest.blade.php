<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite([
        'resources/css/app.scss'
    ])
</head>
<body>
    <main class="w-100 h-screen flex flex-col items-center justify-center gap-3 bg-slate-200">
        <section>
            <x-bi-book :width="80" :height="80"/>
        </section>
        <section id="content" class="bg-white rounded-md p-4 w-3/4 shadow-lg">
            @yield('content')
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js" integrity="sha512-hIdLfMv+eH9Ntu96uoHW9t0bMyiHRyKM8yQHZ09+th6TWagWlFonarbJfHrJb+me8wzaNnk1DVhqfOMwNKRq/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" integrity="sha512-OyVk2res2p8ZxK6Jf0Z6a9LhiQVn97RqQOF/G5p9rHm7W09tVg6wqbFG6TnDbLxyeEJb39PXXNsGQMmw1wlouQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/login.js')
</body>
</html>
