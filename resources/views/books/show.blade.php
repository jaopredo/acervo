@extends('..layouts.main')

@once
    @push ('styles')
        @vite(['resources/css/books.css'])
    @endpush
@endonce

@section ('upper-menu')
    <h1>{{ $book->name }}</h1>

    <div class="buttons-books-container">
        <a href="/books/edit/{{ $book->id }}" class="btn btn-primary">EDITAR LIVRO</a>
        <form style="display: inline-block" action="/books/{{$book->id}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary btn-danger">DELETAR LIVRO</a>
        </form>
    </div>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col image-container">
                <img src="data:image/jpeg;base64,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" alt="Imagem Teste">
            </div>
            <div class="col table-cointainer">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Registro</th>
                            <td>{{ $book->register }} </td>
                        </tr>
                        <tr>
                            <th scope="row">CDD</th>
                            <td>{{ $book->cdd }} </td>
                        </tr>
                        <tr>
                            <th scope="row">ISBN</th>
                            <td>{{ $book->isbn }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Autor</th>
                            <td>{{ $book->author }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Ano de Publicação</th>
                            <td>{{ $book->publication }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Editora</th>
                            <td>{{ $book->editor }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Número de Páginas</th>
                            <td>{{ $book->pages }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Volume</th>
                            <td>{{ $book->volume }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Exemplar</th>
                            <td>{{ $book->example }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Ano de Aquisição</th>
                            <td>{{ $book->aquisition_year }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Método de Aquisição</th>
                            <td>{{ $book->aquisition }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Local de Fabricação</th>
                            <td>{{ $book->local }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            NESTA SEÇÃO IRÁ FICAR A LISTA DOS TOMBAMENTOS
        </div>
    </div>
@endsection
