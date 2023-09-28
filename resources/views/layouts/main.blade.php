<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acervo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    @bukStyles(true)
    @vite([
        'resources/css/layout.css',
        'resources/css/app.css',
        'resources/css/floating.css',
        'resources/css/components/aside.css'
    ])

    @stack('styles')
</head>
<body>
    <div class="interface position-relative">
        <div class="filter-cover" style="display: none"></div>
        <header class="header">
            <a href="/" class="site-brand">
                <img src="{{ asset('img/logo-ceara.png') }}" alt="LOGO" class="logo">
            </a>

            <div class="icons-containers-container">
                <div id="notification-icon-container" class="notification-icon-container btn btn-primary btn-success floating-toggler">
                    <x-bi-bell class="notification-icon" width="16" />
                </div>
                <div class="profile-icon-container floating-toggler" id="profile-icon-container">
                    <x-bi-person-circle class="profile-icon" width="16" />
                    <x-bi-gear class="gear-icon" width="16" />
                </div>
            </div>

            <div id="notification-container" class="notification-container floating-container">
                <h2>NOTIFICAÇÕES</h2>
            </div>
            <x-profile/>
        </header>
        <aside class="aside d-flex flex-column align-items-stretch justify-content-start">
            <nav class="navbar">
                <x-side-menu :actual="$path[0]['path']"/>
            </nav>
        </aside>
        <main id="content-container" class="position-relative overflow-x-hidden">
            <div class="upper-menu">
                <x-routes-list :path="$path" />

                @yield('upper-menu')
            </div>
            <div class="content-container">
                @yield('content')
            </div>
        </main>
        @if (session('msg'))
            <div class="msg alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js" integrity="sha512-hIdLfMv+eH9Ntu96uoHW9t0bMyiHRyKM8yQHZ09+th6TWagWlFonarbJfHrJb+me8wzaNnk1DVhqfOMwNKRq/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js" integrity="sha512-OyVk2res2p8ZxK6Jf0Z6a9LhiQVn97RqQOF/G5p9rHm7W09tVg6wqbFG6TnDbLxyeEJb39PXXNsGQMmw1wlouQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/js/layout.js')
    @stack('scripts')
    @bukScripts(true)
</body>
</html>
