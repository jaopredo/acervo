<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

    @vite([
        'resources/css/app.scss'
    ])
</head>
<body>
    <main class="w-100 h-screen flex flex-col items-center justify-center gap-3 bg-slate-200">
        <section id="content" class="bg-white rounded-md p-8 w-2/5 shadow-lg">
            <a href="/" class="flex items-center justify-center gap-2 text-xl text-leaf">
                <x-bi-book-fill width="18" height="18" />
                <h1 class="text-sm font-bold">ACERVO</h1>
            </a>
            <p class="text-center text-xl text-leaf font-bold uppercase mt-4">Bem-vindo(a) ao Acervo</p>
            @yield('content')
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js" integrity="sha512-hIdLfMv+eH9Ntu96uoHW9t0bMyiHRyKM8yQHZ09+th6TWagWlFonarbJfHrJb+me8wzaNnk1DVhqfOMwNKRq/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" integrity="sha512-OyVk2res2p8ZxK6Jf0Z6a9LhiQVn97RqQOF/G5p9rHm7W09tVg6wqbFG6TnDbLxyeEJb39PXXNsGQMmw1wlouQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/login.js')
</body>
</html>
