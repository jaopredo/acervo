@extends('..layouts.main')

@section ('upper-menu')
    <x-index-actions :path="$path[0]['path']" :filters="$filters"/>
@endsection

@section('content')
    <div class="bg-slate-50 p-4 mt-2 rounded-md h-full">
        <h1 class="text-2xl text-center font-bold">Informações sobre a leitura</h1>
        <p class="form-error text-center">Os livros citados são aqueles marcados como lidos no aplicativo do multimeios</p>
        <div class="flex items-stretch justify-between mt-3">
            <div class="flex flex-col items-center justify-between w-1/2 gap-2">
                <h2 class="text-lg font-bold">Livros mais lidos</h2>
                <x-pie-chart :values="get_most_repeateds(\App\Models\Read::class)" id="mostReads" />
            </div>
            <div class="flex flex-col items-center justify-between w-1/2 gap-2">
                <h2 class="text-lg font-bold">Livros menos lidos</h2>
                <x-bar-chart :values="get_less_repeateds(\App\Models\Read::class)" id="lessReads" />
            </div>
        </div>
    </div>
@endsection
