<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acervo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    @vite([
        'resources/css/layout.css',
        'resources/css/app.css',
        'resources/css/floating.css'
    ])
    @stack('styles')
</head>
<body>
    <div class="interface">
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
                <menu class="navbar-nav mb-2 mb-lg-0 flex-column">
                    <li class="nav-item menu-item d-flex align-items-stretch">
                        <a href="/books" @class([
                            'nav-link',
                            'active' => $path[0]['path']=='/books'
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                                <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                            </svg>
                            LIVROS
                        </a>
                    </li>
                    <li class="nav-item menu-item">
                        <a href="/groups" @class([
                            'nav-link',
                            'active' => $path[0]['path']=='/groups'
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-fill" viewBox="0 0 16 16">
                                <path d="M0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zM2 3a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 0-1h-11A.5.5 0 0 0 2 3zm2-2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7A.5.5 0 0 0 4 1z"/>
                            </svg>
                            AGRUPAMENTOS
                        </a>
                    </li>
                    <li class="nav-item menu-item">
                        <a href="/categories" @class([
                            'nav-link',
                            'active' => $path[0]['path']=='/categories'
                        ])>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                            </svg>
                            CATEGORIAS
                        </a>
                    </li>
                </menu>
            </nav>
        </aside>
        <main id="content-container" class="position-relative">
            <div class="upper-menu">
                <div class="links-container d-flex flex-row align-items-center justify-content-start">
                    @foreach ($path as $item)
                        <div class="d-flex align-items-center justify-content-center">
                            <span class="links-separator d-flex flex-row align-items-center justify-content-start">
                                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <a class="link-path" href="{{$item['path']}}">{{$item['name']}}</a>
                        </div>
                    @endforeach
                </div>

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
</body>
</html>
