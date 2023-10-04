@extends('..templates.show')

@section('content')
    <h2 class="text-lg font-bold text-center">Livros desta Categoria</h2>
    @if (count($data->books) > 0)
        <div class="books-container p-2 bg-white rounded-md">
            <table class="table">
                <thead>
                    <th scope="col" class="text-left">Nome</th>
                    <th scope="col" class="text-left">Editora</th>
                    <th scope="col" class="text-left">Registro</th>
                    <th scope="col">Ações</th>
                </thead>
                <tbody>
                    @foreach ($data->books as $book)
                        <tr>
                            <td><a class="redirect" href="{{route('books.show', $book->id)}}">{{$book->name}}</a></td>
                            <td>{{$book->editor}}</td>
                            <td>{{$book->register}}</td>
                            <td>
                                <x-action-buttons action="table" :id="$book->id" route="books" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-error text-center">
            NENHUM LIVRO POSSUI ESTA CATEGORIA
        </div>
    @endif
@endsection
