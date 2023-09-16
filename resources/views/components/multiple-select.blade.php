<label for="{{$id}}">{{$label}}</label>
<div class="position-relative form-control list d-flex align-items-stretch justify-content-between pr-5">
    <ul id="multiple-select" class="multiple-select gap-2 d-flex flex-row align-items-center">

    </ul>
    <button type="button" class="bg-white show-options d-flex align-items-center justify-content-end">
        <x-ri-arrow-down-s-line :width="18" />
    </button>

    <div class="options-list position-absolute rounded-2 py-2" style="display: none">
        <ul id="select-option-list" class="p-0 d-flex flex-column align-items-stretch justify-content-start options-list-list">
            @foreach ($options as $option)
                <li id="select-option-{{$option->id}}" class="input-option p-2" data-label="{{$option->name}}" data-associated="{{$id}}" data-value="{{$option->id}}">{{$option->name}}</li>
            @endforeach
        </ul>
    </div>
</div>

@pushOnce('scripts')
    @vite('resources/js/multipleSelect.js')
@endPushOnce
@pushOnce('styles')
    @vite('resources/css/input.css')
@endPushOnce
