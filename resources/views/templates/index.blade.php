@extends ('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/search.js'])
    @endpush
@endonce

@section ('upper-menu')
    <form id="search-form" class="form-inline" method="GET" action="/books">
        <input id="search-input" class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">PROCURAR</button>
    </form>

    <div>
        <a href="{{ $path[0]['path'] }}/create" class="btn btn-primary btn-success">CRIAR</a>
    </div>
@endsection

@section ('content')
    <div class="pt-1 mt-4 rounded-2 bg-white d-flex flex-column align-items-center justify-content-end">
        @if (count($data) > 0)
            <table class="table" style="table-layout: fixed">
                @yield('content-table')
            </table>
            <div class="w-100 px-4 pb-2 d-flex align-items-center justify-content-between">
                <div>Selecione a Página</div>
                <div>
                    <div class="p-links-container d-flex flex-row align-items-center justify-content-end">
                        <div class="d-flex flex-row align-items-center justify-content-end p-links-container-container">
                            @foreach ($meta->links as $link)
                                @if ($link->label != '...')
                                    <a
                                        href="{{ $link->url }}"
                                        class="pagination-link {{ $link->active?'pagination-link-active':'' }}"
                                    >{!! $link->label !!}</a>
                                @else
                                    <span class="pagination-link-separator">
                                        {!! $link->label !!}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="no-data-error d-flex align-items-center justify-content-center flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-sign-dead-end" viewBox="0 0 16 16">
                    <path d="M4.783 6v2h.69c.593 0 .886-.359.886-1.002S6.07 6 5.473 6h-.69Zm.333.28h.32c.395 0 .582.24.582.722 0 .48-.186.718-.581.718h-.321V6.28ZM7.82 7.72h-.918v-.602h.863V6.85h-.863v-.57h.917V6H6.571v2H7.82v-.28Zm.573-.274L8.216 8h-.34l.688-2h.371l.689 2h-.352l-.177-.554h-.702Zm.627-.255-.268-.845h-.015l-.27.845h.553ZM9.746 6v2h.69c.593 0 .886-.359.886-1.002S11.032 6 10.436 6h-.69Zm.333.28h.32c.394 0 .582.24.582.722 0 .48-.186.718-.582.718h-.32V6.28Zm-4.173 4.44h.917V11H5.575V9h1.248v.28h-.917v.57h.863v.268h-.863v.602Zm1.489.28V9.56h.013L8.344 11h.292V9h-.32v1.436h-.014L7.369 9h-.293v2h.319Zm1.56 0V9h.69c.596 0 .886.355.886.998S10.238 11 9.645 11h-.69Zm.653-1.72h-.32v1.44h.32c.395 0 .581-.239.581-.718 0-.481-.187-.722-.581-.722Z"/>
                    <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435Zm-1.4.7a.495.495 0 0 1 .7 0l6.516 6.515a.495.495 0 0 1 0 .7L8.35 14.866a.495.495 0 0 1-.7 0L1.134 8.35a.495.495 0 0 1 0-.7L7.65 1.134Z"/>
                </svg>
                <p class="no-data-error-text">
                    Desculpe, mas não fomos capazes de encontrar nenhum registro!
                </p>
            </div>
        @endif
    </div>
@endsection
