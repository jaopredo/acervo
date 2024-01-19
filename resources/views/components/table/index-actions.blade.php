<div class="flex items-center justify-center gap-2">
    @if (Route::has(str_replace('/', '', $path) . ".create"))
    <a href="{{ $path }}/create" class="flex justify-center bg-leaf-dark active:bg-leaf-darker hover:bg-leaf p-1.5 rounded-lg text-white items-center gap-2 w-24">
        <x-bi-plus-circle /> CRIAR
    </a>
    @endif

    @if (count($filters) > 0)
        <button class="filter-activation flex justify-center bg-night-dark active:bg-night-darker hover:bg-night-light p-1.5 rounded-lg text-white items-center gap-2 w-24">
            <x-bi-filter /> FILTROS
        </button>
    @endif
</div>
