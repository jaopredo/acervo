{{-- @once
    @push('styles')
        @vite('resources/css/components/header.css')
    @endpush
@endonce --}}

<header id="header" class="flex items-center justify-between p-3 z-30 bg-neutral-50">
    <a href="/" class="flex items-center justify-center gap-2 text-xl text-leaf">
        <x-bi-book-fill width="27" height="27" />
        <p class="font-bold">ACERVO</p>
    </a>

    <div class="flex items-center justify-center gap-3">
        <div id="notification-icon-container"
            class="relative group hover:cursor-pointer floating-toggler rounded-lg flex items-center justify-between gap-2 bg-leaf-lighter hover:bg-leaf p-2 transition-colors"
        >
            <x-bi-bell width="20" height="20" class="text-leaf group-hover:text-leaf-lighter transition-colors" />

            @if (count(auth()->user()->unreadNotifications) > 0)
                <div class="flex items-center justify-center text-leaf group-hover:text-leaf-lighter transition-colors">
                    {{count(auth()->user()->unreadNotifications)}}
                </div>
            @endif
        </div>
        <div id="profile-icon-container"
            class="group hover:cursor-pointer floating-toggler rounded-3xl flex items-center justify-between gap-2 w-19 bg-night-lighter hover:bg-night p-2 transition-colors"
        >
            <div>
                <x-bi-person-circle width="26" height="26" class="text-night group-hover:text-night-lighter transition-colors" />
            </div>
            <div>
                <x-bi-gear width="26" height="26" class="text-night group-hover:text-night-lighter transition-colors"/>
            </div>
        </div>
    </div>

    <x-notifications/>
    <x-profile/>
</header>
