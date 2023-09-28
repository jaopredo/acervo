@extends('..templates.index')

@section('table-header')
    <th scope="col">Nome</th>
    <th scope="col">CDD</th>
    <th scope="col">Registro</th>
    <th scope="col">Editora</th>
    <th scope="col" class="text-center">Ações</th>
@endsection

@section ('table-content')
    @foreach ($data as $book)
        <tr>
            <td><a class="item-link" href="{{route('books.show', $book->id)}}">{{ $book->name }}</a></td>
            <td>{{ $book->cdd }}</td>
            <td>{{ $book->register }}</td>
            <td>{{ $book->editor }}</td>
            <td>
                <x-action-buttons :id="$book->id" route="books" />
            </td>
        </tr>
    @endforeach
@endsection
