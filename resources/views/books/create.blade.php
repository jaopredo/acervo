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
<div class="books-container">
    <form class="mt-4" action="/books" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($relationships)
            <div class="row">
                <div class="mb-3 col">
                    <div class="mb-3 col">
                        <label for="group_id">GRUPO</label>
                        <select class="form-control" name="group_id" id="group_id">
                            <option value="">NENHUM</option>
                            @foreach ($relationships['groups'] as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="mb-3 col">
                <label for="register">REGISTRO DO LIVRO</label>
                <input type="text" id="register" name="register" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="cdd">CDD</label>
                <input type="text" id="cdd" name="cdd" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="name">NOME DO LIVRO</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="author">AUTOR</label>
                <input type="text" id="author" name="author" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="volume">VOLUME</label>
                <input type="number"name="volume" id="volume" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="pages">PÁGINAS</label>
                <input type="number" name="pages" id="pages" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col">
                <label for="aquisition-year">ANO DE AQUISIÇÃO</label>
                <input type="number" max="{{ date("Y") }}" name="aquisition_year" id="aquisition-year" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="publication">ANO DE PUBLICAÇÃO</label>
                <input type="number" max="{{ date("Y") }}" name="publication" id="publication" class="form-control">
            </div>
            <div class="mb-3 col">
                <label for="example">EXEMPLAR</label>
                <input type="number" name="example" id="example" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="editor">EDITORA</label>
            <input type="text" name="editor" id="editor" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description">DESCRIÇÃO</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="aquisition">MÉTODO DE AQUISIÇÃO</label>
            <input type="text" name="aquisition" id="aquisition" class="form-control">
        </div>
        <div class="mb-3">
            <label for="local">LOCAL</label>
            <input type="text" name="local" id="local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image">IMAGEM</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button class="btn btn-primary">ENVIAR</button>
    </form>
</div>

@endsection
