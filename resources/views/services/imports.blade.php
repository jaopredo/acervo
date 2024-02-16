@extends('..layouts.main')

@section ('content')

<div class="bg-white rounded-md p-2 min-h-full">
    <div class="flex flex-col justify-center gap-2 mb-3 text-sm">
        <p class="text-rose-500 font-bold">
            Por favor, antes de enviar o arquivo, tenha certeza de que as informações estejam nesta ordem:
        </p>
        <ul class="flex items-center gap-3">
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Registro</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Exemplar</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Classificação</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Título</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Autor</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">Editora</li>
            <li class="bg-rose-500 p-1 rounded-md font-bold text-white">CDD</li>
        </ul>
        <p class="text-rose-500 font-bold">Também remova o cabeçalho do arquivo, deixe apenas as informações</p>
    </div>
    {{ html()->form('POST', route('excel.import'))->acceptsFiles()->open() }}
        <div class="input-container">
            <x-file-upload id="file" label="ARQUIVO" />
        </div>
        <x-submit-button class="leaf-button">IMPORTAR</x-submit-button>
    {{ html()->form()->close() }}
</div>

@endsection
