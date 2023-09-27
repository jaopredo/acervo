@extends('..templates.show')

@section('content')
    <div class="mt-3 row">
        <h2 id="container-title">Livros desta Categoria</h2>
        @if (count($data->books) > 0)
            <div class="books-container p-2 bg-white rounded-2">
                <table class="table">
                    <thead>
                        <th scope="col">Nome</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Registro</th>
                        <th scope="col">Ações</th>
                    </thead>
                    <tbody>
                        @foreach ($data->books as $book)
                            <tr>
                                <td><a class="item-link" href="/books/{{$book->id}}">{{$book->name}}</a></td>
                                <td>{{$book->editor}}</td>
                                <td>{{$book->register}}</td>
                                <td>
                                    <x-action-buttons :id="$book->id" route="books" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-danger text-center">
                NENHUM LIVRO POSSUI ESTA CATEGORIA
            </div>
        @endif
    </div>
@endsection
