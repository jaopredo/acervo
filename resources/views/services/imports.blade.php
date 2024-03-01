@extends('..layouts.main')

@section ('content')

<div class="bg-white rounded-md p-2 min-h-full">
    <div class="flex flex-col justify-center gap-2 mb-3 text-sm">
        <p class="text-leaf font-bold">
            Por favor, antes de enviar o arquivo, tenha certeza de que as informações estejam nesta ordem:
        </p>
        <ul style="display: none;" id="books-order" class="flex items-center gap-3">
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Registro</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Exemplar</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Classificação</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Título</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Autor</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Editora</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">CDD</li>
        </ul>
        <ul id="students-order" class="flex items-center gap-3">
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Matrícula</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Nome</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Email</li>
            <li class="bg-leaf p-1 rounded-md font-bold text-white">Telefone</li>
        </ul>
        <p class="text-leaf font-bold">Também remova o cabeçalho do arquivo, deixe apenas as informações</p>
    </div>
    {{ html()->form('POST', route('excel.import'))->acceptsFiles()->open() }}
        <div class="input-container">
            <label for="import-select">Selecione qual é a tabela que você deseja importar: </label>
            <select class="input" name="import_select" id="import-select">
                <option value="students">ALUNOS</option>
                <option value="books">LIVROS</option>
            </select>
        </div>
        <div class="input-container">
            <x-file-upload id="file" label="ARQUIVO" />
        </div>
        <x-submit-button class="leaf-button">IMPORTAR</x-submit-button>
    {{ html()->form()->close() }}
    @if($errors->first())
        <div class="flex items-start flex-col mt-3 mb-3">
            <h2 class="text-rose-500 font-bold">Um erro ocorreu, tente enviar novamente o arquivo, o erro está detalhado logo abaixo</h2>
            <ul>
                @foreach ($errors->all() as $e)
                    <li class="text-rose-500 text-sm">{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@endsection

@pushOnce('scripts')
    @vite('resources/js/imports.js')
@endPushOnce
