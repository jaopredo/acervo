@props(['label' => 'IMAGEM'])

<div class="input-container">
    <label for="file-upload-{{$id}}">{{$label}}</label>
    <label for="file-upload-{{$id}}" class="input hover:cursor-pointer">
        <div class="flex items-center justify-center">
            <div class="flex items-center justify-center w-fit">
                <x-bi-file-earmark-arrow-up class="text-slate-500" width="auto" height="2em"/>
            </div>
            <ul id="upload-files-list-{{$id}}" class="flex-grow flex flex-col items-center justify-center w-full">
                <li class="file-item">Nenhum arquivo selecionado</li>
            </ul>
        </div>
    </label>
    <p class="form-error">{{$errors->first($id)}}</p>

    <input data-related="{{$id}}" type="file" name="{{$id}}" id="file-upload-{{$id}}" class="upload-input" style="display: none">
</div>

@once
    @push('scripts')
        @vite('resources/js/components/uploadFile.js')
    @endpush
    @push('styles')
        @vite('resources/css/components/uploadFile.scss')
    @endpush
@endonce
