@extends ('..layouts.main')

@once
    @push('styles')
        @vite([
            'resources/css/books.css',
            'resources/css/floating.css',
            'resources/css/components/filters.css',
        ])
    @endpush
@endonce

@section ('upper-menu')
    <x-index-actions :path="$path[0]['path']"/>
@endsection

@section ('content')
    <div>
        @if (count($data) > 0)
            <table>
                <thead>
                    <tr>@yield('table-header')</tr>
                </thead>
                <tbody>
                    @yield('table-content')
                </tbody>
            </table>
            <x-paginator :meta="$meta"/>
        @else
            <div>
                <x-bi-exclamation-triangle />
                <p>
                    Desculpe, mas não fomos capazes de encontrar nenhum registro!
                </p>
            </div>
        @endif
    </div>
    <x-filters :filters="$filters" :path="$path[0]['path']" />
@endsection
