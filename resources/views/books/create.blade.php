@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/bookForm.js'])
    @endpush
@endonce

@section ('content')
    <form class="mt-4" action="/books/{{$data->id ?? ''}}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($data)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="mb-3 col" style="flex-basis: content">
                <label for="group_id">GRUPO</label>
                <select class="form-control" name="group_id" id="group_id">
                    <option value="">NENHUM</option>
                    @foreach ($relationships['groups'] as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col">
                <x-multiple-select label="CATEGORIAS" id="categories" :options="$relationships['groups']" />
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="register">REGISTRO DO LIVRO</label>
                <input type="text" id="register" name="register" class="form-control" value="{{ $data->register ?? '' }}">
            </div>
            <div class="mb-3 col">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="{{ $data->isbn ?? '' }}">
            </div>
            <div class="mb-3 col">
                <label for="cdd">CDD</label>
                <input type="text" id="cdd" name="cdd" class="form-control" value="{{ $data->cdd ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="name">NOME DO LIVRO</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $data->name ?? '' }}">
            </div>
            <div class="mb-3 col">
                <label for="author">AUTOR</label>
                <input type="text" id="author" name="author" class="form-control" value="{{ $data->author ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="volume">VOLUME</label>
                <input type="number"name="volume" id="volume" class="form-control" value="{{ $data->volume ?? '' }}">
            </div>
            <div class="mb-3 col">
                <label for="pages">PÁGINAS</label>
                <input type="number" name="pages" id="pages" class="form-control" value="{{ $data->pages ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="aquisition-year">ANO DE AQUISIÇÃO</label>
                <input value="{{ $data->aquisition_year ?? '' }}" type="number" max="{{ date("Y") }}" name="aquisition_year" id="aquisition-year" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="publication">ANO DE PUBLICAÇÃO</label>
                <input value="{{ $data->publication ?? '' }}" type="number" max="{{ date("Y") }}" name="publication" id="publication" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="example">EXEMPLAR</label>
                <input value="{{ $data->example ?? '' }}" type="number" name="example" id="example" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="editor">EDITORA</label>
            <input value="{{ $data->editor ?? '' }}" type="text" name="editor" id="editor" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description">DESCRIÇÃO</label>
            <textarea name="description" id="description" class="form-control">{{$data->description ?? ''}}</textarea>
        </div>
        <div class="mb-3">
            <label for="aquisition">MÉTODO DE AQUISIÇÃO</label>
            <input value="{{ $data->aquisition ?? '' }}" type="text" name="aquisition" id="aquisition" class="form-control">
        </div>
        <div class="mb-3">
            <label for="local">LOCAL</label>
            <input value="{{ $data->local ?? '' }}" type="text" name="local" id="local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image">IMAGEM</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button class="btn btn-primary">ENVIAR</button>
    </form>
</div>

@endsection
