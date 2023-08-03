@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
@endonce

@section ('upper-menu')
    <h1>PROCURANDO</h1>

    <div class="buttons-books-container">
        <a href="/books/create" class="btn btn-primary btn-success">ADICIONAR LIVRO</a>
        <a href="/books/remove" class="btn btn-primary btn-danger">REMOVER SELECIONADOS</a>
    </div>
@endsection

@section ('content')



@endsection
