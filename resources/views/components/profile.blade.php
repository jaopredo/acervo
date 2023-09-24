<div
    class="profile-container floating-container d-flex flex-column align-items-stretch justify-content-center"
    id="profile-container"
>
    <section>
        <p class="m-0 fs-4 font-weight-bold">{{ auth()->user()->name }}</p>
        <p class="m-0">{{ auth()->user()->email }}</p>
    </section>

    <ul class="mb-0 mt-1 p-0 d-flex flex-column align-items-stretch">
        <li><a href="{{route('profile')}}" class="profile-options-item">Meu Perfil <x-bi-person class="profile-list-icon" /></a></li>
        <li><a href="/admin" class="profile-options-item">Admins <x-bi-shield-fill class="profile-list-icon" /></a></li>
        <li><form action="/logout" method="POST"> @csrf
            <button type="submit" class="profile-options-item">Sair <x-bi-box-arrow-right class="profile-list-icon" /></button>
        </form></li>
    </ul>
</div>
