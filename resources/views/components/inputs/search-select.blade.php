<label for="{{$id}}">{{$label}}</label>
<div
    data-id="{{$id}}"
    
    id="multiple-{{$id}}-select"
    class="multiple-select relative input hover:cursor-pointer flex items-stretch justify-between pr-5"
>
    <input
        class="final-input flex-shrink outline-none border-r border-slate-300 max-w-fit hover:cursor-pointer"
        type="text"
        readonly
        id="{{$id}}"

        data-related="{{$id}}"
    >
    <input type="hidden" name="{{$id}}" id="hidden-{{$id}}">
    <input
        placeholder="Digite para aparecer as pesquisas"
        type="text"
        data-related="{{$id}}"
        class="search-input outline-none flex-grow"
        id="search-{{$id}}"

        data-endpoint="{{$endpoint}}"
        data-attr="{{$attr}}"
    >
    <ul id="multiple-select-{{$id}}" data-id="{{$id}}" class="gap-2 flex items-center flex-wrap flex-shrink">
        
    </ul>
    <button type="button" data-id="{{$id}}" id="{{$id}}-button" class="bg-white show-options flex items-center justify-end absolute right-0 top-1/2 -translate-y-1/2">
        <x-ri-arrow-down-s-line :width="18" />
    </button>

    <div id="options-list-{{$id}}" class="options-list z-40 absolute rounded-md py-2" style="display: none"> 
        <ul style="display: none" id="select-option-list-{{$id}}" class="select-option-list scrollable p-0 flex flex-col items-stretch justify-start options-list-list">
        </ul>
        <div id="no-text-{{$id}}" class="text-center font-bold">DIGITE PARA APARECER REGISTROS</div>
        <div style="display: none" id="loading-{{$id}}" class="font-bold flex items-center justify-center gap-1">
            <x-codicon-loading class="w-5 h-5 animate-spin" />
            <p>CARREGANDO</p>
        </div>
        <div id="not-found-{{$id}}" style="display: none;" class="text-center bg-rose-200 p-2 text-rose-700">
            NENHUM REGISTRO ENCONTRADO
        </div>
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/components/searchSelect.js')
@endPushOnce
@pushOnce('styles')
    @vite('resources/css/components/multipleSelect.scss')
@endPushOnce