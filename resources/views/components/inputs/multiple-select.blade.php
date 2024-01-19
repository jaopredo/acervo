<label for="{{$id}}">{{$label}}</label>
<div data-id="{{$id}}" id="multiple-{{$id}}-select" class="multiple-select relative input hover:cursor-pointer flex items-stretch justify-between pr-5">
    <ul id="multiple-select-{{$id}}" data-id="{{$id}}" class="gap-2 flex items-center flex-wrap">
        @foreach($values as $category)
            <li
                data-label="{{$category->name}}"
                data-id="{{$category->id}}"
                data-associated="{{$id}}"
                id="multiple-item-{{$category->id}}-{{$id}}"
                class="multiple-select-item hover:cursor-pointer"
            >
                <div class="close-item-icon" data-id="{{$category->id}}">
                    <svg width="18" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <p>{{$category->name}}</p>
                <input type="hidden" name="{{$id}}[]" value="{{$category->id}}">
            </li>
        @endforeach
    </ul>
    <button type="button" data-id="{{$id}}" id="{{$id}}-button" class="bg-white show-options flex items-center justify-end absolute right-0 top-1/2 -translate-y-1/2">
        <x-ri-arrow-down-s-line :width="18" />
    </button>

    <div id="options-list-{{$id}}" class="options-list z-10 absolute rounded-md py-2" style="display: none">
        @if (count($options) > 0)
            <ul id="select-option-list-{{$id}}" class="select-option-list scrollable p-0 flex flex-col items-stretch justify-start options-list-list">
                @foreach ($options as $option)
                    @if (!in_array($option->id, array_map(function($v){return $v['id'];} , $exclude)))
                        <li id="select-option-{{$option->id}}-{{$id}}" class="input-option option-{{$id}} p-2" data-label="{{$option->name}}" data-associated="{{$id}}" data-value="{{$option->id}}">{{$option->name}}</li>
                    @endif
                @endforeach
            </ul>
        @else
            <div class="selection-error text-center">
                NENHUM VALOR ENCONTRADO
            </div>
        @endif
        <div id="no-text-{{$id}}" class="text-center font-bold" style="display: none">NÃO HÁ MAIS REGISTROS</div>
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/components/multipleSelect.js')
@endPushOnce
@pushOnce('styles')
    @vite('resources/css/components/genericSelect.scss')
@endPushOnce
