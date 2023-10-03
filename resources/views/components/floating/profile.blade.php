<div
    class="floating-container"
    id="profile-container"
>
    <section>
        <p class="text-center font-semibold">{{ auth()->user()->name }}</p>
        <p class="mb-2 border-b border-slate-300">{{ auth()->user()->email }}</p>
    </section>

    <ul class="flex flex-col items-stretch">
        <li>
            <a href="{{route('profile')}}"
                class="flex items-center justify-between w-full hover:bg-slate-200 p-1 rounded-sm"
            >Meu Perfil <x-bi-person/></a>
        </li>
        <li>
            <a href="/admin"
                class="flex items-center justify-between w-full hover:bg-slate-200 p-1 rounded-sm"
            >Admins <x-bi-shield-fill/></a>
        </li>
        <li>
            <x-logout
                class="flex items-center justify-between w-full hover:bg-slate-200 p-1 rounded-sm"
            >Sair <x-bi-box-arrow-right/></x-logout>
        </li>
    </ul>
</div>
