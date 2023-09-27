
<div id="filter-container" data-activated="0" class="h-100 w-50 p-3">
    <div class="d-flex flex-column align-items-stretch justify-content-start">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-4 text-center" class="d-flex align-items-center justify-content-center">Filtros</h1>
            <x-bi-arrow-right class="filter-activation filter-activation-icon" width="20" height="20" />
        </div>
        <form class="d-flex flex-column align-items-stretch justify-content-center w-100">
            @foreach ($filters as $filter)
                <div class="mb-2">
                    <label for="{{$filter['name']}}">{{$filter['label']}}</label>
                    <input type="text" data-operator="{{$filter['operator']}}" id="{{$filter['name']}}" name="filters[{{$filter['name']}}][{{$filter['operator']}}]" class="form-control">
                </div>
            @endforeach
            <div class="d-flex align-items-center justify-content-end gap-2">
                <a href="{{$path}}" class="btn btn-light" style="background-color: #dbdbdb;">LIMPAR</a>
                <button class="btn btn-dark">APLICAR</button>
            </div>
        </form>
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/components/filter.js')
@endPushOnce
