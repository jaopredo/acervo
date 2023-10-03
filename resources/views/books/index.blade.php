@extends('..templates.index')

@section('table-header')
    <th scope="col">Nome</th>
    <th scope="col">CDD</th>
    <th scope="col">Registro</th>
    <th scope="col">Editora</th>
    <th scope="col">Ações</th>
@endsection

@section ('table-content')
    @foreach ($data as $book)
        <tr>
            <td><a href="{{route('books.show', $book->id)}}">{{ $book->name }}</a></td>
            <td>{{ $book->cdd }}</td>
            <td>{{ $book->register }}</td>
            <td>{{ $book->editor }}</td>
            <td>
                <x-action-buttons :id="$book->id" route="books" />
            </td>
        </tr>
    @endforeach
@endsection
