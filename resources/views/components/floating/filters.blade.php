
<div id="filter-container" class="h-100 w-25 p-3" style="display: none">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="fs-4 text-center" class="d-flex align-items-center justify-content-center">Filtros</h1>
        <x-bi-x-circle-fill class="filter-activation filter-activation-icon" width="20" height="20" />
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/components/filter.js')
@endPushOnce
