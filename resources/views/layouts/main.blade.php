<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acervo</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

    @vite([
        /* PRINCIPAL */
        'resources/css/app.scss',

        /* COMPONENTES */
        'resources/css/components/floating.scss'
    ])
    @stack('styles')
</head>
<body>
    <div id="interface" class="overflow-hidden">
        <div class="filter-cover absolute bottom-0 left-0 w-full bg-gray-950 z-10 opacity-80" style="height: 90vh; display: none;"></div>
        <x-header/>

        <x-side-menu :actual="count($path)>0?$path[0]['path']:'/dashboard'"/>

        <main id="content"
            class="scrollable relative bg-gray-200 rounded-tl-lg p-3 overflow-y-auto overflow-x-hidden
            flex flex-col items-stretch justify-start">
            <div class="flex items-center justify-between p-3" style="grid-area: upper-menu;">
                <x-routes-list :path="$path" />

                @yield('upper-menu')
            </div>
            <div class="h-fit">
                @yield('content')
                <x-delete-confirmation/>
            </div>
        </main>
        @if (session('msg'))
            <div
                class="msg alert alert-success fixed -right-44 top-16 w-96 z-30 text-left pl-2 pr-2
                flex items-baseline gap-2" role="alert"
            >
                <div class="flex">
                    <x-bi-check-circle-fill class="text-green-500 w-5 h-5" />
                </div>
                <div class="flex flex-col">
                    <h2 class="font-semibold text-emerald-900">Sucesso!</h2>
                    <p class="text-emerald-700 text-sm">{{ session('msg') }}</p>
                </div>
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js" integrity="sha512-hIdLfMv+eH9Ntu96uoHW9t0bMyiHRyKM8yQHZ09+th6TWagWlFonarbJfHrJb+me8wzaNnk1DVhqfOMwNKRq/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" integrity="sha512-OyVk2res2p8ZxK6Jf0Z6a9LhiQVn97RqQOF/G5p9rHm7W09tVg6wqbFG6TnDbLxyeEJb39PXXNsGQMmw1wlouQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    @vite('resources/js/layout.js')
    @stack('scripts')
</body>
</html>
