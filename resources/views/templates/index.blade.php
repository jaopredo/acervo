@extends ('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/contentLoader.js'])
    @endpush
@endonce

@section ('upper-menu')
    <div class="buttons-container">
        <button class="btn btn-primary btn-dark">FILTRO</button>
        <a href="/books/create" class="btn btn-primary btn-success">CRIAR</a>
    </div>
@endsection

@section ('content')
    <table class="table mt-4">
        @yield('content-table')
        <tfoot>
            <tr>
                <td colspan="2">Selecione a Página</td>
                <td colspan="3">
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
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
