@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
@endonce

@section ('upper-menu')
    <h1>Editando Livro: {{ $book->name }}</h1>
@endsection

@section ('content')
    <form action="/books/{{$book->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="register">REGISTRO DO LIVRO</label>
            <input value="{{ $book->register }}" type="text" id="register" name="register" class="form-control">
        </div>
        <div class="mb-3 input-group">
            <label class="input-group-text" for="cdd">CDD</label>
            <input value="{{ $book->cdd }}" type="text" id="cdd" name="cdd" class="form-control">
            <label class="input-group-text" for="isbn">ISBN</label>
            <input value="{{ $book->isbn }}" type="text" id="isbn" name="isbn" class="form-control">
        </div>
        <div class="mb-3">
            <label for="name">NOME DO LIVRO</label>
            <input value="{{ $book->name }}" type="text" id="name" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="author">AUTOR</label>
            <input value="{{ $book->author }}" type="text" id="author" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label for="publication">ANO DE PUBLICAÇÃO</label>
            <input value="{{ $book->publication }}" type="number" max="{{ date("Y") }}" name="publication" id="publication" class="form-control">
        </div>
        <div class="mb-3">
            <label for="editor">EDITORA</label>
            <input value="{{ $book->editor }}" type="text" name="editor" id="editor" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pages">PÁGINAS</label>
            <input value="{{ $book->pages }}" type="number" name="pages" id="pages" class="form-control">
        </div>
        <div class="mb-3">
            <label for="volume">VOLUME</label>
            <input value="{{ $book->volume }}" type="number" name="volume" id="volume" class="form-control">
        </div>
        <div class="mb-3">
            <label for="example">EXEMPLAR</label>
            <input value="{{ $book->example }}" type="number" name="example" id="example" class="form-control">
        </div>
        <div class="mb-3">
            <label for="aquisition-year">ANO DE AQUISIÇÃO</label>
            <input value="{{ $book->aquisition_year }}" type="number" max="{{ date("Y") }}" name="aquisition_year" id="aquisition-year" class="form-control">
        </div>
        <div class="mb-3">
            <label for="aquisition">MÉTODO DE AQUISIÇÃO</label>
            <input value="{{ $book->aquisition }}" type="text" name="aquisition" id="aquisition" class="form-control">
        </div>
        <div class="mb-3">
            <label for="local">LOCAL</label>
            <input value="{{ $book->local }}" type="text" name="local" id="local" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image">IMAGEM</label>
            <input value="{{ $book->image }}" type="file" name="image" id="image" class="form-control">
        </div>

        <button class="btn btn-primary">ENVIAR</button>
    </form>
@endsection
