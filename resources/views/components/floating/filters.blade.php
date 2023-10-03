
<div id="filter-container" data-activated="0" class="absolute top-0 right-0 h-full w-2/5 p-3 z-20 bg-neutral-100 shadow-lg" style="right: -700px">
    <div class="flex flex-col items-stretch justify-start">
        <div class="flex items-center justify-between text-xl font-bold">
            <h1 class="flex items-center justify-center">Filtros</h1>
            <x-bi-arrow-right width="20" height="20" class="filter-activation hover:cursor-pointer" />
        </div>
        <form class="flex flex-col items-stretch justify-center w-full mt-2">
            @foreach ($filters as $filter)
                <div class="input-container">
                    <label for="{{$filter['name']}}">{{$filter['label']}}</label>
                    <input class="input" type="text" data-operator="{{$filter['operator']}}" id="{{$filter['name']}}" name="filters[{{$filter['name']}}][{{$filter['operator']}}]">
                </div>
            @endforeach
            <div class="flex items-center justify-end gap-2">
                <a href="{{$path}}"
                    class="bg-white hover:bg-gray-100 text-gray-800 text-sm font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                >
                    LIMPAR
                </a>
                <button
                    class="flex bg-night-dark text-sm active:bg-night-darker hover:bg-night-light py-2 px-4 rounded text-white items-center gap-1 font-semibold"
                >
                    APLICAR
                </button>
            </div>
        </form>
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/components/filter.js')
@endPushOnce
