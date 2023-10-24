<div class="flex items-center justify-center gap-2">
    @if (Route::has(str_replace('/', '', $path) . ".create"))
    <a href="{{ $path }}/create" class="flex bg-leaf-dark active:bg-leaf-darker hover:bg-leaf p-1.5 rounded-lg text-white items-center gap-1">
        <x-bi-plus-circle-dotted /> CRIAR
    </a>
    @endif

    @if (count($filters) > 0)
        <button class="filter-activation flex bg-night-dark active:bg-night-darker hover:bg-night-light p-1.5 rounded-lg text-white items-center gap-1">
            <x-bi-filter /> FILTROS
        </button>
    @endif
</div>
