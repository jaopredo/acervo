<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acervo</title>

    @vite([
        /* PRINCIPAL */
        'resources/css/app.css',

        /* COMPONENTES */
        'resources/css/components/floating.css'
    ])
    @stack('styles')
</head>
<body>
    <div id="interface">
        <x-header/>

        <x-side-menu :actual="$path[0]['path']"/>

        <main id="content">
            <div>
                <x-routes-list :path="$path" />

                @yield('upper-menu')
            </div>
            <div>
                @yield('content')
            </div>
        </main>
        <!-- @if (session('msg'))
            <div class="msg alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
        @endif -->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js" integrity="sha512-hIdLfMv+eH9Ntu96uoHW9t0bMyiHRyKM8yQHZ09+th6TWagWlFonarbJfHrJb+me8wzaNnk1DVhqfOMwNKRq/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" integrity="sha512-OyVk2res2p8ZxK6Jf0Z6a9LhiQVn97RqQOF/G5p9rHm7W09tVg6wqbFG6TnDbLxyeEJb39PXXNsGQMmw1wlouQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/layout.js')
    @stack('scripts')
</body>
</html>
