@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
    @push ('scripts')
        @vite(['resources/js/contentLoader.js'])
    @endpush
@endonce

@section ('upper-menu')
    @if ($search)
        <h1>PROCURANDO POR {{ $search }}</h1>
    @else
        <h1>LIVROS</h1>
    @endif

    <div class="buttons-books-container">
        <a href="/books/create" class="btn btn-primary btn-success">ADICIONAR LIVRO</a>
        <a href="/books/remove" class="btn btn-primary btn-danger">REMOVER SELECIONADOS</a>
    </div>
@endsection

@section ('content')
<div class="books-container">
    <div id="data-wrapper" class="search">
        @foreach ($books as $book)
            <div class="card item book-card">
                {{-- <div class="delete-selector-container">
                    <input type="checkbox" name="booksDelete[]" name="'. $book->id .'" >
                </div> --}}
                <div class="card-header">
                    <h2 class="card-title"><a href="/books/{{ $book->id }}">{{ $book->name }}</a></h2>
                </div>
                <div class="card-body">
                    <p class="card-text">Registro: {{$book->register}}</p>
                    <p class="card-text">Autor: {{$book->author}}</p>
                    <p class="card-text">Páginas: {{$book->pages}}</p>
                </div>
            </div>
        @endforeach
    </div>
    {{-- <div class="auto-load text-center">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#000"
                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />
            </path>
        </svg>
    </div> --}}
</div>

@endsection
