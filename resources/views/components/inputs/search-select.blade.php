<label for="{{$id}}">{{$label}}</label>
<div
    data-id="{{$id}}"

    id="search-{{$id}}-select"
    @class([
        '!flex',
        '!items-stretch',
        '!justify-center',
        'search-select',
        'multiple-select',
        'relative',
        'input',
        'hover:cursor-pointer',
        'pr-5',
        'gap-1',
        'flex-col' => $multiple
    ])
>
    @if($multiple)
        <ul
            id="search-select-{{$id}}"
            data-id="{{$id}}"
            style="display: none;"

            class="gap-2 flex items-center flex-wrap flex-shrink"
        >
            @foreach ($values as $item)
                <li
                    id="search-list-option-{{$id}}-{{$item->id}}"
                    data-related="{{$id}}"
                    data-id="{{$item->id}}"
                    class="multiple-select-item search-{{$id}}-item"
                >
                    <div class="close-item-icon close-search-icon">
                        <svg width="18" class="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                    <p>{{$item->name}}</p>
                    <input type="hidden" name="{{$id}}[]" value="{{$item->id}}">
                </li>
            @endforeach
        </ul>
    @endif

    <input
        placeholder="Digite para aparecer as pesquisas"
        type="text"
        data-related="{{$id}}"
        class="search-input outline-none flex-grow"
        id="search-{{$id}}"

        data-endpoint="{{$endpoint}}"
        data-attr="{{$attr}}"
        data-multiple="{{$multiple}}"
        data-related="{{$id}}"
    >

    @if (!$multiple)
        <input value="{{$values['id']}}" type="hidden" name="{{$id}}" id="hidden-{{$id}}">
        <div class="flex items-center justify-center">
            <x-bi-x id="clear-{{$id}}" style="display: none;" data-related="{{$id}}" class="clear text-leaf w-5 h-5 hover:bg-leaf hover:text-white rounded-[50%]" />
        </div>
    @endif

    <div id="options-list-container-{{$id}}" class="options-list z-40 absolute rounded-md py-2" style="display: none">
        <ul style="display: none" id="search-options-list-{{$id}}" class="select-option-list scrollable p-0 flex flex-col items-stretch justify-start options-list-list">
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
    @vite('resources/css/components/genericSelect.scss')
@endPushOnce
