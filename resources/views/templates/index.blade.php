@extends ('..layouts.main')

@section ('upper-menu')
    <x-index-actions :path="$path[0]['path']"/>
@endsection

@section ('content')
    @if (count($data) > 0)
        <div class="bg-slate-50 p-2 mt-2 rounded-md">
            <table class="table-fixed border-collapse p-2 table border-b border-slate-200 text-left text-sm font-light">
                <thead>
                    <tr>@yield('table-header')</tr>
                </thead>
                <tbody>
                    @yield('table-content')
                </tbody>
            </table>
            <x-paginator :meta="$meta"/>
        </div>
    @else
        <div class="bg-slate-50 p-2 mt-2 rounded-md h-3/4 flex items-center justify-center flex-col">
            <x-bi-exclamation-triangle class="text-slate-400 w-1/2 h-1/2" />
            <p class="text-slate-400 uppercase text-center font-bold">
                Desculpe, mas não fomos capazes de<br> encontrar nenhum registro!
            </p>
        </div>
    @endif
    <x-filters :filters="$filters" :path="$path[0]['path']" />
@endsection
